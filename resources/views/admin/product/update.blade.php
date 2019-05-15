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
Update Product SRP
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Sugested Retail Price</h5>
	            <div class="ibox-tools">
                 	<button onclick="$('#price-form').submit()" class="btn btn-primary btn-xs">Update Product List</button>               
                </div>
	        </div>
	        <div class="ibox-content">

	        <div class="table-responsive">
	        <form id="price-form" method="POST" action="/admin/product/update">
	        @csrf
	        <table class="table table-striped table-bordered table-hover dataTables-example" >
	        <thead>
	        <tr>
	            <th>#</th>
	            <th>Product</th>
	            <th>Category</th>
	            <th>Size</th>
	            <th>SRPs</th>
	            <th>New SRP</th>
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
	                <td>{{ $product->srp }}</td>
	                <td width="6%">
	                	<input type="hidden" name="pid[]" value="{{ $product->id }}">
	                	<input type="number" name="product[]">
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
