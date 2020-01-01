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
 *      definition="OrderItem",
 *      required={"order_id", "item", "quantity", "category", "created_at", "updated_at"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="order_id",
 *          description="order_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="item",
 *          description="item",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category",
 *          description="category",
 *          type="string"
 *      )
 * )
 */
class OrderItem extends Model
{
    use SoftDeletes;

    public $table = 'order_item';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'item',
        'quantity',
        'category',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item' => 'string',
        'category' => 'string'
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
        'order_id' => 'required',
        'item' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'order_id' => 'required',
        'item' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'order_id' => 'required',
        'item' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'order_id' => 'required',
        'item' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
