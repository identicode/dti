@extends('user.layout.app')

{{-- HTML Title --}}
@section('html-title')

@endsection

{{-- CSS VENDOR --}}
@section('css-top')
<link href="{{ asset('vendor/dataTables/datatables.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet">
@endsection

{{-- Custom CSS Styling--}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
@if($id == 0)
Sugested Retail Price
@else
{{ $storeInfo->name }} Price List
@endif
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Select Store here:</h5>
                            </div>
                            <div class="ibox-content">
                                <select id="select-category" name="category" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option></option>
                                <option value="/store/0">Sugested Retail Price (SRP)</option>
                                @foreach($stores as $store)
                                    <option value="/store/{{ $store->id }}">{{ $store->name }}</option>
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
                                <h5>
                                @if($id == 0)
								Sugested Retail Price
								@else
								{{ $storeInfo->name }} Price List
								@endif
                            	</h5>
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
                                @if($id != 0)
								<th>Store Price</th>
								@endif
                            </tr>
                            </thead>
                            <tbody>
                            @if($id == 0)
                            	@foreach($products as $product)
                            		<tr>
                            			<td>{{ $product->name }}</td>
                            			<td>{{ $product->category->name }}</td>
                            			<td>{{ $product->size }}</td>
                            			<td>{{ $product->srp }}</td>
                            		</tr>
                            	@endforeach
                            @else
                            	@foreach($products as $product)
                            		<tr>
                            			<td>{{ $product->product->name }}</td>
                            			<td>{{ $product->product->category->name }}</td>
                            			<td>{{ $product->product->size }}</td>
                            			<td>{{ $product->product->srp }}</td>
                            			<td>{{ $product->price }}</td>
                            		</tr>
                            	@endforeach
                            @endif
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
                            	<form method="POST" action="/comment">
                            	@csrf
                            		<textarea name="comment" class="form-control" required></textarea>
                            		<hr>
                                <button type="submit" class="btn btn-primary">Post your comment</button>
                            	</form>

                            </div>
                        </div>
                    </div>
                </div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')
<script src="{{ asset('vendor/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
@endsection

{{-- Custom JS Script --}}
@section('js-bot')
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
@endsection
