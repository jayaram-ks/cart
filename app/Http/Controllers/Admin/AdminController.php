<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard',['title'=>'Dashboard','subtitle'=>'Admin Dashboard']);
    }

    public function showProfile()
    {
        return view('admin.profile',['title'=>'Profile','subtitle'=>'View/Edit']);
    }

    public function updateProfile(Request $request)
    {
         $request->validate(['name'=>'required|max:50', 'email'=>'required|email|max:100|unique:admins,email,'. Auth::user()->id ,'jobtitle'=>'required|max:100']);
         $admin = Admin::find(Auth::user()->id);
         $admin->name  = $request->name;
         $admin->email = $request->email;
         $admin->job_title = $request->jobtitle;
         $admin->save();
         return back()->withSuccess("Updated successfully");
    }

}
