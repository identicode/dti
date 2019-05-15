
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTI - ADMIN | Login</title>

    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{ asset('vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <img style="margin-left: -30px ;" src="{{ asset('img/banner.jpg') }}" width="350px" height="200px">
            <h3>Department of Trade and Industry</h3>
            <p>Price Monitoring System</p>
            <form class="m-t" role="form" method="POST" action="{{ url('/admin/login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>
            <p class="m-t"> <small>DTI - Price Monitoring System &copy;</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('vendor/jquery/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Sweet alert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        @if($errors->has('username'))
             swal({
                title: "Error",
                text: "Invalid credentials.",
                type: "error"
            });
        @endif
    </script>

</body>

</html>