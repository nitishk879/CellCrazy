<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use App\Price;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->looping($request);

        if($request->session()->exists('freshens')){
            $request->session()->forget('freshens');
        }
        if($request->session()->exists('refurbishes')){
            $request->session()->forget('refurbishes');
        }

        return response()->json('ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sell(Request $request)
    {
        $this->looping($request);

        if($request->session()->exists('brandNew')){
            $request->session()->forget('brandNew');
        }

        return response()->json('ok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $title = " Edit ";
        return view("admin.prices.edit", compact('item', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }

    public function looping($request){
        $category   =   $request->category ?? 0;
        $item       =   $request->item ?? 0;
        $memory     =   $request->memory ?? 0;
        $condition  =   $request->condition ?? 0;
        $network    =   $request->network ?? 0;
        $regular    =   $request->regular ?? 0;
        $sales      =   $request->sales ?? 0;
        $discount   =   $request->discount ?? 0;

        foreach ($condition as $key => $value){
            $model                = new ProductModel();
            $model->item_id       = $item;
            $model->category_id   = $category[$key];
            if($memory!==0){
                $model->memory_id     = $memory[$key];
            }
            $model->condition_id  = $condition[$key];
            $model->network_id    = $network[$key] ?? 0;
            $model->user_id       = Auth::id();

            $model->save();

            $product              = ProductModel::where('item_id', $model->item_id)
                ->where('category_id', $model->category_id)
                ->where('memory_id', $model->memory_id)
                ->where('network_id', $model->network_id)
                ->first();

            $price                = new Price();
            $price->model_id      = $product->id;
            $price->regular       = $regular[$key];
            $price->sales         = $sales[$key];
            $price->discount      = $discount[$key];
            $price->user_id       = Auth::id();
            $price->save();
        }
    }
}
