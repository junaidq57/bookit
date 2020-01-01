<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\FacilitatorDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFacilitatorRequest;
use App\Http\Requests\Admin\UpdateFacilitatorRequest;
use App\Repositories\Admin\FacilitatorRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;

class FacilitatorController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  FacilitatorRepository */
    private $facilitatorRepository;

    public function __construct(FacilitatorRepository $facilitatorRepo)
    {
        $this->facilitatorRepository = $facilitatorRepo;
        $this->ModelName = 'facilitators';
        $this->BreadCrumbName = 'Facilitators';
    }

    /**
     * Display a listing of the Facilitator.
     *
     * @param FacilitatorDataTable $facilitatorDataTable
     * @return Response
     */
    public function index(FacilitatorDataTable $facilitatorDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return $facilitatorDataTable->render('admin.facilitators.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new Facilitator.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return view('admin.facilitators.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created Facilitator in storage.
     *
     * @param CreateFacilitatorRequest $request
     *
     * @return Response
     */
    public function store(CreateFacilitatorRequest $request)
    {
        $facilitator = $this->facilitatorRepository->saveRecord($request);

        Flash::success($this->BreadCrumbName . ' saved successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.facilitators.create'));
        } elseif (isset($request->translation)) {
            $redirect_to = redirect(route('admin.facilitators.edit', $facilitator->id));
        } else {
            $redirect_to = redirect(route('admin.facilitators.index'));
        }
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);
    }

    /**
     * Display the specified Facilitator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitators.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $facilitator);
        return view('admin.facilitators.show')->with(['facilitator' => $facilitator, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for editing the specified Facilitator.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitators.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $facilitator);
        return view('admin.facilitators.edit')->with(['facilitator' => $facilitator, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Update the specified Facilitator in storage.
     *
     * @param  int              $id
     * @param UpdateFacilitatorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacilitatorRequest $request)
    {
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitators.index'));
        }

        $facilitator = $this->facilitatorRepository->updateRecord($request, $facilitator);

        Flash::success($this->BreadCrumbName . ' updated successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.facilitators.create'));
        } else {
            $redirect_to = redirect(route('admin.facilitators.index'));
        }
        return $redirect_to->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified Facilitator from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facilitator = $this->facilitatorRepository->findWithoutFail($id);

        if (empty($facilitator)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.facilitators.index'));
        }

        $this->facilitatorRepository->deleteRecord($id);

        Flash::success($this->BreadCrumbName . ' deleted successfully.');
        return redirect(route('admin.facilitators.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
