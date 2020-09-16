<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Our Types';
        $types = Type::withCount('items')->get();

        return  view('admin.types.index', compact('title','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create New type for the Items";
        return view('admin.types.create', compact('title'));
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
            'name'  => 'required|unique:types|min:2',
        ]);

        Type::create([
            'name' => $validationData['name'],
            'slug'  => Str::slug($validationData['name']),
            'user_id'   =>  Auth::id()
        ]);

        return redirect("admin/types")->with("{$validationData['name']} type has been created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $title = "Detail page of type {$type->name}";
        return view('admin.types.view', compact('title', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        Gate::authorize('edit-type', $type);
        $title = "Edit {$type->name}";
        return view('admin.types.edit', compact('title', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        Gate::authorize('edit-type', $type);
        $validationData = $request->validate([
            'name'  => 'required|min:2',
        ]);

        $type->update([
            'name' => $validationData['name'],
            'slug'  => Str::slug($validationData['name']),
            'user_id'   =>  Auth::id()
        ]);
        return redirect()->route('admin.types.show', ['type' => $type->id])->with("success", "{$type->name} has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
