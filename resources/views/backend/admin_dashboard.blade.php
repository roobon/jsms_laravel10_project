@extends ('backend.layouts.app')

@section('styles')
	@parent
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Morris Charts CSS -->
<link href="{{asset('vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

<!-- vector map CSS -->
<link href="{{asset('vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" type="text/css" />

<!-- Data table CSS -->
<link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">

<style>
	span.counter {
		font-size: 33px !important;
	}
</style>

@endsection

@section('js')
<!-- jQuery -->
<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Vector Maps JavaScript -->
<script src="{{asset('vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('dist/js/vectormap-data.js')}}"></script>

<!-- simpleWeather JavaScript -->
<script src="{{asset('vendors/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('dist/js/simpleweather-data.js')}}"></script>

<!-- Data table JavaScript -->
<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>

<!-- Sparkline JavaScript -->
<script src="{{asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('vendors/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/morris.js/morris.min.js')}}"></script>
<script src="{{asset('dist/js/morris-data.js')}}"></script>

<!-- ChartJS JavaScript -->
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>

<!-- Jquery Toast JavaScript -->
<script src="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

<!-- Init JavaScript -->
<script src="{{asset('dist/js/init.js')}}"></script>
<script src="{{asset('dist/js/dashboard2-data.js')}}"></script>

@endsection
@section('title')
	Jahanara SMS: Admin Dashboard
@endsection

@section('content')
<div class="container-fluid">

	<!-- Title -->
	<div class="row heading-bg  bg-blue">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="txt-light">Dashboard</h4>
		</div>
	</div>
	<!-- /Title -->
	<!-- Row -->
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Company</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">				
								<div class="col-xs-12">
									<div class="counter-wrap text-right">
										<span class="counter-cap"><i class="txt-success"></i></span><span class="counter"><a href="{{route('company.index')}}">{{$totalCompany}}</a></span><span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Centers</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-right">
										<span class="counter-cap"><i class="txt-danger"></i></span><span class="counter"><a href="{{route('points.index')}}">{{$totalPoint}}</a></span><span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Employees</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-right">
										<span class="counter-cap"><i class="txt-danger"></i></span><span class="counter"><a href="{{route('employee.index')}}">{{$totalEmployee}}</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Retailers</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-right">
										<span class="counter-cap"><i class="txt-success"></i></span><span class="counter"><a href="{{route('retailer.index')}}">{{$totalRetailer}}</a></span><span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
	</div>
	<div class="row heading-bg  bg-blue">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="txt-light">Fact & figures: {{$curMonth}}, {{$curYear}}</h4>
		</div>
	</div>

	<div class="row">	
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Sales Target</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-center">
										<span class="counter-cap"><i class="txt-danger"></i></span><span class="counter"><a href="{{route('target.index')}}">{{$targets>0 ? number_format($targets, 0) . ' Tk' :'No Targets'}}</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Payments</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-center">
										<span class="counter"><a href="{{route('payment.index')}}">{{$payments>0 ? number_format($payments, 0) . ' Tk' :'No Payments'}}</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Stocks</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-center">
									<span class="counter"><a href="{{route('stock.index')}}">{{$stocks>0 ? number_format($stocks,0) . ' Tk' :'No Stocks'}}</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Total Sales</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="sm-graph-box">
							<div class="row">
								<div class="col-xs-12">
									<div class="counter-wrap text-center">
										<span class="counter"><a href="{{route('sales.index')}}">{{$sales>0 ? number_format($sales, 0) . ' Tk' :'No Sales'}}</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- /Row -->
	<!-- Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<h5></h5>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<img src="{{asset('images/1714359282802.gif')}}" style="width:100%" alt="">
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Row -->

	<!-- Row -->

	<!-- /Row -->


</div>

@endsection