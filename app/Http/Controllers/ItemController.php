<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\ProductModel;
use App\Type;
use App\Condition;
use App\Item;
use App\Memory;
use App\Network;
use App\Price;
use App\Service;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Welcome controller is main page of website
     *
     * @param \App\Type
     * @param \App\Category
     * @param \App\Type
     *
     * @return \Illuminate\Http\Response
    */
    public function welcome()
    {
        $services   = Service::all();
        $categories = Category::all();
        $types      = Type::all();
        $brands     = Brand::all();
        $items      = Item::where('published', 1)
            ->where('stock', 1)->get();

        return view('pages.home', compact('services', 'categories', 'types',  'brands', 'items'));
    }
    /**
     * Welcome controller is main page of website
     *
     * @param \App\Type
     * @param \App\Category
     * @param \App\Type
     *
     * @return \Illuminate\Http\Response
    */
    public function best()
    {
        $title      = "Get best deals for you";
        $services   = Service::all();
        $categories = Category::all();
        $types      = Type::all();
        $brands     = Brand::all();
        $items      = Item::where('published', 1)
            ->where('stock', 1)->get();

        return view('pages.deals', compact('title', 'services', 'categories', 'types',  'brands', 'items'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $title = "Our Items available";

        $items = Item::latest()->paginate(12);

        return view('pages.items.index', compact('title', 'items'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $servo
     * @param  \App\Item  $product
     * @return \Illuminate\Http\Response
     */

    public function show($servo, $product)
    {
        $service = Service::firstWhere('slug', $servo);
        $memories = Memory::all();
        $conditions = Condition::all();
        $networks = Network::all();
        $item = Item::where('slug', $product)->where('service_id', $service->id)->first();
        $title = "{$item->name} view";

        return  view('pages.items.view', compact('title', 'item', 'memories', 'conditions', 'networks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function brand(Request $request){
        $item = ProductModel::where('item_id', $request->input('i'))
            ->where('category_id', $request->input('s'))
            ->where('memory_id', $request->input('m'))
            ->firstOrFail()->price;

        return $item->sales ?? $item->regular ?? null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function price(Request $request){
        $item       = $request->input('i');
        $category   = $request->input('s');
        $memory     = $request->input('m');
        $condition  = $request->input('c');
        $network    = $request->input('n');

        if(!empty($memory) && (!empty($condition) && (!empty($network)))){
            $item = ProductModel::where('item_id', $item)
                ->where('category_id', $category)
                ->where('memory_id', $memory)
                ->where('condition_id', $condition)
                ->where('network_id', $network)
                ->firstOrFail()->price;
        }
        elseif(!empty($memory) && (!empty($condition)) && (empty($network))){
            $item = ProductModel::where('item_id', $item)
                ->where('category_id', $category)
                ->where('memory_id', $memory)
                ->where('condition_id', $condition)
                ->orWhereNull('network_id')
                ->firstOrFail()->price;
        }
        elseif(!empty($memory) && (empty($condition)) && (!empty($network))){
            $item = ProductModel::where('item_id', $item)
                ->where('category_id', $category)
                ->where('memory_id', $memory)
                ->orWhereNull('condition_id')
                ->where('network_id', $network)
                ->firstOrFail()->price;
        }
        elseif(empty($memory) || $memory==null && (!empty($condition)) && (!empty($network))){
            $item = ProductModel::where('item_id', $item)
                ->where('category_id', $category)
                ->orWhereNull('memory_id')
                ->where('condition_id', $memory)
                ->where('network_id', $network)
                ->firstOrFail()->price;
        }
        else{
            $item = ProductModel::where('item_id', $item)
                ->where('category_id', $request->input('s'))
                ->where('memory_id', $memory)
                ->where('condition_id', $condition)
                ->where('network_id', $network)
                ->firstOrFail()->price;
        }

        return $item->sales ?? $item->regular ?? null;
    }


    /**
     * Fetch prices if item comes under furbished Category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cost(Request $request){
        $item = ProductModel::where('item_id', $request->input('i'))
            ->where('category_id', $request->input('s'))
            ->where('memory_id', $request->input('m'))
            ->where('condition_id', $request->input('c'))
            ->firstOrFail()->price;

        return $item->sales ?? $item->regular ?? null;
    }


    /**
     * Fetch prices if item comes under furbished Category
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function repair(Request $request){
        $item = ProductModel::where('item_id', $request->input('i'))
            ->where('category_id', $request->input('s'))
            ->where('repair_id', $request->input('m'))
            ->firstOrFail()->price;

        return $item->sales ?? $item->regular ?? null;
    }
}
