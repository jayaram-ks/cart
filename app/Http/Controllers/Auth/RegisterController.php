<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Country;
use Config;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'profimage' => 'required|mimes:jpg,jpeg,bmp,png,gif,svg|max:10000'
        ]);
    }



    public function showRegistrationForm() {
        $cntry = Country::all();
        return view ('auth.register', ['cnty' => $cntry, 'gender' => Config::get('staticarrays.gender'),'validimg'=>Config::get('staticarrays.validimageformats')]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $img = $data['profimage'];
        $imagename = time().'.'.$img->getClientOriginalExtension();


        $user = User::create([
            'name' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'profileimage' => $imagename
        ]);
        Storage::disk('uploads')->put(config('constants.folder.user').$user->id."/".$imagename,File::get($img));
        return $user;
    }
}
