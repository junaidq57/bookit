<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\FacilitatorTrackDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFacilitatorTrackRequest;
use App\Http\Requests\Admin\UpdateFacilitatorTrackRequest;
use App\Repositories\Admin\FacilitatorTrackRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;

class FacilitatorTrackController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  FacilitatorTrackRepository */
    private $facilitatorTrackRepository;

    public function __construct(FacilitatorTrackRepository $facilitatorTrackRepo)
    {
        $this->facilitatorTrackRepository = $facilitatorTrackRepo;
        $this->ModelName = 'facilitator-tracks';
        $this->BreadCrumbName = 'Facilitator Tracks';
    }

    /**
     * Display a listing of the FacilitatorTrack.
     *
     * @param FacilitatorTrackDataTable $facilitatorTrackDataTable
     * @return Response
     */
    public function index(FacilitatorTrackDataTable $facilitatorTrackDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return $facilitatorTrackDataTable->render('admin.facilitator_tracks.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new FacilitatorTrack.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return view('admin.facilitator_tracks.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created FacilitatorTrack in storage.
     *
     * @param CreateFacilitatorTrackRequest $request
     *
     * @return Response
     */
    public function store(CreateFacilitatorTrackRequest $request)
    {
        $facilitatorTrack = $this->facilitatorTrackRepository->saveRecord($request);

        Flash::success($this->BreadCrumbName . ' saved successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.facilitator-tracks.create'));
        } elseif (isset($request->translation)) {
            $redirect_to = redirect(route('admin.facilitator-tracks.edit', $facilitatorTrack->id));
        } else {
            $redirect_to = redirect(route('admin.facilitator-tracks.index'));
        }
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);
    }

    /**
     * Display the specified FacilitatorTrack.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitator-tracks.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $facilitatorTrack);
        return view('admin.facilitator_tracks.show')->with(['facilitatorTrack' => $facilitatorTrack, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for editing the specified FacilitatorTrack.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitator-tracks.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $facilitatorTrack);
        return view('admin.facilitator_tracks.edit')->with(['facilitatorTrack' => $facilitatorTrack, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Update the specified FacilitatorTrack in storage.
     *
     * @param  int              $id
     * @param UpdateFacilitatorTrackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacilitatorTrackRequest $request)
    {
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitator-tracks.index'));
        }

        $facilitatorTrack = $this->facilitatorTrackRepository->updateRecord($request, $facilitatorTrack);

        Flash::success($this->BreadCrumbName . ' updated successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.facilitator-tracks.create'));
        } else {
            $redirect_to = redirect(route('admin.facilitator-tracks.index'));
        }
        return $redirect_to->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified FacilitatorTrack from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facilitatorTrack = $this->facilitatorTrackRepository->findWithoutFail($id);

        if (empty($facilitatorTrack)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitator-tracks.index'));
        }

        $this->facilitatorTrackRepository->deleteRecord($id);

        Flash::success($this->BreadCrumbName . ' deleted successfully.');
        return redirect(route('admin.facilitator-tracks.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
