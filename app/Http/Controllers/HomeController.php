<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
        $products = Product::with('image')->paginate(12);
        $slides = Product::with('image')->offset(0)->limit(5)->get();
        $categs  = Category::all();
        return view('home',['products' => $products,'slides' => $slides, 'cats' => $categs]);
    }
}
