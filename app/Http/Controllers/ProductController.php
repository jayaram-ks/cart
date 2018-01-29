<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct($slug)
    {
      $product = Product::with('image','manufacturer','categoriestxt')->where('slug', '=', $slug)->first();
      foreach($product->categoriestxt as $v)
      {
        $ctg[] = $v['title'];
      }
      $ctgstr = implode(", ",$ctg);
      return view('product',['product' => $product ,'catstr' => $ctgstr]);
    }
}
