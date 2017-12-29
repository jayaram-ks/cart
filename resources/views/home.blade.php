@extends('layouts.app')
@section('content')

      @include('inc.leftnav')

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">

              @for($i=1; $i <= count($slides); $i++)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" {{ $i==1 ? 'class="active"' : '' }}></li>
              @endfor
            </ol>
            <div class="carousel-inner" role="listbox">

              @foreach($slides as $sld)
              <div class="carousel-item  {{ $loop->first  ? 'active': '' }} ">
                <img  class="d-block img-fluid slider-img" src="{{asset('images/'.$sld->imagePath)}}" alt="">
              </div>
              @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            @foreach($products as $prod)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{asset('images/'.$prod->imagePath)}}" alt=""></a>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="#">{{$prod->title}}</a>
                  </h5>
                  <h5>AED {{$prod->price}}</h5>
                <button class="btn btn-primary text-center  w-100 btn-sm">Product Details</button>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            @endforeach

          </div>
          <!-- /.row -->


            {{$products->links('pagination.default')}}
        

        </div>
        <!-- /.col-lg-9 -->

@endsection
