<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Repositories\Admin\RoleRepository;
use App\Helper\BreadcrumbsRegister;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laracasts\Flash\Flash;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends AppBaseController
{
    /** RoleRepository */
    private $roleRepository;

    /** ModelName */
    private $ModelName;

    /** BreadCrumbName */
    private $BreadCrumbName;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
        $this->ModelName = 'roles';
        $this->BreadCrumbName = 'Role';
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return $roleDataTable->render('admin.roles.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return view('admin.roles.create')->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success('Role saved successfully.');
        if (isset($request->permissions)) {
            $route = redirect(route('admin.roles.edit', $role->id));
        } else {
            $route = redirect(route('admin.roles.index'));
        }
        return $route->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');
            return redirect(route('admin.roles.index'));
        }
        $permissions = $modules = [];
        $modules = Module::all();

        foreach ($modules as $key => $module) {
            if ($module->is_module == 0) {
                $module_slug = $module->slug;
            } else {
                $module_slug = $module->slug . '.';
            }
            $permissions[$key] = Permission::where('name', 'LIKE', $module_slug . '%')->orderBy('id', 'ASC')->get()->toArray();
        }

        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $role);
        return view('admin.roles.show')->with([
            'role'        => $role,
            'permissions' => $permissions,
            'title'       => $this->BreadCrumbName,
            'modules'     => $modules
        ]);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);
        if (empty($role)) {
            Flash::error('Role not found');
            return redirect(route('admin.roles.index'));
        }
        $permissions = $modules = $modulePermissions = [];
        $modules = Module::orderBy('is_module', 'ASC')->get();

        foreach ($modules as $key => $module) {
            if ($module->is_module == 0) {
                $module_slug = $module->slug;
            } else {
                $module_slug = $module->slug . '.';
            }
            $permissions[$key] = Permission::where('name', 'LIKE', $module_slug . '%')->orderBy('id', 'ASC')->get()->toArray();

            foreach ($permissions[$key] as $permission) {
                $modulePermissions[$key][] = Auth::user()->can($permission['name']);
            }
        }

        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $role);
        return view('admin.roles.edit')->with([
            'role'              => $role,
            'permissions'       => $permissions,
            'title'             => $this->BreadCrumbName,
            'modulePermissions' => $modulePermissions,
            'modules'           => $modules
        ]);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $data = $request->all();
        unset($data['name']);

        $selectedPermissions = [];

        if ($request->has('permissions') || $request->get('permissions', null) !== null) {
            $selectedPermissions = array_keys($request->get('permissions'));
            unset($data['permissions']);
        }

        $role = $this->roleRepository->update($data, $id);

        $existingPermissions = $role->perms->pluck('id')->all();
        $newPermissions = array_diff($selectedPermissions, $existingPermissions);
        $permissionsToBeDeleted = array_diff($existingPermissions, $selectedPermissions);

        foreach ($newPermissions as $newPermission) {
            $this->roleRepository->attachPermission($role->id, $newPermission);
        }
        foreach ($permissionsToBeDeleted as $permissionToBeDeleted) {
            $this->roleRepository->detachPermission($role->id, $permissionToBeDeleted);
        }

        Flash::success('Role updated successfully.');

        return redirect(route('admin.roles.index'))->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }
        if ($role->is_protected == 1) {
            Flash::error('Default Roles Cannot be deleted');
            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'))->with(['title' => $this->BreadCrumbName]);
    }
}
