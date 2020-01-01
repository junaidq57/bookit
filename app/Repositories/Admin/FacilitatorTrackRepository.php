<?php

namespace App\Repositories\Admin;

use App\Models\FacilitatorTrack;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FacilitatorTrackRepository
 * @package App\Repositories\Admin
 * @version May 21, 2019, 6:36 pm UTC
 *
 * @method FacilitatorTrack findWithoutFail($id, $columns = ['*'])
 * @method FacilitatorTrack find($id, $columns = ['*'])
 * @method FacilitatorTrack first($columns = ['*'])
*/
class FacilitatorTrackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'facilitator_id',
        'longitude',
        'latitude',
        'created_at',
        'updated_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FacilitatorTrack::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $input = $request->all();
        $facilitatorTrack = $this->create($input);
        return $facilitatorTrack;
    }

    /**
     * @param $request
     * @param $facilitatorTrack
     * @return mixed
     */
    public function updateRecord($request, $facilitatorTrack)
    {
        
        $input = $request->all();
        $facilitatorTrack = $this->update($input, $facilitatorTrack);
        return $facilitatorTrack;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $facilitatorTrack = $this->delete($id);
        return $facilitatorTrack;
    }
}
