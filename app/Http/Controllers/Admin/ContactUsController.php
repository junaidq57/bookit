<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\ContactUsDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateContactUsRequest;
use App\Http\Requests\Admin\UpdateContactUsRequest;
use App\Repositories\Admin\ContactUsRepository;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

/**
 * Class ContactUsController
 * @package App\Http\Controllers\Admin
 */
class ContactUsController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  ContactUsRepository */
    private $contactUsRepository;
    private $userRepository;

    public function __construct(ContactUsRepository $contactUsRepo, UserRepository $userRepo)
    {
        $this->contactUsRepository = $contactUsRepo;
        $this->userRepository = $userRepo;
        $this->ModelName = 'contactus';
        $this->BreadCrumbName = 'ContactUs';
    }

    /**
     * Display a listing of the ContactUs.
     *
     * @param ContactUsDataTable $contactUsDataTable
     * @return Response
     */
    public function index(ContactUsDataTable $contactUsDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return $contactUsDataTable->render('admin.contactus.index');
    }

    /**
     * Show the form for creating a new ContactUs.
     *
     * @return Response
     */
    public function create()
    {
        $users = $this->userRepository->findWhere(['protect' => 0])->pluck('name','id')->all();
//        dd($users);
        $users+= ['0' => 'All'];
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return view('admin.contactus.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created ContactUs in storage.
     *
     * @param CreateContactUsRequest $request
     *
     * @return Response
     */
    public function store(CreateContactUsRequest $request)
    {
        $contactUs = $this->contactUsRepository->saveRecord($request);

        Flash::success('Contact Us saved successfully.');
        return redirect(route('admin.contactus.index'));
    }

    /**
     * Display the specified ContactUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactUs = $this->contactUsRepository->findWithoutFail($id);
        if (empty($contactUs)) {
            Flash::error('Contact Us not found');
            return redirect(route('admin.contactus.index'));
        }

        $auth_id = Auth::id();
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $contactUs);
        return view('admin.contactus.show')->with(['contactUs' => $contactUs,'auth_id' => $auth_id,]);
    }

    /**
     * Show the form for editing the specified ContactUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactUs = $this->contactUsRepository->findWithoutFail($id);
        if (empty($contactUs)) {
            Flash::error('Contact Us not found');
            return redirect(route('admin.contactus.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $contactUs);
        return view('admin.contactus.edit')->with('contactUs', $contactUs);
    }

    /**
     * Update the specified ContactUs in storage.
     *
     * @param  int $id
     * @param UpdateContactUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactUsRequest $request)
    {
        $contactUs = $this->contactUsRepository->findWithoutFail($id);
        if (empty($contactUs)) {
            Flash::error('Contact Us not found');
            return redirect(route('admin.contactus.index'));
        }

        $contactUs = $this->contactUsRepository->updateRecord($request, $id);

        Flash::success('Contact Us updated successfully.');
        return redirect(route('admin.contactus.index'));
    }

    /**
     * Remove the specified ContactUs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactUs = $this->contactUsRepository->findWithoutFail($id);
        if (empty($contactUs)) {
            Flash::error('Contact Us not found');
            return redirect(route('admin.contactus.index'));
        }

        $this->contactUsRepository->deleteRecord($id);

        Flash::success('Contact Us deleted successfully.');
        return redirect(route('admin.contactus.index'));
    }
}