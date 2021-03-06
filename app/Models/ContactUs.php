<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 * @property string email
 * @property string subject
 * @property string message
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @SWG\Definition(
 *      definition="ContactUs",
 *      required={"name", "email", "subject", "message"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          description="message",
 *          type="string"
 *      )
 * )
 */
class ContactUs extends Model
{
    use SoftDeletes;

    public $table = 'admin_queries';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'subject',
        'send_to',
        'send_from',
        'message',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

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
        'subject' => 'required',
        'send_to' => 'required',
        'message' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'subject'   => 'required',
        'send_to'   => 'required',
        'message'   => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'subject' => 'required',
        'send_to' => 'required',
        'message' => 'required'
    ];

    public function user(){
        return $this->belongsTo(User::class,'send_to');
    }

    public function userFrom(){
        return $this->belongsTo(User::class,'send_from');
    }



}
