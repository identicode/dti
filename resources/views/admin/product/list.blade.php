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
Product List
@endsection

{{-- Main Content --}}
@section('main-content')
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
	            <th>#</th>
	            <th>Product</th>
	            <th>Category</th>
	            <th>Size</th>
	            <th>Last SRP</th>
	            <th>Latest SRP</th>
	            <th>Last Update</th>
	            <th>Price Graph</th>
	            <th>Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        	@php($x = 1)
	        	@foreach($products as $product)
	            <tr>
	                <td>{{ $x++ }}</td>
	                <td>{{ $product->name }}</td>
	                <td>{{ $product->category->name }}</td>
	                <td>{{ $product->size }}</td>
	                <td>{{ $product->lsrp }}</td>
	                <td>{{ $product->srp }}</td>
	                <td>@if($product->timestamp !== '') {{ date('d-m-y', $product->timestamp) }} @endif</td>
	            	<td><a target="_new" href="/admin/product/graph/{{ $product->id }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a></td>
	            	<td class="text-center">
	            		<div class="btn-group">
                            <a href="/admin/product/edit/{{ $product->id }}" class="btn-warning btn btn-xs">Edit</a>
                            <button onclick="delProduct('{{ $product->id }}')" class="btn-info btn btn-xs">Delete</button>
                        </div>
	            	</td>
	            </tr>
	            @endforeach
	        </tbody>
	        </table>
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

function delProduct(id)
{
	swal({
        title: "Delete this product?",
        text: "You will not be able to recover this information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/admin/product/delete/'+id;
    });
}

$(document).ready(function(){
    $('.dataTables-example').DataTable({
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            
            {extend: 'excel', title: 'ExampleFile'},
            {
            	extend: 'print',
            	title: '',
            	exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                autoPrint: false,

             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).prepend(
                            	'<h1 align="center">Suggested Retail Price as of {{ date('F d, Y', time()) }}</h1>'
                        	);

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
