<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Compare;
use App\Item;
use App\Memory;
use App\Price;
use App\ProductModel;
use App\Repair;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function cart(Request $request){
        if (!$request->session()->has('cart')){
            return back()->with('error', "Sorry! You\'re cart is empty. Please add product.");
        }

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        $title     =  "We have {$cart->quantity} in your cart.";
        $items     =  $cart->items;
        $totalQuantity  =  $cart->quantity;
        $totalPrice = $cart->totalPrice;

        return view('pages.cart.index', compact('title', 'items', 'totalQuantity', 'totalPrice'));
    }

    /**
     * Add an item to the cart from product page
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     *
     */
    public function add(Request $request, $slug){
        $item       = Item::where('slug', $slug)->firstOrFail();

        $memory     = $request->input('m') ?? '';
        $condition  = $request->input('c') ?? '';
        $category   = $request->input('s') ?? '';
        $color      = $request->input('l') ?? '';
        $repair     = $request->input('r') ?? '';

        if($condition){
            $model      = ProductModel::where('item_id', $item->id)
                ->where('memory_id', $memory)
                ->where('category_id', $category)
                ->where('condition_id', $condition)
                ->firstOrFail();
        }
        elseif($repair){
            $model      = ProductModel::where('item_id', $item->id)
                ->where('repair_id', $repair)
                ->where('category_id', $category)
                ->firstOrFail();
        }
        else{
            $model = ProductModel::where('item_id', $item->id)->where('category_id', $category)->firstOrFail();
        }

        if($repair!=0){
            $repair     =   Repair::find($repair);
            $component  =   array(
                'id'            =>  $repair->id,
                'repair_name'   =>  $repair->name
            );
        }else{
            $component = array(
                'memory'    =>  $model->memory->name ?? '',
                'condition'    =>  $model->condition->name ?? ''
            );
        }

        $price      =   $model['price']['sales'] ?? $model['price']['regular'];

        $product    =   collect($item);
        $product->put('model_id', $model->id);
        $product->put('price', $price);
        $product->put('model', $component);
        $product->put('color', $color);

        $exCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;

        $cart = new Cart($exCart);
        $cart->add($product, $item->id, $model->id);

        $request->session()->put('cart', $cart);

        return response()->json('ok');
    }

    /**
     * Remove an item from cart
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function remove(Request $request, $id){
        $exCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($exCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0){
            $request->session()->put('cart', $cart);
        }else{
            $request->session()->forget('cart');
        }

        return response()->json('ok');
    }

    /**
     * Remove all the items from the cart page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function clear(Request $request){
        $request->session()->forget('cart');
        $request->session()->flush();
        $request->session()->forget('wishlist');
        $request->session()->flush();

        return redirect("/")->with('success', 'Cart has cleared! There are no items in it.');
    }

    /**
     * Make proper checkout with existing cart items
     * @param  \Illuminate\Http\Request  $request
     * @return $cart
     *
     */

    public function checkout(Request $request){

        if (!$request->session()->has('cart') && !$request->session()->has('wishlist')){
            return back()->with('warning', 'Sorry! You can not make checkout right now.');
        }

        $title  =   "Checkout";

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            return view('pages.forms.purchase-checkout', compact('title', 'cart'));
        }else{
            $cart = $request->session()->get('wishlist');
            return view('pages.forms.sales-checkout', compact('title', 'cart'));
        }
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('wishlist')){
            return back()->with('error', "Sorry! You don't have any product in your list to sold out.");
        }

        $existing = $request->session()->get('wishlist');

        $wishlist = new wishlist($existing);

        $title      =   "You have {$wishlist->quantity} quantity in your wishlist.";
        $items      =   $wishlist->items;
        $totalPrice =   $wishlist->totalPrice;
        $service    =   $wishlist->service;

        return view('pages.wishlist.index', compact('title', 'items', 'totalPrice', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function wishing(Request $request, $slug)
    {

        $item       = Item::where('slug', $slug)->firstOrFail();
        $category   = $request->input('s') ?? '';
        $memory     = $request->input('m') ?? '';
        $network    = $request->input('n') ?? '';
        $condition  = $request->input('c') ?? '';

        if(empty($network)){
            return back()->with("warning", "Sorry! Please select valid product to sell out.");
        }
        $model      = ProductModel::where('item_id', $item->id)
            ->where('memory_id', $memory)
            ->where('category_id', $category)
            ->where('condition_id', $condition)
            ->where('network_id', $network)
            ->firstOrFail();

        $component = array(
            'memory'    =>  $model->memory->name ?? '',
            'condition'    =>  $model->condition->name ?? '',
            'network'    =>  $model->network->name ?? '',
        );

        $price      =   $model->price->sales ?? $model->price->regular ?? 0;

        $product    =   collect($item);
        $product->put('model_id', $model->id);
        $product->put('price', $price);
        $product->put('model', $component);
        $product->put('color', 'na');

        $preWish = $request->session()->has('wishlist') ? $request->session()->get('wishlist') : null;
        $wishlist = new Wishlist($preWish);
        $wishlist->add($product, $item->id, $model);
        $request->session()->put('wishlist', $wishlist);

        return response()->json('ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dishing(Request $request, $id)
    {
        $preWish = $request->session()->has('wishlist') ? $request->session()->get('wishlist') : null;
        $wishlist = new Wishlist($preWish);
        $wishlist->removeItem($id);

        if (count($wishlist->items) > 0){
            $request->session()->put('wishlist', $wishlist);
        }else{
            $request->session()->forget('wishlist');
        }

        return response()->json('ok');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function adding(Request $request, $id)
    {
        $item = Item::find($id);
        $existCompare = $request->session()->has('compare') ? $request->session()->get('compare') : null;

        $compare = new Compare($existCompare);
        $compare->add($item, $item->id);

        $request->session()->put('compare', $compare);

        return response()->json('ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function compare(Request $request)
    {
        if (!$request->session()->has('compare')){
            return back()->with('error', "Sorry! You don't have any product to compare.");
        }

        $existing = $request->session()->get('compare');

        $compare = new Compare($existing);

        $title      =  "We have {$compare->total} compare.";
        $items      =  $compare->items;
        $total      =   $compare->total;
        $service    =   $compare->service;

        return view('pages.compare.index', compact('title', 'items', 'total', 'service'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removing(Request $request, $id)
    {
        $compare = $request->session()->has('compare') ? $request->session()->get('compare') : null;
        $compare = new Compare($compare);
        $compare->remove($id);

        if (count($compare->items) > 0){
            $request->session()->put('compare', $compare);
        }else{
            $request->session()->forget('compare');
        }

        return response()->json('ok');
    }
}
