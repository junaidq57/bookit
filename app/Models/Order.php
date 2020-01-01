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
 *      definition="Order",
 *      required={"user_id", "destination_current_address", "destination_other_address", "created_at", "updated_at"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="destination_current_address",
 *          description="destination_current_address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destination_other_address",
 *          description="destination_other_address",
 *          type="string"
 *      )
 * )
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'destination_current_address',
        'destination_other_address',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'destination_current_address' => 'string',
        'destination_other_address' => 'string'
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
        'user_id' => 'required',
        'destination_current_address' => 'required',
        'destination_other_address' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'user_id' => 'required',
        'destination_current_address' => 'required',
        'destination_other_address' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'user_id' => 'required',
        'destination_current_address' => 'required',
        'destination_other_address' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'user_id' => 'required',
        'destination_current_address' => 'required',
        'destination_other_address' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
