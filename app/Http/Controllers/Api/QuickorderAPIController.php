<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateQuickorderAPIRequest;
use App\Http\Requests\Api\UpdateQuickorderAPIRequest;
use App\Models\Quickorder;
use App\Jobs\SendPushNotification;
use App\Repositories\Admin\QuickorderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;

/**
 * Class QuickorderController
 * @package App\Http\Controllers\Api
 */

class QuickorderAPIController extends AppBaseController
{
    /** @var  QuickorderRepository */
    private $quickorderRepository;

    private $pushNotification;

    public function __construct(QuickorderRepository $quickorderRepo)
    {
        $this->quickorderRepository = $quickorderRepo;
        //$this->pushNotification = $pushNotification;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @return Response
     *
     * @SWG\Get(
     *      path="/quickorders",
     *      summary="Get a listing of the Quickorders.",
     *      tags={"Quickorder"},
     *      description="Get all Quickorders",
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
     *                  @SWG\Items(ref="#/definitions/Quickorder")
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
        $this->quickorderRepository->pushCriteria(new RequestCriteria($request));
        $this->quickorderRepository->pushCriteria(new LimitOffsetCriteria($request));
        $quickorders = $this->quickorderRepository->all();
        $orderIds = $this->quickorderRepository->all(['id']);

        $quickorders = $quickorders->toArray();
        foreach ($quickorders as $key => $value) {
            # code...
            $orderIt = \DB::table('quick_order_items')->where('order_id', $value['id'])->get()->toArray();
            $quickorders[$key]['items'] = $orderIt;

        }

        return $this->sendResponse($quickorders, 'Quickorders retrieved successfully');
    }

    /**
     * @param CreateQuickorderAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/quickorders",
     *      summary="Store a newly created Quickorder in storage",
     *      tags={"Quickorder"},
     *      description="Store Quickorder",
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
     *          description="Quickorder that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quickorder")
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
     *                  ref="#/definitions/Quickorder"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateQuickorderAPIRequest $request)
    {
        $quickorders = $this->quickorderRepository->saveRecord($request);

        return $this->sendResponse($quickorders, 'Quickorder saved successfully');
    }


    public function payment(CreateQuickorderAPIRequest $request){
        //var_dump($request);
        var_dump("shakakakakak");
        die;

        // $chargeTest = new TestCharge();
        // $chargeTest->token = 
        // $response = $chargeTest->testChargeAuth();

        var_dump($response);
        die;
    }



    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/quickorders/{id}",
     *      summary="Display the specified Quickorder",
     *      tags={"Quickorder"},
     *      description="Get Quickorder",
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
     *          description="id of Quickorder",
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
     *                  ref="#/definitions/Quickorder"
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
        /** @var Quickorder $quickorder */
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            return $this->sendError('Quickorder not found');
        }
        
        $orderIt = \DB::table('quick_order_items')->where('order_id', $id)->get()->toArray();
        $quickOrder = $quickOrder->toArray();
        $quickOrder['items'] = $orderIt;

        return $this->sendResponse($quickorder->toArray(), 'Quickorder retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateQuickorderAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/quickorders/{id}",
     *      summary="Update the specified Quickorder in storage",
     *      tags={"Quickorder"},
     *      description="Update Quickorder",
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
     *          description="id of Quickorder",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Quickorder that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Quickorder")
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
     *                  ref="#/definitions/Quickorder"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateQuickorderAPIRequest $request)
    {
        /** @var Quickorder $quickorder */
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            return $this->sendError('Quickorder not found');
        }

        $quickorder = $this->quickorderRepository->updateRecord($request, $id);

        return $this->sendResponse($quickorder->toArray(), 'Quickorder updated successfully');
    }
    
    public function updateData(CreateQuickorderAPIRequest $request)
    {
        /** @var QuickOrder $quickOrder */
        $quickOrder = $this->quickorderRepository->findWithoutFail($request->id);

        if (empty($quickOrder)) {
            return $this->sendError('Quick Order not found');
        }

        $quickOrder = $this->quickorderRepository->updateRecordfunction($request, $request->id);

        return $this->sendResponse($quickOrder, 'QuickOrder updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/quickorders/{id}",
     *      summary="Remove the specified Quickorder from storage",
     *      tags={"Quickorder"},
     *      description="Delete Quickorder",
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
     *          description="id of Quickorder",
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
        /** @var Quickorder $quickorder */
        $quickorder = $this->quickorderRepository->findWithoutFail($id);

        if (empty($quickorder)) {
            return $this->sendError('Quickorder not found');
        }

        $this->quickorderRepository->deleteRecord($id);

        return $this->sendResponse($id, 'Quickorder deleted successfully');
    }
}
