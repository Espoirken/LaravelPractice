<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @toastr_js

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @toastr_css
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('detail') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        @can('isClient')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events')}}"><i class="fa fa-address-book" aria-hidden="true"></i> Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('children')}}"><i class="fa fa-address-book" aria-hidden="true"></i> Children</a>
                        </li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events')}}"><i class="fa fa-address-book" aria-hidden="true"></i> Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients')}}"><i class="fa fa-users" aria-hidden="true"></i> Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}"><i class="fa fa-list" aria-hidden="true"></i> Admin</a>
                        </li>
                        @endcan
                        @can('isCoach')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events')}}"><i class="fa fa-address-book" aria-hidden="true"></i> Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients')}}"><i class="fa fa-users" aria-hidden="true"></i> Client</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @can('isClient')
                            @endcan
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit', ['id' => $user->id]) }}"><i class="fa fa-edit" ></i> Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" ></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        $("#polo_check").click(function(){
            if($('input[type=checkbox]').prop('checked')){
                $("#polo").removeAttr('readonly');
            } else {
                $("#polo").attr('readonly', 'true');
            }
            
        });
    $(document).ready(function(){
        if($("#polo").val() != ""){
            $("#polo").removeAttr('readonly');
            $("#polo_check").attr('checked', 'checked');
        }
    });
    </script>
    @include('inc.datetimepicker')
    @include('inc.consent')
    @include('inc.jqueryvalidate')
@toastr_render
</body>
</html>
