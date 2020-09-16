<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Our Brands';
        $brands = Brand::withCount('items')->get();

        return view('admin.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add your Brand here";
        return view('admin.brands.create', compact('title'));
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {

        return view('admin.brands.view', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $title = "Edit";

        return view("admin.brands.edit", compact('title', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $formValidation = $request->validate(array(
            'name' => 'required',
            'image' => 'image|nullable|max:5200',
        ));

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = "{$fileName }.{$fileExt}";
            $request->file('image')->storeAs('public/brands', $fileNameToStore);

        }else{
            $fileNameToStore = $brand->image ?? 'no-image.jpg';
        }

        $brand->name    = $formValidation['name'];
        $brand->slug    = Str::slug($formValidation['name']);
        $brand->image   = $fileNameToStore;
        $brand->user_id = Auth::id();
        $brand->save();

        return redirect('admin/brands')->with('success', "{$brand->name} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
