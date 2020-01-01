<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * @property integer id
 * @property string name
 * @property int priority
 * @property int status
 * @property string status_name
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @SWG\Definition(
 *      definition="Task",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="detail",
 *          description="detail",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="priority",
 *          description="priority",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_by",
 *          description="created_by",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      )
 * )
 */
class Task extends Model
{
    public $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes {
        restore as private restoreA;
    }
    use EntrustUserTrait {
        restore as private restoreB;
    }


    const NORMAL = 10;
    const HIGH = 20;
    const LOW = 30;
    const IMMEDIATE = 40;

    const PENDING = 10;
    const ONHOLD = 20;
    const INPROGRESS = 30;
    const COMPLETE = 40;

    public static $PRIORITY_NAME = [
        self::NORMAL    => 'Normal',
        self::HIGH      => 'High',
        self::LOW       => 'Low',
        self::IMMEDIATE => 'Immediate'
    ];

    public static $STATUS_NAME = [
        self::PENDING       => 'Pending',
        self::ONHOLD        => 'On Hold',
        self::INPROGRESS    => 'In Progress',
        self::COMPLETE      => 'Complete'
    ];

    public static $PRIORITY_CSS = [
        self::NORMAL        => 'primary',
        self::HIGH          => 'warning',
        self::LOW           => 'info',
        self::IMMEDIATE     => 'danger',
    ];

    public static $STATUS_CSS = [
        self::PENDING       => 'warning',
        self::ONHOLD        => 'info',
        self::INPROGRESS    => 'primary',
        self::COMPLETE      => 'success',
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'task_id',
        'detail',
        'priority',
        'start_date',
        'end_date',
        'created_by',
        'status'
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
     protected $with = [
            'user2',
            'taskCategory',
            'taskComment'
        ];

    /**
     * The attributes that should be append to toArray.
     *
     * @var array
     */
    protected $appends = [
    ];

    /**
     * The attributes that should be visible in toArray.
     *
     * @var array
     */
    protected $visible = [
        'id',
        'task_id',
        'detail',
        'priority',
        'start_date',
        'end_date',
        'created_by',
        'status',
        'user2',
        'taskCategory',
        'taskComment'
    ];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [
        'detail' => 'required',
        'priority' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'required',
        'status' => 'required'
    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [
        'detail' => 'required',
        'priority' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'required',
        'status' => 'required'
    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [
        'detail' => 'required',
        'priority' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'required',
        'status' => 'required'
    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [
        'title' => 'required',
        'detail' => 'required',
        'priority' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'required',
        'status' => 'required'
    ];

    /**
     * @return mixed
     */
    public function getPriorityCssAttribute()
    {
        return self::$PRIORITY_CSS[$this->priority];
    }

    /**
     * @return mixed
     */
    public function getStatusCssAttribute()
    {
        return self::$STATUS_CSS[$this->status];
    }

    /**
     * @return mixed
     */
    public function getPriorityNameAttribute()
    {
        return self::$PRIORITY_NAME[$this->priority];
    }

    /**
     * @return mixed
     */
    public function getStatusNameAttribute()
    {
        return self::$STATUS_NAME[$this->status];
    }


    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsToMany(Task::class,'user_company','company_id','user_id');
    }

    public function getFirstNameAttribute()
    {
        return ucfirst('hello');
    }

    public function user2()
    {
        return $this->belongsToMany(User::class,'task_user','task_id','user_id');
    }

    public function taskCategory(){
        return $this->belongsTo(TaskCategory::class,'task_id');
    }

    public function taskComment(){
        return $this->hasOne(TaskComment::class);
    }

}
