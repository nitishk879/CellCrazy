<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Service;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * Let's search your items
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     **/
    public function search(Request $request){
        $query      =   $request->query('search');
        $cat_slug   =   $request->category;

        if($cat_slug){
            $category   =   Category::where('slug', $cat_slug)->firstOrFail();
            $items    =   $category->items()->where("name", "like", "%{$query}%")
                ->orWhere("short_desc", "like", "%{$query}%")
                ->orWhere("long_desc", "like", "%{$query}%")
                ->where('published', 1)
                ->where('stock', 1)
                ->paginate();
//            $items->appends([$query]);
        }
        else{
            $items    =   Item::where("name", "like", "%{$query}%")
                ->orWhere("short_desc", "like", "%{$query}%")
                ->orWhere("long_desc", "like", "%{$query}%")
                ->where('published', 1)
                ->where('stock', 1)
                ->paginate();
//            $items->appends([$query]);
        }

        $title      =   "Search result for {$query}";

        return view('pages.common.search-result', compact('title', 'items', 'query'));
    }
    /**
     * Let's add forms to the iMac, Mac
     *
     * @return \Illuminate\Http\Response
     **/
    public function create(){
        $title      =   "Sell Mac";

        return view('pages.forms.sell-mac', compact('title'));
    }
    /**
     * Let's add forms to the iMac, Mac
     *
     * @return \Illuminate\Http\Response
     **/
    public function max(){
        $title      =   "Sell iMac";

        return view('pages.forms.sell-imac', compact('title'));
    }


    /**
     * Add an item to the cart from product page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function mac(Request $request){
        //
    }
    /**
     * Let's add forms to the phone and iPad
     *
     * @return \Illuminate\Http\Response
     **/
    public function device(){
        $title      =   "Sell Phone";

        return view('pages.forms.sell-device', compact('title'));
    }


    /**
     * Add an item to the cart from product page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */

    public function sell(){
        //
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

    public function policy()
    {
        $services   = Service::all();
        $title      =   "Privacy Policies";

        return view('pages.privacy-policy', compact('services', 'title'));
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

    public function terms()
    {
        $services   = Service::all();
        $title      =   "Terms & Conditions";

        return view('pages.term-condition', compact('services', 'title'));
    }

    public function refund()
    {
        $services   = Service::all();
        $title      =   "Return & Refund Policies";

        return view('pages.refund-policy', compact('services', 'title'));
    }

    public function faq()
    {
        $services   = Service::all();
        $title      =   "FAQ";

        return view('pages.faq', compact('services', 'title'));
    }

    public function grade()
    {
        $services   = Service::all();
        $title      =   "Our grades";

        return view('pages.our-grade', compact('services', 'title'));
    }
}
