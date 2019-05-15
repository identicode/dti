@extends('admin.layout.app')

{{-- HTML Title --}}
@section('html-title')

@endsection

{{-- CSS VENDOR --}}
@section('css-top')
<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">
@endsection

{{-- Custom CSS Styling--}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
Update Product
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Fill up the form</h5>
	        </div>
	        <div class="ibox-content">
	            <form class="form-horizontal" method="POST" action="/admin/product/update/{{ $product->id }}">
                    @csrf
	       			<div class="form-group"><label class="col-sm-2 control-label">Product Name</label>
                        <div class="col-sm-5"><input type="text" name="name" class="form-control" value="{{ $product->name }}" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Size Unit</label>
                        <div class="col-sm-5"><input type="text" name="size" class="form-control" value="{{ $product->size }}" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-5">
                        	<select id="select-category" name="category" class="form-control" required>
                                <option></option>
                                @foreach($category as $cat)
                                <option value="{{ $cat->id }}" @if($product->cat_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">SRP</label>
                        <div class="col-sm-5"><input type="text" name="srp" class="form-control" value="{{ $product->srp }}" required></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
	       		</form>
	        </div>
	    </div>
	</div>
</div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')
<script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
@endsection

{{-- Custom JS Script --}}
@section('js-bot')
<script type="text/javascript">
	$("#select-category").select2({
	    placeholder: "Select a category",
	    allowClear: true
    });
</script>
@endsection
