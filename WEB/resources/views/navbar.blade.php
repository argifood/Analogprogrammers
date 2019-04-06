<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AgriFood</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-success bg-success mb-4">
            <a class="navbar-brand text-black-50" href="/">AgriFood</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item dark">
                  <a class="nav-link text-black-50" href="/listings">Product Auctions <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-black-50" href="/listings/create">Create Auction</a>
                </li>
              </ul>
              @endauth
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item text-black-50">
                        <a class="nav-link text-black-50" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item text-black-50">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown text-black-50">
                            
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-black-50" href="/login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/mylistings">My Listings</a>
                                        <a class="dropdown-item" href="/bought">Bought items</a>
                                        <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
            </div>
          </nav>