<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Our Categories';
        $categories = Category::withCount('types')->get();

        return  view('admin.categories.index', compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "Create New Category for the Items";
        $services = Service::all();
        return view('admin.categories.create', compact('title', 'services'));
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
            'name'      => 'required|unique:categories|min:2',
            'service'   =>  'required'
        ]);

        Category::create([
            'name'          => $validationData['name'],
            'slug'          => Str::slug($validationData['name']),
            'service_id'    => $validationData['service'],
            'user_id'       =>  Auth::id()
        ]);

        return redirect("admin/categories")->with("{$validationData['name']} category has been created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $title = "Detail page of Category {$category->name}";
        return view('admin.categories.view', compact('title', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        Gate::authorize('edit-category', $category);
        $title = "Edit {$category->name}";
        $services = Service::all();
        return view('admin.categories.edit', compact('title', 'category', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('edit-category', $category);
        $validationData = $request->validate([
            'name'  => 'required|min:2',
            'service'   => 'required'
        ]);

        $category->update([
            'name' => $validationData['name'],
            'slug'  => Str::slug($validationData['name']),
            'service_id'    => $validationData['service'],
            'user_id'       =>  Auth::id()
        ]);

        return redirect("admin/categories/{$category->id}")->with("success", "{$category->name} has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
