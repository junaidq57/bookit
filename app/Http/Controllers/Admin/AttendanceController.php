<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\AttendanceDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAttendanceRequest;
use App\Http\Requests\Admin\UpdateAttendanceRequest;
use App\Repositories\Admin\AttendanceRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;

class AttendanceController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  AttendanceRepository */
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
        $this->ModelName = 'attendances';
        $this->BreadCrumbName = 'Attendances';
    }

    /**
     * Display a listing of the Attendance.
     *
     * @param AttendanceDataTable $attendanceDataTable
     * @return Response
     */
    public function index(AttendanceDataTable $attendanceDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return $attendanceDataTable->render('admin.attendances.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new Attendance.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return view('admin.attendances.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created Attendance in storage.
     *
     * @param CreateAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->saveRecord($request);

        Flash::success($this->BreadCrumbName . ' saved successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.attendances.create'));
        } elseif (isset($request->translation)) {
            $redirect_to = redirect(route('admin.attendances.edit', $attendance->id));
        } else {
            $redirect_to = redirect(route('admin.attendances.index'));
        }
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);
    }

    /**
     * Display the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.attendances.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $attendance);
        return view('admin.attendances.show')->with(['attendance' => $attendance, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for editing the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.attendances.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $attendance);
        return view('admin.attendances.edit')->with(['attendance' => $attendance, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Update the specified Attendance in storage.
     *
     * @param  int              $id
     * @param UpdateAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.attendances.index'));
        }

        $this->attendanceRepository->updateRecord($request, $attendance);

        Flash::success($this->BreadCrumbName . ' updated successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.attendances.create'));
        } else {
            $redirect_to = redirect(route('admin.attendances.index'));
        }
        return $redirect_to->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.attendances.index'));
        }

        $this->attendanceRepository->deleteRecord($id);

        Flash::success($this->BreadCrumbName . ' deleted successfully.');
        return redirect(route('admin.attendances.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
