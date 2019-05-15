@extends('user.layout.app')

{{-- HTML Title --}}
@section('html-title')

@endsection

{{-- CSS VENDOR --}}
@section('css-top')

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
	@foreach($comments as $comment)
    <div class="col-lg-6">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Date Added: {{ date('F d, Y', $comment->timestamp) }}</h5>
	        </div>
	        <div class="ibox-content">
	        	<p>{{ $comment->comment }} </p>
	        </div>
	    </div>
	</div>
	@endforeach
</div>

<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-content text-center">
	        	{{ $comments->links() }}
	        </div>
	    </div>
	</div>
</div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')

@endsection

{{-- Custom JS Script --}}
@section('js-bot')

@endsection
