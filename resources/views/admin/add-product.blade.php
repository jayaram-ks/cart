@extends('layouts.admin',['title'=>$title,'subtitle'=>$subtitle])
@section('content')

<div class="col-md-12">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Product </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{route('admin.saveproduct')}}" enctype="multipart/form-data">
       {{csrf_field()}}
        <div class="box-body">

          @if(session('success'))
       <span class="cust-green">{{session('success')}}</span>
        @endif

          <div class="form-group">
            <label for="category">Select categories for product filtering</label>
            <select multiple="multiple" class="form-control mult-select" name="category[]" id="category">

              @foreach($categories as $allcategories)
              <option {{ old('category') == $allcategories->id ? 'selected':''}} value="{{$allcategories->id}}">{{$allcategories->title}}</option>
              @endforeach
            </select>
            @if($errors->has('category'))
            <span class="cust-error">{{$errors->first('category')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Product Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title')}}" id="" placeholder="Enter title">
            @if($errors->has('title'))
            <span class="cust-error">{{$errors->first('title')}}</span>
            @endif
          </div>


          <div class="form-group">
            <label for="manufacturer">Select Manufacturer</label>
            <select  class="form-control mult-select" name="manufacturer" id="manufacturer">
              @foreach($manufacturers as $manf)
              <option {{ old('manufacturer') == $manf->id ? 'selected':''}} value="{{$manf->id}}">{{$manf->name}}</option>
              @endforeach
            </select>
            @if($errors->has('manufacturer'))
            <span class="cust-error">{{$errors->first('manufacturer')}}</span>
            @endif
          </div>



          <div class="form-group">
            <label for="">Product Description</label>
            <textarea class="form-control" name='description' id="description">{{old('description')}}</textarea>
            @if($errors->has('description'))
            <span class="cust-error">{{$errors->first('description')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Price</label>
            <input class="form-control"  type="text" name="price" id="price" value="{{old('price')}}" >
            @if($errors->has('price'))
            <span class="cust-error">{{$errors->first('price')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Tags</label>
            <input class="form-control"  type="text" name="tag" id="tag" value="{{old('tag')}}" >
            @if($errors->has('tag'))
            <span class="cust-error">{{$errors->first('tag')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Meta key</label>
            <input class="form-control" type="text" name="metakey" id="metakey" value="{{old('metakey')}}">
            @if($errors->has('metakey'))
            <span class="cust-error">{{$errors->first('metakey')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Meta description</label>
            <textarea class="form-control" name="metadescription" id="metadescription">{{old('metadescription')}}</textarea>
            @if($errors->has('metadescription'))
            <span class="cust-error">{{$errors->first('metadescription')}}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Product Images</label>
            <input type="file" name="prod_image[]" id="prod_image1" class="form-control">
            <input type="file" name="prod_image[]" id="prod_image2" class="form-control">
            <input type="file" name="prod_image[]" id="prod_image3" class="form-control">
            <input type="file" name="prod_image[]" id="prod_image4" class="form-control">
            <input type="file" name="prod_image[]" id="prod_image5" class="form-control">
            @if($errors->has('prod_image.*'))
            <span class="cust-error">{{$errors->first('prod_image.*')}}</span>
            @endif

          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
      </form>
    </div>
    <!-- /.nav-tabs-custom -->
</div>

@endsection
