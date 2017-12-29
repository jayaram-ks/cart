@extends('layouts.admin',['title'=>$title,'subtitle'=>$subtitle])

@section('content')
<div class="col-md-6">
  <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Category Listing </h3>
      </div>
      <div class="box-body">


        {!! Helper::arrayToList($categTree) !!}
        <!-- <ul>
          @foreach($categories as $parentcat)
            <li>
              {{$parentcat->title}}
            </li>
          @endforeach
        </ul> -->
      </div>
  </div>

</div>

<div class="col-md-6">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Category </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{route('admin.addcategory')}}">
       {{csrf_field()}}
        <div class="box-body">

          <div class="form-group">
            <label for="parent">Select Parent Category</label>
            <select class="form-control" name="parent" id="parent">
              <option value="0" selected="selected"> --None-- </option>
              @foreach($categories as $allcategories)
              <option {{ old('parent') == $allcategories->id ? 'selected':''}} value="{{$allcategories->id}}">{{$allcategories->title}}</option>
              @endforeach
            </select>
            @if($errors->has('parent'))
            <span class="cust-error">{{$errors->first('parent')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Category Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title')}}" id="" placeholder="Enter title">
            @if($errors->has('title'))
            <span class="cust-error">{{$errors->first('title')}}</span>
            @endif
          </div>

            @if(session('success'))
         <span class="cust-green">{{session('success')}}</span>
          @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
    <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
      </form>
    </div>
    <!-- /.nav-tabs-custom -->
</div>

@endsection
