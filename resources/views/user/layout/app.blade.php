<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTI-PRIMOS | @yield('html-title')</title>

    @section('css-top')
    @show

    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{ asset('vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">





    @section('css-bot')
    @show

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand">Price Monitoring System</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a role="button" href="/store/0"> Store</a>
                    </li>

                    <li>
                        <a role="button" href="/comments"> My Comments</a>
                    </li>
                </ul>

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/profile">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <h1>@yield('page-title')</h1>
                <hr>
                @section('main-content')
                @show
            </div>
        <div class="footer">
            <div>
                <strong>Department of Trade and Industry - Price Monitoring System</strong> &copy; {{ date('Y', time()) }}
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('vendor/jquery/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>

    @section('js-top')
    @show

   
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('vendor/pace/pace.min.js') }}"></script>

    <!-- Toastr script -->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

    <!-- Sweet alert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    @section('js-bot')
    @show


</body>

</html>
