<?php

namespace App\Repositories\Admin;

use App\Models\ContactUs;
use App\Models\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ContactUsRepository
 * @package App\Repositories\Admin
 * @version July 14, 2018, 6:36 am UTC
 *
 * @method ContactUs findWithoutFail($id, $columns = ['*'])
 * @method ContactUs find($id, $columns = ['*'])
 * @method ContactUs first($columns = ['*'])
 */
class ContactUsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
        'subject',
        'status',
        'created_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ContactUs::class;
    }

    /**
     * @param $request
     * @return array
     */
    public function saveRecord($request)
    {
        $send_from = Auth::id();
        $userData = $request->only(['send_to', 'subject', 'message']);
        $postData['subject'] = ucwords($userData['subject']);
        $postData['send_from'] = $send_from;
        $postData['send_to'] = $userData['send_to'][0];
        $postData['message'] = $userData['message'];

        $message = $this->create($postData);

        $notificationRepository = app()->make(NotificationRepository::class);

        $notification = $notificationRepository->saveRecord([
            'url'         => 'admin/contactus/' . $message->id,
            'ref_id'      => $userData['send_to'][0],
            'message'     => 'You have a new message',
            'action_type' => 'contactus'
        ]);

        return [];
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function updateRecord($request, $id)
    {
        $input = $request->all();
        $this->update($input, $id);
        return [];
    }

    /**
     * @param $id
     * @return array
     */
    public function deleteRecord($id)
    {
        $this->delete($id);
        return [];
    }
}