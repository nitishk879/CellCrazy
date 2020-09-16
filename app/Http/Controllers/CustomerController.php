<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\ShippingAddress;
use App\Mac;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CustomerController extends Controller
{
    public function store(ShippingAddress $request){
        $validated = $request->validated();
        if($request->session()->has('wishlist')){
            $cart = $request->session()->get('wishlist');
            $type = 'sell';
        }else{
            $cart = $request->session()->get('cart');
            $type = 'buy';
        }

        $customer = Customer::create([
            'first_name'    =>  $validated['first_name'],
            'last_name'   =>  $validated['last_name'],
            'email'   =>  $validated['email'],
            'phone'   =>  $validated['phone'],
            'address_line_1'  =>  $validated['address_line_1'],
            'address_line_2'  =>  $validated['address_line_2'],
            'city'    =>  $validated['city'],
            'county'    =>  $validated['county'],
            'country' =>  $validated['country'],
            'postal_code' =>  $validated['postal_code'],
            'imei'    =>  $validated['imei'],
            'message' =>  $validated['message'],

            'account_holder_name' =>  $validated['account_holder_name'],
            'account_number'   =>   $validated['account_number'],
            'account_short_code'    =>  $validated['account_short_code']
        ]);

        $session = array(
            'order_status'      => 'in-process',
            'order_price'       => $cart->totalPrice,
            'order_type'        => $type,
            'product_id'        => head(data_get($cart, 'items.*.item.id')),
            'product_quantity'  => $cart->quantity,
            'product_price'     => head(data_get($cart, 'items.*.item.price')),
            'total_price'       => $cart->totalPrice,
            'order_details'     => json_encode(Arr::pluck($cart->items, 'item')),
            'customer_id'       => $customer->id
        );

        $this->save($session);

        return back()->with('success', "Thank you for this order. You're order has been initialized.");
    }

    public function save($session){

        $order = Order::create([
            'order_status'      =>  'in-process',
            'order_price'       =>  $session['order_price'],
            'order_type'        =>  $session['order_type'],
            'product_id'        =>  $session['product_id'],
            'product_quantity'  =>  $session['product_quantity'],
            'product_price'     =>  $session['product_price'],
            'total_price'       =>  $session['total_price'],
            'order_details'     =>  $session['order_details'],
            'customer_id'       =>  $session['customer_id']
        ]);

        return $order;
    }

    public function sellMac(Request $request){
        $validation = $request->validate([
            'name'          =>  'required|min:3',
            'email'         =>  'required|min:3',
            'phone'         =>  'required|min:10|max:13',
            'model_number'  =>  'required|min:3',
            'message'       =>  'nullable'
        ]);

        Mac::create([
            'name'          =>  $validation['name'],
            'email'         =>  $validation['email'],
            'phone'         =>  $validation['phone'],
            'mac'           =>  $request->path(),
            'model_number'  =>  $validation['model_number'],
            'message'       =>  $validation['message'],
            'status'        =>  'process'
        ]);

        return response()->json('ok');
    }
}
