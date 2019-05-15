@extends('admin.layout.app')

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

@endsection

{{-- Main Content --}}
@section('main-content')
<div class="row">
    <div class="col-lg-12">
	    <div class="ibox float-e-margins">
	        <div class="ibox-title">
	            <h5>Price History Chart for Product: {{  $product->name }}</h5>
	            <div class="ibox-tools hidden-print">
                    <button onclick="javascript:window.print()" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Print</button>
                </div>
	        </div>
	        <div class="ibox-content">
	        	<div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart"></div>
                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

{{-- JS VENDOR --}}
@section('js-top')
<!-- Flot -->
<script src="{{ asset('vendor/flot/js/jquery.flot.js') }}"></script>
<script src="{{ asset('vendor/flot/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('vendor/flot/js/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('vendor/flot/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('vendor/flot/js/jquery.flot.time.js') }}"></script>
@endsection

{{-- Custom JS Script --}}
@section('js-bot')
<script type="text/javascript">
	$(function() {

		var ticks = [
			@php($x = 0)
			@foreach($prices as $price)
				[{{ $x++ }}, "{{ date('F d, Y', $price->timestamp) }}"],
			@endforeach
			];
		var data = [
				@php($y = 0)
				@foreach($prices as $price)
					[{{ $y++ }}, {{ $price->price }}],
				@endforeach
			];


    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            ticks: ticks,
            tickDecimals: 1
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: false,
            clickable: false,
            tickColor: "#D4D4D4",
            borderWidth:0
        },
        legend: {
            show: false
        },
        tooltip: false,
        tooltipOpts: {
            content: "Date: %x, Price: %y"
        }
    };
    var barData = {
        label: "bar",
        data: data
    };
    $.plot($("#flot-line-chart"), [barData], barOptions);

});
</script>
@endsection
