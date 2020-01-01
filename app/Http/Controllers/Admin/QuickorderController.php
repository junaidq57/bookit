<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\QuickorderDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateQuickorderRequest;
use App\Http\Requests\Admin\UpdateQuickorderRequest;
use App\Repositories\Admin\QuickorderRepository;
use App\Repositories\Admin\QuickorderitemRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;
use App\Helper\RateCalculator;
use Illuminate\Http\Request;
use App\Models\Quickorder;
use App\Models\UserDevice;
use App\Jobs\SendPushNotification;


class QuickorderController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  QuickorderRepository */
    private $quickorderRepository;

    /** @var  QuickorderitemRepository */
    private $QuickorderitemRepository;

    private $RateCalculator;

    public function __construct(QuickorderRepository $quickorderRepo, QuickorderitemRepository $QuickorderitemRepository, RateCalculator $rates)
    {
        $this->quickorderRepository = $quickorderRepo;
        $this->QuickorderitemRepository = $QuickorderitemRepository;
        $this->ModelName = 'quickorders';
        $this->BreadCrumbName = 'Quickorders';
        $this->RateCalculator = $rates;
    }

    /**
     * Display a listing of the Quickorder.
     *
     * @param QuickorderDataTable $quickorderDataTable
     * @return Response
     */
    public function index(QuickorderDataTable $quickorderDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return $quickorderDataTable->render('admin.quickorders.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new Quickorder.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return view('admin.quickorders.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created Quickorder in storage.
     *
     * @param CreateQuickorderRequest $request
     *
     * @return Response
     */
    public function store(CreateQuickorderRequest $request)
    {
        $quickorder = $this->quickorderRepository->saveRecord($request);

        Flash::success($this->BreadCrumbName . ' saved successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.quickorders.create'));
        } elseif (isset($request->translation)) {
            $redirect_to = redirect(route('admin.quickorders.edit', $quickorder->id));
        } else {
            $redirect_to = redirect(route('admin.quickorders.index'));
        }
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);
    }

    /**
     * Display the specified Quickorder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items=0;
        $shippingRates;

        $quickorder = $this->quickorderRepository->findWithoutFail($id);


        $OrderItems = $this->QuickorderitemRepository->findWhere(['order_id' => $id]);

        $OrderItems = $OrderItems->toArray();

        // foreach ($OrderItems as $key => $value) {
        //     $items +=$value['quantity'];
        // }

        // if(strtolower($OrderItems[0]['category']) == "meal"){
        //     $shippingRates = $this->RateCalculator->mealRates($distance);
        // }
        // elseif (strtolower($OrderItems[0]['category']) == "grocery") {
        //     $shippingRates = $this->RateCalculator->GroceryRates($distance, $items);
        // }
        // elseif (strtolower($OrderItems[0]['category']) == "medicine") {
        //     $shippingRates = $this->RateCalculator->medicineRates($distance);
        // }
        
        if (empty($quickorder)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorders.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $quickorder);
        return view('admin.quickorders.show')->with(['quickorder' => $quickorder, 'status' => Quickorder::$STATUS_NAME[$quickorder->status], 'orderItems' => $OrderItems, 'title' => $this->BreadCrumbName]);
    }


    public function calculate(Request $request){
        $orderId = $request->order_id;
        $items = $request->items;
        $quickorder = $this->quickorderRepository->findWithoutFail($orderId);
        $quickorder->totals = $request->totals;

        $OrderItems = $this->QuickorderitemRepository->findWhere(['order_id' => $orderId]);


        foreach ($OrderItems as $key => $value) {
            $value->update(array('price' => $items[$key]['price']));
        }

        $quickorder->update(array('totals' => $request->totals, 'subtotal' => $request->totals, 'grand_total' => $request->totals));

        Flash::success($this->BreadCrumbName . ' Totals calculated and saved successfully.');
        return json_encode(array('totals' => $quickorder->totals));

    }

    public function invoice(Request $request){

        $orderId = $request->order_id;
        $quickorder = $this->quickorderRepository->findWithoutFail($orderId);
        $quickorder->update(array('status' => Quickorder::INVOICED));
        
        $users = array();

        $users = $quickorder->getAttributes();

        $purchaser = UserDevice::where('user_id', $users['user_id'])->first();

        
        if(isset($purchaser)){
            $purchaser = $purchaser->getAttributes();
            $purchaserToken = array();
            $purchaserToken['device_token'] = $purchaser['device_token'];
            $purchaserToken['device_type'] = $purchaser['device_type'];
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
        $SendPushNotification->handle();

        

        Flash::success($this->BreadCrumbName . ' Invoiced To customer.');
        return json_encode(array('totals' => $quickorder->totals));

    }

    /**
     * Show the form for editing the specified Quickorder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorders.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $quickorder);
        return view('admin.quickorders.edit')->with(['quickorder' => $quickorder, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Update the specified Quickorder in storage.
     *
     * @param  int              $id
     * @param UpdateQuickorderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuickorderRequest $request)
    {
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorders.index'));
        }

        $quickorder = $this->quickorderRepository->updateRecord($request, $quickorder);

        Flash::success($this->BreadCrumbName . ' updated successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.quickorders.create'));
        } else {
            $redirect_to = redirect(route('admin.quickorders.index'));
        }
        return $redirect_to->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified Quickorder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorders.index'));
        }

        $this->quickorderRepository->deleteRecord($id);

        Flash::success($this->BreadCrumbName . ' deleted successfully.');
        return redirect(route('admin.quickorders.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
