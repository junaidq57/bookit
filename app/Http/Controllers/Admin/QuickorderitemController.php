<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\DataTables\Admin\QuickorderitemDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateQuickorderitemRequest;
use App\Http\Requests\Admin\UpdateQuickorderitemRequest;
use App\Repositories\Admin\QuickorderitemRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Response;

class QuickorderitemController extends AppBaseController
{
    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    /** @var  QuickorderitemRepository */
    private $quickorderitemRepository;

    public function __construct(QuickorderitemRepository $quickorderitemRepo)
    {
        $this->quickorderitemRepository = $quickorderitemRepo;
        $this->ModelName = 'quickorderitems';
        $this->BreadCrumbName = 'Quickorderitems';
    }

    /**
     * Display a listing of the Quickorderitem.
     *
     * @param QuickorderitemDataTable $quickorderitemDataTable
     * @return Response
     */
    public function index(QuickorderitemDataTable $quickorderitemDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return $quickorderitemDataTable->render('admin.quickorderitems.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new Quickorderitem.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName);
        return view('admin.quickorderitems.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created Quickorderitem in storage.
     *
     * @param CreateQuickorderitemRequest $request
     *
     * @return Response
     */
    public function store(CreateQuickorderitemRequest $request)
    {
        $quickorderitem = $this->quickorderitemRepository->saveRecord($request);

        Flash::success($this->BreadCrumbName . ' saved successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.quickorderitems.create'));
        } elseif (isset($request->translation)) {
            $redirect_to = redirect(route('admin.quickorderitems.edit', $quickorderitem->id));
        } else {
            $redirect_to = redirect(route('admin.quickorderitems.index'));
        }
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);
    }

    /**
     * Display the specified Quickorderitem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorderitems.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $quickorderitem);
        return view('admin.quickorderitems.show')->with(['quickorderitem' => $quickorderitem, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for editing the specified Quickorderitem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorderitems.index'));
        }

        BreadcrumbsRegister::Register($this->ModelName,$this->BreadCrumbName, $quickorderitem);
        return view('admin.quickorderitems.edit')->with(['quickorderitem' => $quickorderitem, 'title' => $this->BreadCrumbName]);
    }

    /**
     * Update the specified Quickorderitem in storage.
     *
     * @param  int              $id
     * @param UpdateQuickorderitemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuickorderitemRequest $request)
    {
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorderitems.index'));
        }

        $quickorderitem = $this->quickorderitemRepository->updateRecord($request, $quickorderitem);

        Flash::success($this->BreadCrumbName . ' updated successfully.');
        if (isset($request->continue)) {
            $redirect_to = redirect(route('admin.quickorderitems.create'));
        } else {
            $redirect_to = redirect(route('admin.quickorderitems.index'));
        }
        return $redirect_to->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified Quickorderitem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quickorderitem = $this->quickorderitemRepository->findWithoutFail($id);

        if (empty($quickorderitem)) {
            Flash::error($this->BreadCrumbName . ' not found');
            return redirect(route('admin.quickorderitems.index'));
        }

        $this->quickorderitemRepository->deleteRecord($id);

        Flash::success($this->BreadCrumbName . ' deleted successfully.');
        return redirect(route('admin.quickorderitems.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
