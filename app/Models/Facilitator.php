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
 *      definition="Facilitator",
 *      required={"user_id", "is_engaged", "available"},
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
 *          property="is_engaged",
 *          description="is_engaged",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="available",
 *          description="available",
 *          type="boolean"
 *      )
 * )
 */
class Facilitator extends Model
{
    use SoftDeletes;

    public $table = 'facilitator';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'is_engaged',
        'available'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_engaged' => 'boolean',
        'available' => 'boolean'
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
        'is_engaged' => 'required',
        'available' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'user_id' => 'required',
        'is_engaged' => 'required',
        'available' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'user_id' => 'required',
        'is_engaged' => 'required',
        'available' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'user_id' => 'required',
        'is_engaged' => 'required',
        'available' => 'required'
    ];

    
}
