<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Brand;
use App\Category;
use App\Item;
use App\ProductModel;
use App\Service;
use App\Type;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  =   "Brands we deals in";
        $brands =   Brand::all();

        return view('pages.brands', compact('title', 'brands'));
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
     * @param  \App\Brand  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $brand  =   Brand::where('slug', $slug)->firstOrFail();
        $tyo    =   $brand->items->pluck('type_id')->unique();
        $types  =    Type::whereIn('id', $tyo)->get();
        $title  =   "{$brand->name}";

        return view('pages.brand', compact('title', 'brand', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * i.e. brand/apple/phones
     *
     * @param  string $type_slug
     * @param  string $brand_slug
     * @return \Illuminate\Http\Response
     */
    public function view($brand_slug, $type_slug)
    {
        $brand  =   Brand::where('slug', $brand_slug)->firstOrFail();
        $type   =   Type::where('slug', $type_slug)->firstOrFail();
        $items  =   Item::where('type_id', $type->id)->where('brand_id', $brand->id)->paginate(12);
        $categories = Category::all();

        return view('pages.brands.brand-item', compact('items', 'categories'));
    }

    public function categories($brand_slug, $category_slug){
        $brand      =   Brand::where('slug', $brand_slug)->firstOrFail();
        $category   =   Category::where('slug', $category_slug)->firstOrFail();

        $items      =   Accessory::where('brand_id', $brand->id)->where('category_id', $category->id)->paginate(12);
        $title      =   "{$category->name} Under {$brand->name}";

        if($category->id==4){
            return view('pages.items.accessories', compact('title', 'items', 'category'));
        }

        return redirect('/');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * i.e. brand/apple/phones
     *
     * @param  $type_slug
     * @param  $brand_slug
     * @param  $category_slug
     * @param  $product
     * @return \Illuminate\Http\Response
     */
    public function category($brand_slug, $category_slug, $type_slug, $product){
        return $brand_slug.$category_slug.$type_slug.$product;
    }
}
