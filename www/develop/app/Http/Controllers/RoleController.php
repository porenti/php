<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        $frd = $request->all();
        $roles = Role::filter($frd)->with('permissions')->paginate(20);
        $permissions = Permission::pluck('id', 'display_name');




        return view('roles.index', compact('roles', 'permissions'));//,'perms'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    public function permissions(Role $role)
    {
        $permissions = Permission::pluck('display_name', 'id');
        $rolePermissionIds = $role->permissions()->pluck('id')->toArray();
        return view('roles.permissions', compact('permissions', 'role', 'rolePermissionIds'));
    }

    public function permissionsUpdate(Request $request, Role $role)
    {

        $request->validate([
            'permission_ids' => 'required|array'
        ]);

        $role->permissions()->sync($request->input('permission_ids'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Role::create($request->only(['name', 'description', 'display_name']));

        return redirect()->route('roles.index');
    }

    public function updatePerm(Request $request, Role $role)
    {
        foreach ($role->permissions() as $perma) {
            $role->detachPermissions($perma);
        }

        foreach ($request['roles'] as $perm) {
            $role->attachPermission($perm);
        }
        //dd($role->permissions()->get());
        return redirect()->route('roles.index');
        //dd($request['roles'],$role);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $frd = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'display_name' => 'required|string|nullable',
        ]);

        $role->update($frd);

        return redirect()->route('roles.edit', $role);


        /*
        $roles = Role::get();
        $all_perms = Permission::select(['display_name','id'])->get();
        return view('roles.roles-main', compact('roles','all_perms'));//,'perms'));*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $roleName = $role->getDisplayName();
        $role->delete();


        \Session::flash('flash_message', [
            'type' => 'success',
            'text' => 'Роль ' . $roleName . ' успешно удалена'
        ]);

        return redirect()->route('roles.index');
    }
}
