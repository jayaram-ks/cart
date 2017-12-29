@extends('layouts.admin-login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('admin.login.submit')}}" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if($errors->has('email'))
        <span class="p-2 text-danger">{{$errors->first('email')}}</span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if($errors->has('password'))
        <span class="p-2 text-danger">{{$errors->first('password')}}</span>
        @endif
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{old('remember')? 'checked':''}} > Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button  type="submit" class="btn btn-primary btn-block btn-flat ">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<a href="{{route('admin.password.request')}}">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
