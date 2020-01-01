<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateAttendanceAPIRequest;
use App\Http\Requests\Api\UpdateAttendanceAPIRequest;
use App\Models\Attendance;
use App\Repositories\Admin\AttendanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class AttendanceController
 * @package App\Http\Controllers\Api
 */

class AttendanceAPIController extends AppBaseController
{
    /** @var  AttendanceRepository */
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @return Response
     *
     * @SWG\Get(
     *      path="/attendances",
     *      summary="Get a listing of the Attendances.",
     *      tags={"Attendance"},
     *      description="Get all Attendances",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="Authorization",
     *          description="User Auth Token{ Bearer ABC123 }",
     *          type="string",
     *          required=true,
     *          default="Bearer ABC123",
     *          in="header"
     *      ),
     *      @SWG\Parameter(
     *          name="limit",
     *          description="Change the Default Record Count. If not found, Returns All Records in DB.",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *     @SWG\Parameter(
     *          name="offset",
     *          description="Change the Default Offset of the Query. If not found, 0 will be used.",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Attendance")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->attendanceRepository->pushCriteria(new RequestCriteria($request));
        $this->attendanceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $attendances = $this->attendanceRepository->all();

        return $this->sendResponse($attendances->toArray(), 'Attendances retrieved successfully');
    }

    /**
     * @param CreateAttendanceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/attendances",
     *      summary="Store a newly created Attendance in storage",
     *      tags={"Attendance"},
     *      description="Store Attendance",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="Authorization",
     *          description="User Auth Token{ Bearer ABC123 }",
     *          type="string",
     *          required=true,
     *          default="Bearer ABC123",
     *          in="header"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Attendance that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Attendance")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Attendance"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAttendanceAPIRequest $request)
    {
        $attendances = $this->attendanceRepository->saveRecord($request);

        return $this->sendResponse($attendances->toArray(), 'Attendance saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/attendances/{id}",
     *      summary="Display the specified Attendance",
     *      tags={"Attendance"},
     *      description="Get Attendance",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="Authorization",
     *          description="User Auth Token{ Bearer ABC123 }",
     *          type="string",
     *          required=true,
     *          default="Bearer ABC123",
     *          in="header"
     *      ),
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Attendance",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Attendance"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Attendance $attendance */
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        return $this->sendResponse($attendance->toArray(), 'Attendance retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAttendanceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/attendances/{id}",
     *      summary="Update the specified Attendance in storage",
     *      tags={"Attendance"},
     *      description="Update Attendance",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="Authorization",
     *          description="User Auth Token{ Bearer ABC123 }",
     *          type="string",
     *          required=true,
     *          default="Bearer ABC123",
     *          in="header"
     *      ),
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Attendance",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Attendance that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Attendance")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Attendance"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAttendanceAPIRequest $request)
    {
        /** @var Attendance $attendance */
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        $attendance = $this->attendanceRepository->updateRecord($request, $id);

        return $this->sendResponse($attendance->toArray(), 'Attendance updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/attendances/{id}",
     *      summary="Remove the specified Attendance from storage",
     *      tags={"Attendance"},
     *      description="Delete Attendance",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="Authorization",
     *          description="User Auth Token{ Bearer ABC123 }",
     *          type="string",
     *          required=true,
     *          default="Bearer ABC123",
     *          in="header"
     *      ),
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Attendance",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Attendance $attendance */
        $attendance = $this->attendanceRepository->findWithoutFail($id);

        if (empty($attendance)) {
            return $this->sendError('Attendance not found');
        }

        $this->attendanceRepository->deleteRecord($id);

        return $this->sendResponse($id, 'Attendance deleted successfully');
    }
}
