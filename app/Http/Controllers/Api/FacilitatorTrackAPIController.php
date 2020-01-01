<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CreateFacilitatorTrackAPIRequest;
use App\Http\Requests\Api\UpdateFacilitatorTrackAPIRequest;
use App\Models\FacilitatorTrack;
use App\Repositories\Admin\FacilitatorTrackRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Response;
use App\Helper\FindShortDistance;
use App\Helper\TestCharge;

/**
 * Class FacilitatorTrackController
 * @package App\Http\Controllers\Api
 */

class FacilitatorTrackAPIController extends AppBaseController
{
    /** @var  FacilitatorTrackRepository */
    private $facilitatorTrackRepository;

    public function __construct(FacilitatorTrackRepository $facilitatorTrackRepo)
    {
        $this->facilitatorTrackRepository = $facilitatorTrackRepo;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @return Response
     *
     * @SWG\Get(
     *      path="/facilitator-tracks",
     *      summary="Get a listing of the FacilitatorTracks.",
     *      tags={"FacilitatorTrack"},
     *      description="Get all FacilitatorTracks",
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
     *                  @SWG\Items(ref="#/definitions/FacilitatorTrack")
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
        
        $data = array('24.943331','67.106525');
        $FindShortDistance = new FindShortDistance($this->facilitatorTrackRepository);
        print_r($FindShortDistance->getFacilitatorTracks($data));

        die;

        $this->facilitatorTrackRepository->pushCriteria(new RequestCriteria($request));
        $this->facilitatorTrackRepository->pushCriteria(new LimitOffsetCriteria($request));
        $facilitatorTracks = $this->facilitatorTrackRepository->all();

        return $this->sendResponse($facilitatorTracks->toArray(), 'Facilitator Tracks retrieved successfully');
    }

    /**
     * @param CreateFacilitatorTrackAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/facilitator-tracks",
     *      summary="Store a newly created FacilitatorTrack in storage",
     *      tags={"FacilitatorTrack"},
     *      description="Store FacilitatorTrack",
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
     *          description="FacilitatorTrack that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FacilitatorTrack")
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
     *                  ref="#/definitions/FacilitatorTrack"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFacilitatorTrackAPIRequest $request)
    {
        $facilitatorTracks = $this->facilitatorTrackRepository->saveRecord($request);

        return $this->sendResponse($facilitatorTracks->toArray(), 'Facilitator Track saved successfully');
    }
    

    public function payment(Request $request){
        $chargeTest = new TestCharge($request->token, $request->vallet, $request->orderid);    
        $response = $chargeTest->testChargeAuth();
        return $this->sendResponse($response, 'Payment successful');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/facilitator-tracks/{id}",
     *      summary="Display the specified FacilitatorTrack",
     *      tags={"FacilitatorTrack"},
     *      description="Get FacilitatorTrack",
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
     *          description="id of FacilitatorTrack",
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
     *                  ref="#/definitions/FacilitatorTrack"
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
        /** @var FacilitatorTrack $facilitatorTrack */
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            return $this->sendError('Facilitator Track not found');
        }

        return $this->sendResponse($facilitatorTrack->toArray(), 'Facilitator Track retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFacilitatorTrackAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/facilitator-tracks/{id}",
     *      summary="Update the specified FacilitatorTrack in storage",
     *      tags={"FacilitatorTrack"},
     *      description="Update FacilitatorTrack",
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
     *          description="id of FacilitatorTrack",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FacilitatorTrack that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FacilitatorTrack")
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
     *                  ref="#/definitions/FacilitatorTrack"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFacilitatorTrackAPIRequest $request)
    {
        /** @var FacilitatorTrack $facilitatorTrack */
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            return $this->sendError('Facilitator Track not found');
        }

        $facilitatorTrack = $this->facilitatorTrackRepository->updateRecord($request, $id);

        return $this->sendResponse($facilitatorTrack->toArray(), 'FacilitatorTrack updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/facilitator-tracks/{id}",
     *      summary="Remove the specified FacilitatorTrack from storage",
     *      tags={"FacilitatorTrack"},
     *      description="Delete FacilitatorTrack",
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
     *          description="id of FacilitatorTrack",
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
        /** @var FacilitatorTrack $facilitatorTrack */
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            return $this->sendError('Facilitator Track not found');
        }

        $this->facilitatorTrackRepository->deleteRecord($id);

        return $this->sendResponse($id, 'Facilitator Track deleted successfully');
    }
}
