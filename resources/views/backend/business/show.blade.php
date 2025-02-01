@extends('backend.layouts.app')

@section('styles')
	@parent
	<!-- jquery-steps css -->
	<link rel="stylesheet" href="{{asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css')}}">
	
	<!-- bootstrap-touchspin CSS -->
	<link href="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css"/>
		
@endsection

@section('title')
	Business Details
@endsection

@section('content')
<div class="container-fluid">
	<!-- Title -->
	<div class="row heading-bg bg-pink">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">Business details</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
			<li><a href="{{route('business.index')}}"><span>Business</span></a></li>
			<li class="active"><span>business details</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
	<!-- /Title -->
	
	<!-- Row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<div class="item-big">
									<img class="img-responsive" id="item-display" src="{{asset('images/business/nophoto.jpg')}}" alt="product"/>
								</div>
							</div>
								
							<div class="col-md-7">
								<div class="product-detail-wrap">
									
									
									<h3 class="mb-20">{{$business->business_name}}</h3>
									<div class="product-price head-font mb-30">{{$business->company_address}} 
										<br>	
									 
									{{$business->website}}	
									</div>
									
									<h4 class="mb-20">Business Info</h4>
									<p class="mb-50">Business Starting Date: {{$business->business_starts}} <br>
									Security Money: {{$business->security_money}} <br>
									Last Business Date: {{$business->last_business_date}} <br>	
									Last Business Balance: {{$business->last_balance}}	
									
									</p>

									<h4 class="mb-20">Contact Info</h4>
									<p class="mb-50">Contact Person: {{$business->contact_person}} <br>
									Mobile Number: {{$business->contact_number}}
									<br>
									Email Address: {{$business->contact_email}}
									</p>
									
									
									
									<div class="btn-group mr-10">
										<a href="{{route('business.index')}}" class="btn btn-success btn-anim"><i class="fa  fa-angle-double-left"></i><span class="btn-text">Back to Business list</span></a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Row -->
	
	<!-- Row -->
		
		<!-- /Row -->
</div>
@endsection

@section('scripts')
    @parent
	<!-- Form Wizard JavaScript -->
	<script src="{{asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js')}}"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
		
	<!-- Starrr JavaScript -->
	<script src="{{asset('dist/js/starrr.js')}}"></script>
	
	<!-- Product Detail Data JavaScript -->
	<script src="{{asset('dist/js/product-detail-data.js')}}"></script>
@endsection