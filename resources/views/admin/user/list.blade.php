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
User List
@endsection

{{-- Main Content --}}
@section('main-content')


<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>User List</h5>
	        </div>
	        <div class="ibox-content">

	            <div class="table-responsive">
        	        <table class="table table-striped table-bordered table-hover dataTables-example" >
        	        <thead>
        	        <tr>
        	            <th>#</th>
        	            <th>Name</th>
        	            <th>Username</th>
        	            <th>Date Created</th>
        	        </tr>
        	        </thead>
        	        <tbody>
                        @php($x = 1)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->created_at }}</td>
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
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

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
