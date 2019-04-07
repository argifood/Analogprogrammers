<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AgriBid</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" width="30" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="navbar-brand text-dark  " href="/">AgriBid</a>
                </li>
                @auth
                <li class="nav-item dark">
                  <a class="nav-link text-dark" href="/listings">Product Auctions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="/listings/create">Create Auction</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark" href="/stats" role="button">Stats</a>
              </li>
              </ul>
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/mylistings">My Listings</a>
                      <a class="dropdown-item" href="/bought">Bought items</a>
                      @if(Auth::user()->type>10)
                      <a class="dropdown-item" href="/areacodes">Areacodes</a>
                      <a class="dropdown-item" href="/products">Products</a>
                      @endif
                      <a class="dropdown-item text-danger font-weight-bold " href="{{ url('/logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout </a>
                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </div>
                </div>
              @else
              <li class="nav-item text-dark">
                  <a class="nav-link text-dark   " href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item text-dark">
                  <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endauth
              </ul>
            </div>
          </nav>
