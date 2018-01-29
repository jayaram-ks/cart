<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductController extends Controller
{
    public function saveProduct(Request $request)
    {
      $product = new Product();
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      // $product->slug = str_slug($request->title)."-".str_random(12);
      // $product->tag = $request->tag;
      // $product->meta_key = $request->metakey;
      // $product->meta_description = $request->metadescription;
      // $product->manufacturer_id = $request->manufacturer;
      $product->save();

    }

    public function updateProduct(Request $request)
    {
      $product = Product::find($request->id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->save();

    }

    public function deleteProduct(Request $request)
    {
      $product = Product::find($request->id);
      Storage::disk('uploads')->deleteDirectory(config('constants.folder.product').$product->id);
      $product->categories()->detach();
      $product->images()->delete();
      $product -> delete();
    }

}
