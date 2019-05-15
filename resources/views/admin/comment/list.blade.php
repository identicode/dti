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
Comments
@endsection

{{-- Main Content --}}
@section('main-content')


<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Comments</h5>
	        </div>
	        <div class="ibox-content">

	            <div class="table-responsive">
        	        <table class="table table-striped table-bordered table-hover dataTables-example" >
        	        <thead>
        	        <tr>
        	            <th>Date</th>
        	            <th>Name</th>
        	            <th>Comments</th>
        	            <th>Action</th>
        	        </tr>
        	        </thead>
        	        <tbody>
                        @php($x = 1)
                        @foreach($comments as $com)
                        	<tr>
                        		<td>{{ date('F d, Y', $com->timestamp) }}</td>
                        		<td>{{ $com->user->name }}</td>
                        		<td>{{ $com->comment }}</td>
                        		<td>
                        			<button onclick="deleteCo('{{ $com->id }}')" class="btn btn-primary btn-xs"><i class="fa fa-trash"></i> Delete</button>
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

function deleteCo(id)
{
    swal({
        title: "Delete this comment?",
        text: "You will not be able to recover this information!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        window.location = '/admin/comment/delete/'+id;
    });
}
</script>
@endsection
