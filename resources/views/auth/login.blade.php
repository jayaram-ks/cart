@extends('layouts.app')
@section('content')
<div class="col-sm-12 ">
    <div class="card w-50  mx-auto my-5">
        <div class="card-header text-center h5">LOGIN</div>
        <div class="card-body">
            <form method="post" action="/login">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control"  value="{{old('email')}}" type="text" id="email" name="email">
                    @if($errors->has('email'))
                    <span class="small text-danger p-2">{{$errors->first('email')}}</span>
                    @endif
                </div>

                 <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password">
                    @if($errors->has('password'))
                    <span class="text-danger p-2 small">{{$errors->first('password')}}</span>
                    @endif

                </div>
                <div class="form-group">
                  <input type="checkbox"  class="m-1" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </div>
                <button class="btn btn-primary w-100 my-2">Submit</button>
            </form>
            <div class="text-center">Don't have an account <a href="/register">Sign Up</a></div>
            <div class="text-center"><a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?  </a></div>
        </div>
    </div>
</div>
@endsection
