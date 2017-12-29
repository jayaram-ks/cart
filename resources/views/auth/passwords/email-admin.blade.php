@extends('layouts.admin-login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">RESET PASSWORD</p>
               @if (session('status'))
                   <div class="alert alert-success">
                       {{ session('status') }}
                   </div>
               @endif
               <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                       <div class="col-md-12">
                           <input placeholder="Enter your e-mail address" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                           @if ($errors->has('email'))
                               <span class="small text-danger p-2">
                              {{ $errors->first('email') }}
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-12">
                           <button type="submit" class="btn btn-primary">
                               Send Password Reset Link
                           </button>
                       </div>
                   </div>
               </form>
             </div>
             <!-- /.login-box-body -->
           </div>
           <!-- /.login-box -->
@endsection
