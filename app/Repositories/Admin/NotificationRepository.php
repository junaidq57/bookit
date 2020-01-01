<?php

namespace App\Repositories\Admin;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NotificationRepository
 * @package App\Repositories\Admin
 * @version July 14, 2018, 6:54 am UTC
 *
 * @method Notification findWithoutFail($id, $columns = ['*'])
 * @method Notification find($id, $columns = ['*'])
 * @method Notification first($columns = ['*'])
*/
class NotificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'url',
        'action_type',
        'ref_id',
        'message',
        'created_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Notification::class;
    }


    public function saveRecord($data)
    {
        $notification = $this->create([
            'sender_id'   => Auth::id(),
            'url'         => url($data['url']),
            'action_type' => $data['action_type'],
            'ref_id'      => $data['ref_id'],
            'message'     => $data['message'],
            'status'      => 1
        ]);
        return $notification;
    }

}
