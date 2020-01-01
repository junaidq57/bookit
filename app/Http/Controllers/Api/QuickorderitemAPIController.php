<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateQuickorderitemAPIRequest;
use App\Http\Requests\Api\UpdateQuickorderitemAPIRequest;
use App\Models\Quickorderitem;
use App\Repositories\Admin\QuickorderitemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class QuickorderitemController
 * @package App\Http\Controllers\Api
 */

class QuickorderitemAPIController extends AppBaseController
{
    /** @var  QuickorderitemRepository */
    private $quickorderitemRepository;

    public function __construct(QuickorderitemRepository $quickorderitemRepo)
    {
        $this->quickorderitemRepository = $quickorderitemRepo;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @return Response
     *
     * @SWG\Get(
     *      path="/quickorderitems",
     *      summary="Get a listing of the Quickorderitems.",
     *      tags={"Quickorderitem"},
     *      description="Get all Quickorderitems",
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
     *                  @SWG\Items(ref="#/definitions/Quickorderitem")
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
        $this->quickorderitemRepository->pushCriteria(new RequestCriteria($request));
        $this->quickorderitemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $quickorderitems = $this->quickorderitemRepository->all();

        return $this->sendResponse($quickorderitems->toArray(), 'Quickorderitems retrieved successfully');
    }

    /**
     * @param CreateQuickorderitemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/quickorderitems",
     *      summary="Store a newly created Quickorderitem in storage",
     *      tags={"Quickorderitem"},
     *      description="Store Quickorderitem",
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
     *          description="Quickorderitem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quickorderitem")
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
     *                  ref="#/definitions/Quickorderitem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateQuickorderitemAPIRequest $request)
    {
        $quickorderitems = $this->quickorderitemRepository->saveRecord($request);

        return $this->sendResponse($quickorderitems->toArray(), 'Quickorderitem saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/quickorderitems/{id}",
     *      summary="Display the specified Quickorderitem",
     *      tags={"Quickorderitem"},
     *      description="Get Quickorderitem",
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
     *          description="id of Quickorderitem",
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
     *                  ref="#/definitions/Quickorderitem"
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
        /** @var Quickorderitem $quickorderitem */
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            return $this->sendError('Quickorderitem not found');
        }

        return $this->sendResponse($quickorderitem->toArray(), 'Quickorderitem retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateQuickorderitemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/quickorderitems/{id}",
     *      summary="Update the specified Quickorderitem in storage",
     *      tags={"Quickorderitem"},
     *      description="Update Quickorderitem",
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
     *          description="id of Quickorderitem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Quickorderitem that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quickorderitem")
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
     *                  ref="#/definitions/Quickorderitem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateQuickorderitemAPIRequest $request)
    {
        /** @var Quickorderitem $quickorderitem */
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            return $this->sendError('Quickorderitem not found');
        }

        $quickorderitem = $this->quickorderitemRepository->updateRecord($request, $id);

        return $this->sendResponse($quickorderitem->toArray(), 'Quickorderitem updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/quickorderitems/{id}",
     *      summary="Remove the specified Quickorderitem from storage",
     *      tags={"Quickorderitem"},
     *      description="Delete Quickorderitem",
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
     *          description="id of Quickorderitem",
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
        /** @var Quickorderitem $quickorderitem */
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            return $this->sendError('Quickorderitem not found');
        }

        $this->quickorderitemRepository->deleteRecord($id);

        return $this->sendResponse($id, 'Quickorderitem deleted successfully');
    }
}
