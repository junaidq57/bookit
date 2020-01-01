<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @SWG\Definition(
 *      definition="FacilitatorTrack",
 *      required={"facilitator_id", "longitude", "latitude"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="facilitator_id",
 *          description="facilitator_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="string"
 *      )
 * )
 */
class FacilitatorTrack extends Model
{
    use SoftDeletes;

    public $table = 'facilitator_tracks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'facilitator_id',
        'longitude',
        'latitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'longitude' => 'string',
        'latitude' => 'string'
    ];

    /**
     * The objects that should be append to toArray.
     *
     * @var array
     */
     protected $with = [];

    /**
     * The attributes that should be append to toArray.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * The attributes that should be visible in toArray.
     *
     * @var array
     */
    protected $visible = [];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [
        'facilitator_id' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'facilitator_id' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        // 'facilitator_id' => 'required',
        // 'longitude' => 'required',
        // 'latitude' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'facilitator_id' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    
}
