<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @SWG\Definition(
 *      definition="Quickorder",
 *      required={"user_id", "destination_current_address", "destination_other_address", "totals"},
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
 *      ),
 *      @SWG\Property(
 *          property="totals",
 *          description="totals",
 *          type="string"
 *      )
 * )
 */
class Quickorder extends Model
{
    use SoftDeletes;
    
    const PENDING = 10;
    const INVOICED = 20;
    const CONFIRMED = 30;
    const INSHIPPING = 40;
    const COMPLETE = 50;

    public $table = 'quick_order';
    
    protected $dates = ['deleted_at'];

    public static $STATUS_NAME = [
        self::PENDING       => 'Pending',
        self::INVOICED        => 'Invoiced',
        self::CONFIRMED    => 'Confirmed',
        self::INSHIPPING    => 'In Shipping',
        self::COMPLETE      => 'Complete'
    ];
    public static $STATUS_CSS = [
        self::PENDING       => 'warning',
        self::INVOICED        => 'info',
        self::CONFIRMED    => 'primary',
        self::COMPLETE      => 'success',
    ];


    public $fillable = [
        'user_id',
        'totals',
        'customer_username',
        'customer_email',
        'customer_firstname',
        'customer_lastname',
        'shipping_amount',
        'shipping_description',
        'grand_total',
        'subtotal',
        'total_item_count',
        'status',
        'longitude',
        'latitude',
        'destination_current_address',
        'destination_other_address',
        'totals'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'destination_current_address' => 'string',
        'destination_other_address' => 'string',
        'totals' => 'string'
    ];

    /**
     * The objects that should be append to toArray.
     *
     * @var array
     */
     protected $with = [
        
     ];

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
        'totals' => 'required'
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
        'totals' => 'required'
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
        'totals' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
