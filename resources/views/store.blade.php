<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTI-PRIMOS | </title>


    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{ asset('vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


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
            

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/register">
                            <i class="fa fa-user"></i> Register
                        </a>
                    </li>

                    <li>
                        <a href="/login">
                            <i class="fa fa-sign-in"></i> Log In
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <h1>{{ $storeInfo->name }} Price List</h1>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Select Store here:</h5>
                            </div>
                            <div class="ibox-content">
                                <select id="select-category" name="category" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option></option>
                                <option value="/">Sugested Retail Price (SRP)</option>
                                @foreach($stores as $store)
                                    <option value="/store/view/{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{ $storeInfo->name }} Price List</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th>SRPs</th>
                                <th>Store Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product->name }}</td>
                                        <td>{{ $product->product->category->name }}</td>
                                        <td>{{ $product->product->size }}</td>
                                        <td>{{ $product->product->srp }}</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Comment:</h5>
                            </div>
                            <div class="ibox-content">
                                <textarea class="form-control" disabled>Please login first to add comment.</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <div class="footer">
            <div>
                <strong>Department of Trade and Industry</strong> - Price Monitoring System &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('vendor/jquery/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>

   

   
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('vendor/pace/pace.min.js') }}"></script>

    <!-- Toastr script -->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

    <!-- Sweet alert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('vendor/dataTables/datatables.min.js') }}"></script>

    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('success') }}");
        @endif
    </script>

    <script type="text/javascript">
        $("#select-category").select2({
            placeholder: "Select a store",
            allowClear: true
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: []

            });


        });
    </script>

    

</body>

</html>
