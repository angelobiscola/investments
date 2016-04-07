<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Investments</title>

    @section('css')
    <!-- Fonts -->
    <link href="{!! asset('bower_components/font-awesome/css/font-awesome.css') !!}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    @show

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/investment') }}">
                InvesTT
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if (!Auth::guard('collaborator')->guest())
                    <li><a href="{{ url('/investment/client') }}">Clients</a></li>
                    <li><a href="{{ url('/investment/cpr') }}">CPR</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guard('collaborator')->guest())

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('collaborator')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('collaborator.home.company') }}"><i class="glyphicon glyphicon glyphicon-sort"></i>Change Company</a></li>
                            <li><a href="{{ route('collaborator.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (session('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('error') }}
    </div>
@endif

@yield('content')

@section('scripts')
        <!-- JavaScripts -->
<script src="{!! asset('bower_components/jquery-2.1.4.min/index.js') !!}"></script>
<!-- script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script -->
<script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.js') !!}"></script>
<script src="{!! asset('js/restful.js') !!}"></script>
<!-- Masks -->
<script src="{!! asset('bower_components/jquery-mask-plugin/dist/jquery.mask.min.js') !!}"></script>
<script src="{!! asset('js/mask_custon.js') !!}"></script>

@show

</body>
</html>
