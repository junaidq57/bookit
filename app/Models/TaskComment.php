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
 *      definition="TaskComment",
 *      required={"task_id", "user_id", "carried_out", "quantity", "comment"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="task_id",
 *          description="task_id",
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
 *          property="carried_out",
 *          description="carried_out",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="comment",
 *          description="comment",
 *          type="string"
 *      )
 * )
 */
class TaskComment extends Model
{
    use SoftDeletes;

    public $table = 'task_comments';

    /**
     * Status Enum
     */
    const MEDIA_IMAGE = 0;
    const MEDIA_DOC = 1;

    const CARRIED_TEN = 10;
    const CARRIED_TWENTY = 20;

    public static $MEDIA_TYPE = [
        self::MEDIA_IMAGE => 'Image',
        self::MEDIA_DOC   => 'Document',
    ];

    public static $CARRIED_TYPE = [
        self::CARRIED_TEN       => 'Yes',
        self::CARRIED_TWENTY    => 'No',
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'task_id',
        'user_id',
        'carried_out',
        'quantity',
        'comment',
        'status',
        'rating'
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
    protected $visible = [];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [

    ];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [

    ];

    /**
     * Validation api update rules
     *
     * @var array
     */
    public static $api_update_rules = [

    ];


    public function getCarriedNameAttribute()
    {
        return self::$CARRIED_TYPE[$this->carried_out];
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
