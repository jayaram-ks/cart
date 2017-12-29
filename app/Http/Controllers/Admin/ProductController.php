<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageProduct()
    {
        $products = Product::paginate(10);
        return view('admin.manage-product',['title'=>'Products','subtitle'=>'Manage products', 'products' => $products]);
    }
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.add-product',['title'=>'Product','subtitle' => 'Add product', 'categories'=>$categories]);
    }
}
