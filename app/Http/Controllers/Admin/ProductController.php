<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImages;
use App\Manufacturer;
use Image;

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
        $manufacturers = Manufacturer::all();
        return view('admin.add-product',['title'=>'Product','subtitle' => 'Add product', 'categories'=>$categories, 'manufacturers'=>$manufacturers]);
    }
    public function saveProduct(Request $request)
    {
      //dd($request);
        $request->validate(['title'=>'required|max:255',
        'category' => 'required|array|between:1,3',
        'description'=>'required',
        'price'=>'required|numeric',
        'tag'=>'required',
        'metakey'=>'required',
        'metadescription'=>'required',
        'prod_image.*' => 'image|mimes:jpeg,bmp,png,jpg|max:5000',
      ]);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->slug = str_slug($request->title)."-".str_random(12);
        $product->tag = $request->tag;
        $product->meta_key = $request->metakey;
        $product->meta_description = $request->metadescription;
        $product->manufacturer_id = $request->manufacturer;
        if($product->save())
        {
          //multiple category
          $prd = Product::find($product->id);
          $prd->categories()->attach($request->category);

          if($request->hasFile('prod_image'))
          {
            //multiple images
            foreach ($request->prod_image as $img)
            {
                $imagepaths = array();
                $imagename = md5(mt_rand().microtime()).'.'.$img->getClientOriginalExtension();
                //Storage::disk('uploads')->put(config('constants.folder.product').$prd->id."/".$imagename,File::get($img));

                $dimensions = array(['path'=>'s_','w'=>175,'h'=>100],
                ['path'=>'m_','w'=>350,'h'=>200],
                ['path'=>'l_','w'=>900,'h'=>350]);

                foreach($dimensions as $dk => $dv)
                {

                    $imgz = Image::make($img->getRealPath());

                    $imgz->resize($dv['w'], $dv['h'], function ($constraint) {
                    $constraint->aspectRatio();
                    });
                    $imgz->resizeCanvas($dv['w'], $dv['h'], 'center', false, 'ffffff');
                    Storage::disk('uploads')->put(config('constants.folder.product').$prd->id."/".$dv['path'].$imagename,(string) $imgz->encode());
               }

                $prd->images()->save(new ProductImages(['filename' => $imagename]));
            }
          }
          return back()->withSuccess('Product added successfully.');
        }
    }

    public function destroy($id)
    {
       $product = Product::find($id);
       Storage::disk('uploads')->deleteDirectory(config('constants.folder.product').$product->id);
       $product->categories()->detach();
       $product->images()->delete();
       $product -> delete();
       return back()->withSuccess('Deleted the product successfully');
    }




}
