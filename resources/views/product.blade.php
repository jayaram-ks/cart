@extends('layouts.app')
@section('content')
<div class="col-lg-12">

  <div class="row">
  <div class="col-md-5 my-3">
    <h5>{{ $product->title }} </h5>
    by <a class="text-primary small">{{$product->manufacturer->name}}</a> in <a class="text-primary small">{{$catstr}}</a >

      <img   class="product-image mt-4" src="{{url(config('constants.prodimg').$product->id.'/m_'.$product->image->filename) }}" alt="">

  </div>
  <div class="col-md-4 my-3">
     <h5 class='price-list mb-3'> {{$product->price}} <span class='price-unit'>AED</span></h5>
     <h5 class="brief-title">Product Brief</h5>
       <p class="product-brief">{{words($product->description,110,'...')}}</p>


  </div>
  <div class="col-md-3 my-3 p-3 sell-box">
      <p>Sold By: <span class="text-primary">SOUQ UAE</span> </p>
      <p>Ship To: <span class="text-primary">DUBAI </span></p>
      <p>Delivered By: <span class="font-weight-bold">Saturday, Jan 13 </span></p>
      <p>Condition: <span class="font-weight-bold">New</span> </p>
     <button class="btn btn-success btn-lg pt-2 w-100">Add To Cart</button>

  </div>

  <div class="col-md-12 my-5">
    <h5>PRODUCT DESCRIPTION </h5>
    <p class="product-desc">{{$product->description}}</p>
  </div>
</div>

</div>
@endsection
