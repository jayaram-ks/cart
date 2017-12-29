@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
           <div class="card w-50 mx-auto my-5">
             <div class="card-header text-center h5">RESET PASSWORD</div>
             <div class="card-body">
               @if (session('status'))
                   <div class="alert alert-success">
                       {{ session('status') }}
                   </div>
               @endif
               <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                       <div class="col-md-12">
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
           </div>
        </div>
    </div>
</div>
@endsection
