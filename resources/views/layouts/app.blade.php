<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blood Lab') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{asset('/css/notify.css')}}" />
    @yield('style')
<style>
        .navbar-nav {
            margin-left: auto;
        }
        footer{
            background: #5fa2dd;
            color: #fff;
            text-align: center;
            padding: 14px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm"  style="background: #5fa2dd; color:#fff;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img style="width: 50px;" src="{{url('/logo.png')}}"> {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
                            {{--   <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                --}} 
                            @endif
                        @else
                        

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('settings') }}">Settings</a>
                                    <a class="dropdown-item" href="{{ route('users') }}">Users</a>
                               <a class="dropdown-item"  href="{{ route('logout') }}"                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <br/>
        <br/>
        <br/>
        <br/>
        <footer>
            <p>@ 2021 By Papaok</p>
        </footer>
    </div>
</body>

<!-- Scripts -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('/js/notify.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    function buttonLoading(processType, ele){
        if(processType == 'loading'){
            ele.html(ele.attr('data-loading-text'));
            ele.attr('disabled', true);
        }else{
            ele.html(ele.attr('data-rest-text'));
            ele.attr('disabled', false);
        }
    }

      function successMsg(heading,message, html = ""){
        $.notify(heading+' : <i class="fa fa-bell-o"></i> <strong>'+message+'</strong> ', 
        {
            color: "#fff",
            background: "#20D67B",
            delay: 5000,
            close: true,
            align:"right", verticalAlign:"top"
        });
        
      }

      function errorMsg(heading,message){
      
        $.notify(heading+' : <i class="fa fa-bell-o"></i> <strong>'+message+'</strong> ', 
        {
            color: "#fff",
            background: "#D44950",
            delay: 5000,
            close: true,
            align:"right", verticalAlign:"top"
        });
      }
</script>


@yield('script')

</html>
