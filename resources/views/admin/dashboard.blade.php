@extends('admin.layout.app')

{{-- HTML Title --}}
@section('html-title')

@endsection

{{-- CSS VENDOR --}}
@section('css-top')
<link href="{{ asset('vendor/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

{{-- Custom CSS Styling--}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Dashboard
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">

    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Products</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $count['product'] }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Stores</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $count['store'] }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Registered Users</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $count['user'] }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Comments</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $count['comment'] }}</h1>
            </div>
        </div>
    </div>
                
</div>

<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Sugested Retail Price</h5>
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
	        </tr>
	        </thead>
	        <tbody>
                @foreach($products as $product)
	            <tr>
	                <td>{{ $product->name }}</td>
	                <td>{{ $product->category->name }}</td>
	                <td>{{ $product->size }}</td>
	                <td>{{ $product->srp }}</td>
	            </tr>
	            @endforeach
	        </tbody>
	        </table>
	            </div>

	        </div>
	    </div>
	</div>
</div>

</div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')
<script src="{{ asset('vendor/dataTables/datatables.min.js') }}"></script>
@endsection

{{-- Custom JS Script --}}
@section('js-bot')
<script type="text/javascript">
	$(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });


        });
</script>
@endsection
