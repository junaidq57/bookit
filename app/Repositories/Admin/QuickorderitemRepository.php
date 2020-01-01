<?php

namespace App\Repositories\Admin;

use App\Models\Quickorderitem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QuickorderitemRepository
 * @package App\Repositories\Admin
 * @version April 27, 2019, 7:13 pm UTC
 *
 * @method Quickorderitem findWithoutFail($id, $columns = ['*'])
 * @method Quickorderitem find($id, $columns = ['*'])
 * @method Quickorderitem first($columns = ['*'])
*/
class QuickorderitemRepository extends BaseRepository
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
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quickorderitem::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $input = $request->all();
        $quickorderitem = $this->create($input);
        return $quickorderitem;
    }

    /**
     * @param $request
     * @param $quickorderitem
     * @return mixed
     */
    public function updateRecord($request, $quickorderitem)
    {
        $input = $request->all();
        $quickorderitem = $this->update($input, $quickorderitem->id);
        return $quickorderitem;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $quickorderitem = $this->delete($id);
        return $quickorderitem;
    }
}
