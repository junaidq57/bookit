<?php

namespace App\Repositories\Admin;

use App\Models\Orderitem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderitemRepository
 * @package App\Repositories\Admin
 * @version April 25, 2019, 10:59 pm UTC
 *
 * @method Orderitem findWithoutFail($id, $columns = ['*'])
 * @method Orderitem find($id, $columns = ['*'])
 * @method Orderitem first($columns = ['*'])
*/
class OrderitemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'order_id',
        'item',
        'quantity',
        'category',
        'created_at',
        'updated_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orderitem::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $input = $request->all();
        $orderitem = $this->create($input);
        return $orderitem;
    }

    /**
     * @param $request
     * @param $orderitem
     * @return mixed
     */
    public function updateRecord($request, $orderitem)
    {
        $input = $request->all();
        $orderitem = $this->update($input, $orderitem->id);
        return $orderitem;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $orderitem = $this->delete($id);
        return $orderitem;
    }
}
