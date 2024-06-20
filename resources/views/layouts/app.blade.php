<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/templatemo-xtra-blog.css" rel="stylesheet">

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
{{-- notficition css --}}
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/order.css')}}">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body  style="background-color: rgba(39, 39, 39, 0.932)" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
            <div class="container bg-info">
                <a class="navbar-brand" href="{{route('posts')}}">
                  Home
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a  class="nav-link " href="{{ route('profile') }}" role="button" >
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a  class="nav-link " href="{{ route('posts') }}" role="button" >
                                  Posts
                                </a>
                            </li>
                            @if (auth()->user()->role == 'admin')
                                
                            <li class="nav-item dropdown">
                                <a  class="nav-link " href="{{ route('users') }}" role="button" >
                                  Users
                                </a>
                            </li>
                            @endif
                            <li>

                                    <a class="nav-link " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                            </li>
                            {{-- notification --}}
                        <li>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
                                <ul class="nav nav-pills mr-auto justify-content-end">                                
                                <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu">
                                <li class="head text-light bg-dark">
                                <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                <span>Notifications ({{Auth::user()->unreadNotifications->count()}})</span>
                                <a href="{{route('read.all.notification')}}" class="float-right text-light">Mark all as read</a>
                                </div>
                                </li>
                                {{-- start tweet --}}
                                @foreach (Auth::user()->unreadNotifications as $item)
                                    
                                {{-- @dd( $item) --}}
                                <li class="notification-box bg-gray">
                                <div class="row">
                                <div class="col-lg-3 col-sm-3 col-3 text-center">
                                <img src="{{URL::asset($item->data['photo'])}}"  class="w-50 rounded-circle">
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8">
                                <strong class="text-info">{{$item->data['user_create']}}</strong>
                                <div>
                                    <a class="btn" href="{{route('post.notification',$item->id)}}">{{$item->data['body']}}</a>
                                    
                                </div>
                                <small class="text-warning">{{$item->created_at->diffForhumans()}}</small>
                                </div>
                                </div>
                                </li>
                                @endforeach
                                {{-- end tweet --}}
                                <li class="footer bg-dark text-center">
                                <a href="{{route('all.notification')}}" class="text-light">View All</a>
                                </li>
                                </ul>
                                </li>
                                </ul>
                                </div>
                                </nav>
                                </div>
                        </li>
                        {{-- end notification --}}
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 pg-info">
            @yield('content')
        </main>
    </div>
    
    <script src="{{asset('js/main.js')}}" ></script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @yield('script')

</body>
</html>
