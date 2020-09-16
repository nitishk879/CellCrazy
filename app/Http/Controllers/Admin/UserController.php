<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = $user->roles;

        return view('admin.users.view', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "Edit $user->name";

        return view("admin.users.edit", compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate(array(
            'name'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
        ));

        $user->update([
            'name'  => $validateData['name'],
            'email'  => $validateData['email'],
            'phone'  => $validateData['phone'],
        ]);

        return redirect("admin/users/{$user->id}")->with("success", "{$user->name}User updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('User removed from database');
    }
    public function roleForm(User $user){
        $title = "Assign New Role";
        $roles = Role::all();
        return view('admin.roles.assign', compact('title', 'user', 'roles'));
    }
    public function assignRole(Request $request, User $user){
        $roles =  $request->input('role');
        $user->roles()->sync($roles);
        return redirect("admin/users")->with('success', " Role has been assigned to {$user->name}");
    }
}
