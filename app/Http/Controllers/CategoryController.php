<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Category;
use App\Item;
use App\Price;
use App\ProductModel;
use App\Service;
use App\Type;
use http\Client\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Our categories are here';
        $categories = Category::all();

        return view('pages.categories', compact('title', 'categories'));
    }

    public function show($slug)
    {
        $category   = Category::where('slug', $slug)->firstOrFail();

        $title      = "Product list for {$category->name}";
        $services   = Service::all();

        if($category->id==4){
            $items = $category->accessories()->whereIn('published', [0,1])->where('stock', 1)->paginate(12);

            return view('pages.items.accessories', compact('title', 'category', 'items', 'services'));
        }else{
            $items      = $category->items()->where('published', 1)->where('stock', 1)->paginate(12);

            return view('pages.category', compact('title', 'category', 'items', 'services'));
        }
    }

    /**
     * Let's view single item under Category with $itemId
     *
     * Base url/categories/{brand-new}/{samsung-galaxy-s10e}
     *
     * @param Category $cat
     * @param Item $product
     *
     * @return \Illuminate\Http\Response
     **/

    public function view($cat, $product){
        $services   =   Service::all();
        $category   =   Category::where('slug', $cat)->firstOrFail();

        if($category->id==4){
            $item   =   Accessory::where('category_id', $category->id)->where('slug', $product)->where('stock', 1)->firstOrFail();
            $related_item   =   Accessory::where('category_id', $category->id)->where('slug', '!=', $product)->where('stock', 1)->get();
        }
        else{
            if($category->id==5){
                $item_id    =   Item::where('slug', $product)->where('stock', 1)->firstOrFail();
                $item       =   $category->items()->where('item_id', $item_id->id)->where('stock', 1)->firstOrFail();
                $related_item       =   $category->items()->where('item_id', '!=', $item_id->id)->where('stock', 1)->get();
            }
            else{
                $item_id    =   Item::where('slug', $product)->where('published', 1)->where('stock', 1)->firstOrFail();
                $item       =   $category->items()->where('item_id', $item_id->id)->where('published', 1)->where('stock', 1)->firstOrFail();
                $related_item       =   $category->items()->where('item_id', '!=', $item_id->id)->where('published', 1)->where('stock', 1)->get();
            }
        }

        $title      =   $item->name;

        if($cat=="brand-new"){
            return view('pages.items.brand-new', compact('title','item', 'category', 'services', 'related_item'));
        }
        elseif ($cat==="refurbished"){
            return view('pages.items.refurbished', compact('title','item', 'category', 'services', 'related_item'));
        }
        elseif($cat=='repair'){
            return view('pages.items.repair', compact('title','item', 'category', 'services', 'related_item'));
        }
        elseif($cat=='premium-accessories'){
            return view('pages.items.accessory', compact('title','item', 'category', 'services', 'related_item'));
        }
        else{
            return view('pages.items.view', compact('title', 'item', 'category', 'services', 'related_item'));
        }
    }

    /**
     * Let's view all items under Category
     * where Type is $typ
     *
     * i.e category/freshen-up/phones
     *
     * @param Category $cate
     * @param Type $typ
     *
     * @return \Illuminate\Http\Response
     **/

    public function type($cate, $typ){

        $services   =   Service::all();
        $category   =   Category::where('slug', $cate)->firstOrFail();
        $type       =   Type::where('slug', $typ)->firstOrFail();

        if($category->id==3){
            $c_item     =   ProductModel::where('category_id', $category->id)->whereNotNull('network_id')->pluck('item_id')->unique();
        }
        else{
            $c_item     =   ProductModel::where('category_id', $category->id)->pluck('item_id')->unique();
        }

        if($category->id==5){
            $items  =   Item::where('type_id', $type->id)->whereIn('id', $c_item)->whereIn('published', [0,1])->where('stock', 1)->paginate(12);
        }elseif($category->id==3){
            $items  =   Item::where('type_id', $type->id)->whereIn('id', $c_item)->where('published', 1)->where('stock', 1)->paginate(12);
        }else{
            $items  =   Item::where('type_id', $type->id)->whereIn('id', $c_item)->where('published', 1)->where('stock', 1)->paginate(12);
        }


        $title      =   "{$type->name} Under {$category->name} has following items";

        if($category->id==5){
            return view('pages.items.repairs', compact('title', 'services', 'items', 'category'));
        }


        return view('pages.items.index', compact('title', 'services', 'items', 'category'));
    }
}
