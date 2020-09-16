<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Permissions";
        $permissions = Permission::paginate(15);
        return view('admin.permissions.index', compact('title', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $permission)
    {
        Gate::authorize('edit-permission', $permission);

        $title = 'Add New Permission';

        return view('admin.permissions.create', compact('title'));
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

        Permission::create([
            'title' => $validationData['title'],
            'name'  => Str::slug($validationData['title']),
        ]);

        return redirect("admin/permissions")->with("success", "{$validationData['title']} permission created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        Gate::authorize('view-permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {

        Gate::authorize('edit-permission', $permission);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        Gate::authorize('edit-permission', $permission);
        $validationData = $request->validate([
            'title'  => 'required|unique:permissions|min:2',
        ]);

        Permission::update([
            'title' => $validationData['title'],
            'name'  => Str::slug($validationData['title']),
        ]);

        return  redirect("admin/permissions/{$permission->id}")->with("success", "{$permission->title} has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Gate::authorize('edit-permission', $permission);
        $permission->delete();

        return redirect("admin/permissions")->with("success", "Permission has been removed.");
    }
}
