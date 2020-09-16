<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $queries = Contact::latest()->get();
        $title  =   "Contacts";

        return view('admin.queries.index', compact('title', 'queries'));
    }
}
