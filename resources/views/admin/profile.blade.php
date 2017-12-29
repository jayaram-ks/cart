@extends('layouts.admin',['title'=>$title,'subtitle'=>$subtitle])

@section('content')
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('admintheme//dist/img/user4-128x128.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->job_title}}</p>
              
               <p class="text-muted text-center">{{Auth::user()->email}}</p>

              

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit profile </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.profileupdate')}}">
             {{csrf_field()}}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name'): Auth::user()->name}}" id="" placeholder="Enter name">
                  @if($errors->has('name'))
					<span class="cust-error">{{$errors->first('name')}}</span>
               	  @endif
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email')?old('email'):Auth::user()->email}}" id="" placeholder="Enter email">
                  @if($errors->has('email'))
					<span class="cust-error">{{$errors->first('email')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="">Job Title</label>
                  <input type="text" class="form-control" name="jobtitle" value="{{ old('jobtitle')?old('jobtitle'):Auth::user()->job_title}}" id="" placeholder="Enter Job Title">
                </div>
                
                @if(session('success'))
				  <span class="cust-green">{{session('success')}}</span>
                @endif
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				  <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Update profile data</button>
              </div>
            </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

@endsection
