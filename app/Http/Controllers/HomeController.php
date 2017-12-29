<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(12);
        $slides = DB::table('products')->offset(0)->limit(5)->get();
        return view('home',['products'=>$products,'slides'=>$slides]);
    }
}
