<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'View all Roles';
        $roles = Role::orderBy('name', 'asc')->get();

        return view('admin.roles.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'add New Role';

        return view('admin.roles.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'title'  => 'required|unique:permissions|min:2',
        ]);

        Role::create([
            'title' => $validationData['title'],
            'name'  => Str::slug($validationData['title']),
        ]);

        return response()->json("{$validationData['title']} role created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $roleTitle = Role::select('title')->where('id', "=", $role['id'])->first();
        $title = "Check about {$roleTitle->title}";
        $permissions = $role->permissions;

        return view('admin.roles.view', compact('title', 'role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('edit-role', $role);

        $title = "Update information $role->name";

        return view('admin.roles.edit', compact('title', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('edit_role', $role);
        $validateData = $request->validate(array(
            'title' =>  'required|unique:roles'
        ));

        $role->update([
            'title' => $validateData['title'],
            'name'  => Str::slug($validateData['title'])
        ]);

        return  redirect("admin/roles/{$role->id}")->with("success", "Role has been updated to {$validateData['title']}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */

    public function permissionForm(Role $role){
        $title = "Assign New Permissions";
        $permissions = Permission::all();
        return view('admin.permissions.assign', compact('title', 'role', 'permissions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */

    public function assignPermission(Request $request, Role $role){
        $permissions =  $request->input('permission');
        $role->permissions()->sync($permissions);
        return redirect("admin/roles")->with('success', " Permissions has been assigned to {$role->name}");
    }
}
