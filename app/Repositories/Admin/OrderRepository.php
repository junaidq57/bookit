<?php

namespace App\Repositories\Admin;

use App\Models\Order;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories\Admin
 * @version April 25, 2019, 10:51 pm UTC
 *
 * @method Order findWithoutFail($id, $columns = ['*'])
 * @method Order find($id, $columns = ['*'])
 * @method Order first($columns = ['*'])
*/
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'destination_current_address',
        'destination_other_address',
        'created_at',
        'updated_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Order::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $input = $request->all();
        $order = $this->create($input);
        return $order;
    }

    /**
     * @param $request
     * @param $order
     * @return mixed
     */
    public function updateRecord($request, $order)
    {
        $input = $request->all();
        $order = $this->update($input, $order->id);
        return $order;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $order = $this->delete($id);
        return $order;
    }
}
