<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Item;
use App\Service;
use App\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services   = Service::all();
        $categories = Category::all();
        $types      = Type::all();
        $brands     = Brand::all();
        $items      = Item::where('published', 1)
            ->where('stock', 1)->get();

        return view('pages.home', compact('services', 'categories', 'types',  'brands', 'items'));
    }
}
