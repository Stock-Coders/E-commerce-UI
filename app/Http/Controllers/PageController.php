<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){ //including all the website's static pages ("home", "about", "services" & "portfolio")
        return view('pages.index');
    }

    public function contact(){
        return view('pages.includes-all-static-pages.contact');
    }
}
