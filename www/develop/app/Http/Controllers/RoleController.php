<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::get();
        $all_perms = Permission::select(['display_name','id'])->get();
        //$perms = Permission::get();
        return view('roles.roles-main', compact('roles','all_perms'));//,'perms'));
    }

    public function chekRolePermission(Request $request)
    {
      $roles = Role::get(); //надо бы тоже в инициализацию воткнуть
      //dd($request['roles'][0]);
      $role = Role::where('id',$request['roles'][0])->get();
      //dd($role[0]->permissions()->select('display_name')->get());
      //dd($role[0]['name']);
      $all_perms = Permission::select(['name','id','display_name'])->get();
      //$perms = $role[0]->permissions()->select('name')->get();
      $frd = $role[0];
      return view('roles.roles-main', compact('frd','roles','all_perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create($request->only(['name','description','display_name']));

        return redirect()->route('roles.index');
    }

    public function updatePerm(Request $request, Role $role)
    {
      foreach($role->permissions() as $perma)
      {
        $role->detachPermissions($perma);
      }

      foreach($request['roles'] as $perm)
      {
        $role->attachPermission($perm);
      }
      //dd($role->permissions()->get());
      return redirect()->route('roles.index');
      //dd($request['roles'],$role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        /*dd($request, $role);
        $frd = $request->validate([
          'name' => 'required',
          'description' => 'required',
          'display_name' => 'required',
        ])*/
        //Геттеры и сеттеры самому прописывать? оставил нежелательный пример
        $role->update($request->only(['name','description','display_name']));
        return redirect()->route('roles.index');


        /*
        $roles = Role::get();
        $all_perms = Permission::select(['display_name','id'])->get();
        return view('roles.roles-main', compact('roles','all_perms'));//,'perms'));*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

          $role->delete();

          return redirect()->route('roles.index');
    }
}
