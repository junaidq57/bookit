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
 *      definition="Attendance",
 *      required={"user_id", "time_in", "time_out", "job_date", "created_at", "updated_at", "deleted_at"},
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
 *      )
 * )
 */
class Attendance extends Model
{
    use SoftDeletes;
    public $table = 'attendance';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'time_in',
        'time_out',
        'job_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
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
    protected $visible = [
        'user_id',
        'time_in',
        'time_out',
        'job_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'time_in' => 'required',
        'time_out' => 'required',
        'job_date' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'user_id' => 'required',
        'time_in' => 'required',
        'time_out' => 'required',
        'job_date' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'user_id' => 'required',
        'time_in' => 'required',
        'time_out' => 'required',
        'job_date' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'user_id' => 'required',
        'time_in' => 'required',
        'time_out' => 'required',
        'job_date' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'required'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


}
