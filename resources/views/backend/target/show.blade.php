@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Target Details
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Export</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						<li class="active"><span>Export</span></li>
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
												<img class="img-responsive" id="item-display" src="{{asset('images/point/store_nophoto.jpg')}}" alt="product"/>
											</div>
										</div>
											
										<div class="col-md-7">
											<div class="product-detail-wrap">
												
												
												<h3 class="mb-20">{{$target->point_name}}</h3>
												<div class="product-price head-font mb-30">Address: {{$target->point_address}} 
												</div>
												
												<h4 class="mb-20">Business Info</h4>
												<p class="mb-50">Point Establishment Date: {{$target->opening_date}} <br>											
												</p>
			
												<h4 class="mb-20">Contact Info</h4>
												<p class="mb-50">Contact Person: {{$employee[0]->name ?? ''}} <br>
													Designation: {{$employee[0]->designation ?? ''}} <br>
												Mobile Number: {{$employee[0]->contact_number ?? ''}}
												<br>
												Email Address: {{$employee[0]->address ?? ''}}
												</p>
												
												
												
												<div class="btn-group mr-10">
													<a href="{{route('target.index')}}" class="btn btn-success btn-anim"><i class="fa  fa-angle-double-left"></i><span class="btn-text">Back to target list</span></a>
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
			</div>

@endsection

@section('scripts')
    @parent
@endsection