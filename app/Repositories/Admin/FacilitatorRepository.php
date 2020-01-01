<?php

namespace App\Repositories\Admin;

use App\Models\Facilitator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FacilitatorRepository
 * @package App\Repositories\Admin
 * @version May 21, 2019, 6:33 pm UTC
 *
 * @method Facilitator findWithoutFail($id, $columns = ['*'])
 * @method Facilitator find($id, $columns = ['*'])
 * @method Facilitator first($columns = ['*'])
*/
class FacilitatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'is_engaged',
        'available',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Facilitator::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $input = $request->all();
        $facilitator = $this->create($input);
        return $facilitator;
    }

    /**
     * @param $request
     * @param $facilitator
     * @return mixed
     */
    public function updateRecord($request, $facilitator)
    {
        $input = $request->all();
        $facilitator = $this->update($input, $facilitator->id);
        return $facilitator;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $facilitator = $this->delete($id);
        return $facilitator;
    }
}
