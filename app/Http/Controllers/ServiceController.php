<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Item;
use App\ProductModel;
use App\Service;
use App\Type;
use http\Client\Response;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Services in which we deals in";
        $services = Service::all();

        return view('pages.services', compact('title', 'services'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $services = Service::all();
        $service = Service::where('slug', $slug)->firstOrFail();
        if($service->id==3){
            $brands = Brand::find([1,2,3,4]);
        }else{
            $brands = Brand::find([1,2]);
        }
        $title = "We have following type in it";

        return view('pages.service', compact('title', 'service', 'brands', 'services'));
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyItems(){
        $brands = Brand::with('items')->where('service_id', 1)->paginate();

        return view("pages.brands", compact('brands'));
    }
    public function buyCategoryItems($slug)
    {
        $services = Service::all();

        $category = Category::where('slug', $slug)->firstOrFail();
        $service = $category->service;

        $title = "{$service->name} your {$category->name}";

        $items = Item::whereIn('category_id', $category->service->id)->where('category_id', $category->id)->paginate(5);

        return view('pages.items.index', compact('title',  'service', 'services', 'items'));
    }
    public function buyCategoryTypeItems($cat, $typ)
    {
        $services = Service::all();

        $category = Category::firstWhere('slug', $cat);
        $type = Type::where('slug', $typ)->firstOrFail();

        $items = Item::where('category_id', $category->id)->where('type_id', $type->id)->paginate(15);

        $title = "Here are {$category->name}";

        return view('pages.items.index', compact('title', 'items', 'services'));
    }


    /**
     * Let's get services and their respective brands
     * i.e. /services/buy/apple
     *
     * @param string $service_slug
     * @param string $brand_slug
     * @return \Illuminate\Http\Response
     *
    **/
    public function getBrandItemsByService($service_slug, $brand_slug){
        $service    =   Service::where('slug', $service_slug)->firstOrFail();

        if($service->id==1){
            $category   =   Category::where('service_id', $service->id)->skip(1)->take(1)->first();
        }
        else{
            $category   =   Category::where('service_id', $service->id)->firstOrFail();
        }

        $brand      =   Brand::where('slug', $brand_slug)->firstOrFail();
        $items      =   Item::addSelect(['id'   =>  ProductModel::select('id')
            ->whereColumn('item_id', 'items.id')
            ->where('brand_id', 'items.brand_id')
            ->where('category_id', $category->id)
        ])->where('brand_id', $brand->id)
            ->where('type_id', 1)
            ->where('published', 1)
            ->where('stock', 1)
            ->paginate();

        $title      =   "{$service->name} - {$brand->name}";

        return view('pages.items.index', compact('title', 'items', 'category'));
    }

    public function sellItems(){
        $items = Item::where('service_id', 2)->paginate();

        return $items;
    }
    public function sellCategoryItems($slug)
    {
        $services = Service::all();

        $category = Category::firstWhere('slug', $slug);
        $service = $category->service;

        $title = "{$category->service->name} your {$category->name}";

        $items = Item::where('service_id', $category->service->id)->where('category_id', $category->id)->paginate(5);

        return view('pages.items.index', compact('title',  'service', 'services', 'items'));
    }
    public function sellCategoryTypeItems($cat, $typ)
    {
        $services = Service::all();
        $category = Category::where('slug', $cat)->firstOrFail();

        $type = Type::where('slug', $typ)->first();

        $items = Item::where('category_id', $category->id)
            ->where('type_id', $type->id)
            ->paginate(15);

        $title = "Here are {$category->name}";

        return view('pages.items.index', compact('title', 'items', 'services'));
    }

    public function brands(){
        $brands = Brand::all();

        return view("pages.brands", compact('brands'));
    }
    public function brand($slug){
        $brands = Brand::where('slug', $slug)->firstOrFail();

        return view("pages.brands", compact('brands'));
    }

}
