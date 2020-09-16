<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Condition;
use App\Http\Controllers\Controller;
use App\Item;
use App\Memory;
use App\Network;
use App\Price;
use App\ProductModel;
use App\Service;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Here you can check all items from all services";
        $items = Item::all();

        return view("admin.Items.index", compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create your item here";
        $types = Type::all();
        $brands = Brand::all();
        $memories = Memory::all();

        $categories = Category::all();
        $networks = Network::all();
        $conditions = Condition::all();
        $services = Service::all();

        return view('admin.Items.create', compact('title', 'categories', 'memories', 'networks', 'conditions', 'types', 'brands', 'services'));
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
            'name'      => 'required|unique:items|min:2',
            'short_desc'    => 'nullable|max:160',
            'long_desc'     => 'nullable',
            'image'         => 'nullable|image|max:3500',
            'type'          => 'required',
            'brand'         => 'required'
        ]);

        if ($request->hasFile('image')){
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = Str::slug($validationData['name']).".".$fileExt;
            $request->file('image')->storeAs('public/products', $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        Item::create([
            'name'          => $validationData['name'],
            'slug'          => Str::slug($validationData['name']),
            'short_desc'    => $validationData['short_desc'],
            'long_desc'     => $validationData['long_desc'],
            'image'         => $fileNameToStore,
            'type_id'       => $validationData['type'],
            'brand_id'      => $validationData['brand'],
            'user_id'       => Auth::id()
        ]);

        if($request->input('memories') || $request->input('conditions') || $request->input('networks')){
            $item = Item::where('name', $validationData['name'])->first();
            $item->categories()->syncWithoutDetaching($request->categories);
            $item->memories()->syncWithoutDetaching($request->memories);
            $item->conditions()->syncWithoutDetaching($request->conditions);
            $item->networks()->syncWithoutDetaching($request->networks);
        }

        return redirect('admin/items')->with('success', 'Item {$validatedData[\'title\']} has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $title = "Check out the details view of {$item->name}";

        $buyersAttrib   =   $item->models()->where('item_id', $item->id)->whereIn('category_id', [1,2])->get();
        $sellersAttrib   =   $item->models()->where('item_id', $item->id)->where('category_id', '=', 3)->get();

        return view('admin.Items.view', compact('title', 'item', 'buyersAttrib', 'sellersAttrib'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        Gate::authorize('edit-category', $item);

        $title      =   "You can edit {$item->name}";
        $types      =   Type::all();
        $brands     =   Brand::all();
        $services   =   Service::all();
        $memories   =   Memory::all();
        $networks   =   Network::all();

        $m      =   $item->memories;
        $bnt    =   $item->categories()->where('category_id', '=',1)->get();
        $bnd    =   $item->conditions()->where('category_id', '=',1)->get();
        $bct    =   $item->categories()->where('category_id', '=',2)->get();
        $bcd    =   $item->conditions()->where('category_id', '=',2)->get();
        $sct    =   $item->categories()->where('category_id', '=', 3)->get();
        $scd    =   $item->conditions()->where('category_id', '=', 3)->get();

        $brandNew       =   Arr::crossJoin([$item->id], $m, $bnt, $bnd);
        $refurbished    =   Arr::crossJoin([$item->id], $m, $bct, $bcd);
        $freshenUp      =   Arr::crossJoin([$item->id], $m, $sct, $scd);

        // fix this..
        $buyers         = ProductModel::where('item_id', $item->id)->whereIn('category_id', [1,2])->get();
        $sellers        = ProductModel::where('item_id', $item->id)->where('category_id', 3)->get();

        return view("admin.Items.edit", compact("title", "item", "types", "brands",
            "buyers", "sellers", "networks",
            "memories", 'services', 'brandNew', 'refurbished', 'freshenUp'));
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
        Gate::authorize('edit-category', $item);
        $validationData = $request->validate([
            'name'          => 'required|min:2',
            'short_desc'    => 'nullable|max:160',
            'long_desc'     => 'nullable',
            'image'         => 'nullable|max:3500|image',
            'type'          => 'required',
            'brand'         => 'required'
        ]);

        if ($request->hasFile('image')){
            $fileExt        = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = Str::slug($validationData['name']).".".$fileExt;
            $request->file('image')->storeAs('public/products', $fileNameToStore);

        }else{
            $fileNameToStore = $item->image;
        }
        $item->update([
            'name'          => $validationData['name'],
            'slug'          => Str::slug($validationData['name']),
            'short_desc'    => $validationData['short_desc'],
            'long_desc'     => $validationData['long_desc'],
            'image'         => $fileNameToStore,
            'type_id'       => $validationData['type'],
            'brand_id'      => $validationData['brand'],
            'user_id'       => Auth::id()
        ]);

        return redirect("admin/items/{$item->id}")->with("success", "{$item->name} has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function publish(Item $item)
    {
        if($item->published==1){
            $item->update(['published'   => 0]);
        }else{
            $item->update(['published'   => 1]);
        }

        return response()->json("ok");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function stock(Item $item)
    {
        if($item->stock==true){
            $item->update(['stock'   => 0]);
        }else{
            $item->update(['stock'   => 1]);
        }

        return response()->json("ok");
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */

    public function sync(Request $request, Item $item){

        $item->categories()->syncWithoutDetaching($request->categories);
        $item->memories()->syncWithoutDetaching($request->memories);
        $item->networks()->syncWithoutDetaching($request->networks);
        $item->conditions()->syncWithoutDetaching($request->conditions);

        if($request->networks==0 && collect($request->categories)->contains('1')){
            $brandNewConditions = Condition::where('id', 1)->get();
            $brandNewCategories = $item->categories()->where('category_id', '=',1)->get();
            if(!$request->memories){
                $brandNew = Arr::crossJoin($brandNewCategories, $brandNewConditions);
            }else{
                $brandNew = Arr::crossJoin($brandNewCategories, $item->memories, $brandNewConditions);
            }
            $request->session()->put('brandNew', $brandNew);
        }

        if($request->networks==0){
            $refurbishConditions = Condition::whereIn('id', [2, 3, 4])->get();
            $refurbishCategories = $item->categories()->where('category_id', '=',2)->get();
            if(!$request->memories){
                $refurbishes = Arr::crossJoin($refurbishCategories, $refurbishConditions);
            }else{
                $refurbishes = Arr::crossJoin($refurbishCategories, $item->memories, $refurbishConditions);
            }
            $request->session()->put('refurbishes', $refurbishes);
        }
        else{
            $freshenConditions = Condition::whereIn('id', [5, 6, 7])->get();
            $freshenCategories = $item->categories()->where('category_id', '=',3)->get();
            if(!$request->memories){
                $freshens = Arr::crossJoin($freshenCategories, $item->networks, $freshenConditions);
            }else{
                $freshens = Arr::crossJoin($freshenCategories, $item->memories ?? '', $item->networks, $freshenConditions);
            }
            $request->session()->put('freshens', $freshens);
        }

//        return response()->json('ok');
        return back()->with('success', 'Thank you');
    }
}
