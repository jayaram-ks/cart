@extends('layouts.app')
@section('content')
<div class="col-sm-12">
    <div class="card w-50 mx-auto my-5">
        <div class="card-header h5 text-center">REGISTER</div>  
        <div class="card-body">
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input value="{{old('firstname')}}" class="form-control" name="firstname" id="firstname" type="text">
                    @if ($errors->has('firstname'))
                        <span class="text-danger small p-2">
                            {{ $errors->first('firstname') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input value="{{old('lastname')}}" class="form-control" type="text" name="lastname" id="lastname">
                    @if($errors->has('lastname'))
                        <span class="text-danger small p-2">
                            {{ $errors->first('lastname') }}
                        </span>    
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" >
                    @if($errors->has('email'))
                    <span class="text-danger small p-2">
                            {{$errors->first('email')}}
                    </span>
                    @endif
                </div>

                 <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" >
                    @if($errors->has('password'))
                    <span class="text-danger small p-2">
                            {{$errors->first('password')}}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="form-group">
                    @foreach($gender as $gk => $gv)
                    <label class="radio-inline"><input value="{{$gk}}"
                     @if(old('gender')==$gk || $gk == 'M') 
                     checked="checked" 
                     @endif 
                     type="radio" name="gender"> {{$gv}}</label>
                    @endforeach
                    
                </div>
                <div class="form-group">
                    <label for="country">Country of Residence:</label>
                    <select class="form-control" name="country" id="country">
                        @foreach($cnty as $ct)
                        <option value="{{$ct->id}}" @if(old('country') == $ct->id) selected="selected" @endif  >{{$ct->long_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="profimage">Profile Image: </label> <span class="small text-info">{{implode (', ',$validimg) }} images are allowed.</span>
                    <input class="form-control-file" type="file" name="profimage" id="profimage">
                    @if($errors->has('profimage'))
                    <span class="text-danger small p-2">{{$errors->first('profimage')}}</span>
                    @endif
                   
                </div>
                <button type="submit" class="btn btn-primary w-100 my-3">Sign Up</button>

            </form>
        </div>
    </div>
</div>
@endsection