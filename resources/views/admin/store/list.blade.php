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
Store
@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-lg-8">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Store List</h5>
	        </div>
	        <div class="ibox-content">

	            <div class="table-responsive">
	        <table class="table table-striped table-bordered table-hover dataTables-example" >
	        <thead>
	        <tr>
	            <th>#</th>
	            <th width="50%">Store Name</th>
	            <th>Address</th>
	            <th>Action</th>
	        </tr>
	        </thead>
	        <tbody>
	        	@php($x = 1)
	        	@foreach($stores as $store)
	            <tr>
	                <td>{{ $x++ }}</td>
	                <td>{{ $store->name }}</td>
	                <td>{{ $store->address }}</td>
	                <td class="text-center">
                        <div class="btn-group">
                            <a href="/admin/store/show/{{ $store->id }}" class="btn-primary btn btn-xs">View</a >
                            <a href="/admin/store/edit/{{ $store->id }}" class="btn-success btn btn-xs">Update</a>
                            <button onclick="editStore('{{ $store->id }}', '{{ $store->name }}')" class="btn-warning btn btn-xs">Edit</button>
                            <button onclick="deleteStore('{{ $store->id }}')" class="btn-info btn btn-xs">Delete</button>
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
	<div class="col-lg-4">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Add Store</h5>
	        </div>
	        <div class="ibox-content">
	        	<form method="POST" action="/admin/store">
	        		@csrf
	        		<div class="form-group">
		        		<label>Store Name</label>
		        		<input type="text" name="store" required placeholder="Store Name" class="form-control">
		        	</div>

		        	<div class="hr-line-dashed"></div>

		        	<div class="form-group">
		        		<label>Store Address</label>
		        		<input type="text" name="address" required placeholder="Store Address" class="form-control">
		        	</div>

		        	<div class="hr-line-dashed"></div>

		        	<div class="form-group">
		        		<button class="btn btn-primary" type="submit">Add Store</button>
		        	</div>

	        	</form>
	        </div>
	    </div>
	</div>
</div>

<div class="modal inmodal fade" id="store-edit-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Store Name</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="/admin/store/update">
                @method('PUT')
                @csrf
	                <div class="form-group">
	                	<label>Store Name</label>
	                	<input type="hidden" id="store-edit-id" name="sid" value="">
	                	<input type="text" id="store-edit-name" name="name" placeholder="Store Name" value="" class="form-control">
	                </div>
	                
	            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
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
           
        ]
    });
});

function editStore(id, name)
{
	$('#store-edit-id').val(id);
	$('#store-edit-name').val(name);
	$('#store-edit-modal').modal('show');
}
function deleteStore(id){
	swal({
        title: "Delete this store?",
        text: "You will not be able to recover this information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/admin/store/delete/'+id;
    });
}
</script>
@endsection
