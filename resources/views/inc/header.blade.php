<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('js/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

  </head>

  <body>

<nav class="navbar  navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand col-lg-3" href="{{route("home")}}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <form class="form-inline my-2 my-lg-0 col-lg-6 text-center navbar-form">
      <div class="input-group">
                  <input type="text" class="form-control  search-navbar" placeholder="What are you looking for" name="q">
                  <div class="input-group-btn">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                  </div>
              </div>
    </form>
    <div class="collapse navbar-collapse col-lg-3"  id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto mr-0" >
           @if(!Auth::check())
            <li class="nav-item ">
                <a class="btn btn-primary btn-sm my-0 py-1 px-3 mx-2" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item ">
                <a class="btn btn-primary btn-sm my-0 py-1 px-3" href="{{route('register')}}">Sign Up</a>
            </li>
            @endif
            @if(Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">My Orders</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">My Addresses</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Wish Lists</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Account Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link">|</a></li>
            <li class="nav-item">
            <a class="nav-link"><i class="fa fa-lg fa-shopping-cart" aria-hidden="true"></i></a>
            </li>



            @endif
        </ul>
    </div>
</nav>
