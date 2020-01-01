<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateFacilitatorAPIRequest;
use App\Http\Requests\Api\UpdateFacilitatorAPIRequest;
use App\Models\Facilitator;
use App\Repositories\Admin\FacilitatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class FacilitatorController
 * @package App\Http\Controllers\Api
 */

class FacilitatorAPIController extends AppBaseController
{
    /** @var  FacilitatorRepository */
    private $facilitatorRepository;

    public function __construct(FacilitatorRepository $facilitatorRepo)
    {
        $this->facilitatorRepository = $facilitatorRepo;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @return Response
     *
     * @SWG\Get(
     *      path="/facilitators",
     *      summary="Get a listing of the Facilitators.",
     *      tags={"Facilitator"},
     *      description="Get all Facilitators",
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
     *                  @SWG\Items(ref="#/definitions/Facilitator")
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
        $this->facilitatorRepository->pushCriteria(new RequestCriteria($request));
        $this->facilitatorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $facilitators = $this->facilitatorRepository->all();

        return $this->sendResponse($facilitators->toArray(), 'Facilitators retrieved successfully');
    }

    /**
     * @param CreateFacilitatorAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/facilitators",
     *      summary="Store a newly created Facilitator in storage",
     *      tags={"Facilitator"},
     *      description="Store Facilitator",
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
     *          description="Facilitator that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Facilitator")
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
     *                  ref="#/definitions/Facilitator"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFacilitatorAPIRequest $request)
    {
        $facilitators = $this->facilitatorRepository->saveRecord($request);

        return $this->sendResponse($facilitators->toArray(), 'Facilitator saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/facilitators/{id}",
     *      summary="Display the specified Facilitator",
     *      tags={"Facilitator"},
     *      description="Get Facilitator",
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
     *          description="id of Facilitator",
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
     *                  ref="#/definitions/Facilitator"
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
        /** @var Facilitator $facilitator */
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            return $this->sendError('Facilitator not found');
        }

        return $this->sendResponse($facilitator->toArray(), 'Facilitator retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFacilitatorAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/facilitators/{id}",
     *      summary="Update the specified Facilitator in storage",
     *      tags={"Facilitator"},
     *      description="Update Facilitator",
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
     *          description="id of Facilitator",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Facilitator that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Facilitator")
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
     *                  ref="#/definitions/Facilitator"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFacilitatorAPIRequest $request)
    {
        /** @var Facilitator $facilitator */
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            return $this->sendError('Facilitator not found');
        }

        $facilitator = $this->facilitatorRepository->updateRecord($request, $id);

        return $this->sendResponse($facilitator->toArray(), 'Facilitator updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/facilitators/{id}",
     *      summary="Remove the specified Facilitator from storage",
     *      tags={"Facilitator"},
     *      description="Delete Facilitator",
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
     *          description="id of Facilitator",
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
        /** @var Facilitator $facilitator */
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            return $this->sendError('Facilitator not found');
        }

        $this->facilitatorRepository->deleteRecord($id);

        return $this->sendResponse($id, 'Facilitator deleted successfully');
    }
}
