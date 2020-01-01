<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @property integer id
 * @property integer instance_id
 * @property string instance_type
 * @property string attachment
 * @property string attachment_name
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @SWG\Definition(
 *      definition="TaskMedia",
 *      required={},
 *      @SWG\Property(
 *          property="quotation_request_id",
 *          description="quotation_request_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="path",
 *          description="path",
 *          type="string"
 *      )
 * )
 */
class TaskMedia extends Model
{
    use SoftDeletes;

    public $table = 'attachments';
    protected $dates = ['deleted_at'];

    /**
     * Status Enum
     */
    const MEDIA_IMAGE = 0;
    const MEDIA_DOC = 1;

    public static $MEDIA_TYPE = [
        self::MEDIA_IMAGE => 'Image',
        self::MEDIA_DOC   => 'Document',
    ];

    public $fillable = [
        'instance_id',
        'instance_type',
        'attachment',
        'attachment_name'
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
    protected $appends = [
        'media_path',
        'media_url',
    ];

    /**
     * The attributes that should be visible in toArray.
     *
     * @var array
     */
    protected $visible = [
        'instance_id',
        'instance_type',
        'attachment',
        'attachment_name',
        'media_path',
        'media_url'
    ];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * Validation update rules
     *
     * @var array
     */
    public static $update_rules = [];

    /**
     * Validation api rules
     *
     * @var array
     */
    public static $api_rules = [];

    public function getMediaUrlAttribute()
    {
        return ($this->type == self::MEDIA_IMAGE) ? route('api.resize', ['img' => $this->path]) : route('media', ['file' => $this->path]);
    }

    public function getMediaPathAttribute()
    {
        return $this->path;
    }

}