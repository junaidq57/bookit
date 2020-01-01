<?php

namespace App\Models;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property integer id
 * @property integer user_id
 * @property string first_name
 * @property string last_name
 * @property string phone
 * @property string address
 * @property string image
 * @property integer area_id
 * @property integer is_verified
 * @property integer email_updates
 * @property integer is_social_login
 * @property string created_at
 * @property string updated_at
 * @property string deleted_at
 *
 * @property string image_url
 *
 * @property User user
 *
 * )
 */
class UserCompany extends Model
{
    public $table = 'companies';

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

    protected $fillable = [
        'user_id', 'company', 'detail'
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

    ];

    /**
     * The attributes that should be visible in toArray.
     *
     * @var array
     */
    protected $visible = [
        'id',
        'user_id',
        'company',
        'detail',
    ];

    /**
     * Validation create rules
     *
     * @var array
     */
    public static $rules = [

    ];

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
//        return $this->belongsToMany(User::class);
        return $this->belongsToMany(UserCompany::class,'user_company','company_id','user_id');
    }



}
