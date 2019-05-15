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
Update {{ $store->name }} Product Price
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Update {{ $store->name }} Product Price</h5>
	            <div class="ibox-tools">
                 	<button onclick="$('#price-form').submit()" class="btn btn-primary btn-xs">Update Product List</button>               
                </div>

	        </div>
	        <div class="ibox-content">

	       	<div class="table-responsive">
	       		<form id="price-form" method="POST" action="/admin/store/update/price">
	       			@csrf
	       			<input type="hidden" name="store_id" value="{{ $store->id }}">
		        <table class="table table-striped table-bordered table-hover dataTables-example" >
		        <thead>
		        <tr>
		            <th>#</th>
		            <th>Product</th>
		            <th>Category</th>
		            <th>Size</th>
		            <th>SRPs</th>
		            <th>Current Price</th>
		            <th>New Price</th>
		        </tr>
		        </thead>
		        <tbody>
		        	
		        	
		        	@php($x = 1)
		        	@php($y = 0)
		        	@php($z = 0)
		        	@foreach($products as $product)
		            <tr>
		                <td>{{ $x++ }}</td>
		                <td>{{ $product->product->name }}</td>
		                <td>{{ $product->product->category->name }}</td>
		                <td>{{ $product->product->size }}</td>
		                <td>{{ $product->product->srp }}</td>
		                <td>{{ $product->price }}</td>
		                <td width="6%">
		                	<input type="hidden" name="pid[]" value="{{ $product->product->id }}">
		                	<input type="text" name="product[]">
		                </td>
		            	
		            </tr>
		            @endforeach
		        </tbody>
		        </table>
		        </form>
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
        buttons: []

    });

});
</script>
@endsection
