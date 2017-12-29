<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Helpers\Helper;

class CategoryController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function manageCategory()
    {
      $categoryTree = Helper::getCategories();
      $categories = Category::all();

      //pr($categoryTree);
      //exit;

      //pr(Helper::categOptions($categoryTree));

    //  pr($categoryTree);

      //echo Helper::arrayToList($categoryTree); exit;
      return view('admin.manage-category',['title'=>'Category','subtitle'=>'Manage categories and subcategories','categories'=>$categories,'categTree'=>$categoryTree]);
    }

    public function addCategory(Request $request)
    {
       $request->validate(['title'=>'required|unique:categories|max:255','parent'=>'required|integer']);
       $category = new Category();
       $category -> title = $request->title ;
       $category -> parent_id = $request->parent;
       $category -> slug = str_slug($request->title);
       $category -> save();
       return back()->withSuccess('Added Category Successfully');
    }
}
