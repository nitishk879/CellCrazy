<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mac;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index(){
        $queries = Mac::latest()->get();
        $title  =   "Queries";

        return view('admin.queries.index', compact('title', 'queries'));
    }
}
