<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageProduct()
    {
        return view('admin.manage-product',['title'=>'Products','subtitle'=>'Manage products']);
    }
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.add-product',['title'=>'Product','subtitle' => 'Add product', 'categories'=>$categories]);
    }
}
