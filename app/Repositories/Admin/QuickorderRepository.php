<?php

namespace App\Repositories\Admin;

use App\Models\Quickorder;
use App\Models\Quickorderitem;
use InfyOm\Generator\Common\BaseRepository;
use App\Jobs\SendPushNotification;
use App\Models\UserDevice;

/**
 * Class QuickorderRepository
 * @package App\Repositories\Admin
 * @version April 27, 2019, 7:11 pm UTC
 *
 * @method Quickorder findWithoutFail($id, $columns = ['*'])
 * @method Quickorder find($id, $columns = ['*'])
 * @method Quickorder first($columns = ['*'])
*/
class QuickorderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'destination_current_address',
        'destination_other_address',
        'totals'
    ];



    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quickorder::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $orderData = array();
        $orderData['user_id'] = $request->user_id;
        $orderData['totals'] = isset($request->totals)? $request->totals : 0;
        $orderData['customer_username'] = $request->customer_username;
        $orderData['customer_email'] = $request->customer_email;
        $orderData['customer_lastname'] = $request->customer_lastname;
        $orderData['customer_firstname'] = $request->customer_firstname;
        $orderData['shipping_amount'] = isset($request->shipping_amount)? $request->shipping_amount : 0;
        $orderData['shipping_description'] = isset($request->shipping_description)? $request->shipping_description : 0;
        $orderData['grand_total'] = isset($request->grand_total)? $request->grand_total : 0;
        $orderData['subtotal'] = isset($request->subtotal)? $request->subtotal: 0;
        $orderData['total_item_count'] = $request->total_item_count;
        $orderData['status'] = 10;
        $orderData['longitude'] = $request->longitude;
        $orderData['latitude'] = $request->latitude;
        $orderData['destination_current_address'] = $request->destination_current_address;
        $orderData['destination_other_address'] = $request->destination_other_address;

        $quickOrder = $this->create($orderData)->id;
        $orderData['order_id'] = $quickOrder;
        
        $itemsData = array();


        foreach ($request->items as $key => $value) {
           $value['order_id'] = $quickOrder;
           $itemsData[] = Quickorderitem::create($value);
        }

        $orderData['items'] = $itemsData;

        return $orderData;
    }

    /**
     * @param $request
     * @param $quickorder
     * @return mixed
     */
    public function updateRecord($request, $quickorder)
    {
        $input = $request->all();
        $quickorder = $this->update($input, $quickorder);
        
        $users = array();

        $users = $quickorder->getAttributes();

        $purchaser = UserDevice::where('user_id', $users['user_id'])->first();

        if(isset($purchaser)){
            $purchaser = $purchaser->getAttributes();
            $purchaserToken = array();
            $purchaserToken[] = $purchaser['device_token'];
        }

        $deliveryBoy = UserDevice::where('user_id', $users['dev_id'])->first();

        if(isset($deliveryBoy)){
            $deliveryBoy = $deliveryBoy->getAttributes(); 
            $deliveryBoyToken = array();
            $deliveryBoyToken[] = $deliveryBoy['device_token'];           
        }

        if($quickorder->getAttributes()['status'] == 10){
            $msg = Quickorder::$STATUS_NAME['10'];
        }
        elseif($quickorder->getAttributes()['status'] == 20){
            $msg = Quickorder::$STATUS_NAME['20'];
        }
        elseif($quickorder->getAttributes()['status'] == 30){
            $msg = Quickorder::$STATUS_NAME['30'];
        }
        elseif($quickorder->getAttributes()['status'] == 40){
            $msg = Quickorder::$STATUS_NAME['40'];
        }
        elseif($quickorder->getAttributes()['status'] == 50){
            $msg = Quickorder::$STATUS_NAME['50'];
        }

        $SendPushNotification = new SendPushNotification($msg, $purchaserToken, $users);

        return $quickorder;
    }
    
    public function updateRecordfunction($request, $quickOrder)
    {
        $input = $request->all();
        
        $orderitemreturn = array();

        $quickOrder = $this->update($input, $quickOrder);
        try{
            foreach ($input['items'] as $key => $value) {
               \DB::table('quick_order_items')->where('id', $value['id'])->update($value);
               $orderitemreturn[$key] = $value;
            }
        }
        catch(\Exception $ex){
            return $ex->getMessage();
        }


        $quickOrder['items'] = $orderitemreturn;
            

        return $quickOrder;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $quickorder = $this->delete($id);
        return $quickorder;
    }
}
