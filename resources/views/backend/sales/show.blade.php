@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Sales Details
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Sales Details</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Sales</span></a></li>
						<li class="active"><span>Sales Details</span></li>
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
												<img class="img-responsive" id="item-display" src="{{asset('images/sales/no_voucherphoto.jpg')}}" alt="voucher"/>
											</div>
										</div>
											
										<div class="col-md-7">
											<div class="product-detail-wrap">
												{{-- @php dd($sales) @endphp --}}
												
												<h3 class="mb-20">Sales Info</h3>
												<div class="product-price head-font mb-30">Voucher: {{$sales->invoice_number}} <br>
													Total Sales: {{$sales->total_amount}} <br>
													Collection Amount: {{$sales->collection_amount}} <br>
													Due Amount: {{$sales->due_amount}} <br> 
													Due Realization: {{$sales->due_realization}} <br>
												</div>
												
												<h4 class="mb-20">Retailer Info</h4>
												<p class="mb-50">Retailer Name: {{$sales->retailer->shop_name}} <br>
													Proprietor Name: {{$sales->retailer->proprietor_name}} <br>
													Shop Address: {{$sales->retailer->shop_address}} <br>	
													Contact Person: {{$sales->retailer->contact_person}} <br>
													Contact Number: {{$sales->retailer->contact_number}}	
												</p>
			
												<h4 class="mb-20">Center Info</h4>
												<p class="mb-50">Center Name: {{$sales->point->point_name}} <br>
													Address: {{$sales->point->point_address}}
												</p>

												<h4 class="mb-20">Employee Info</h4>
												<p class="mb-50">Employee Name: {{$sales->employee->name}} <br>
													Designation: {{$sales->employee->designation}} <br>
													Mobile Number: {{$sales->employee->contact_number}}<br>
													Address: {{$sales->employee->address}}<br>
													Email Address: {{$sales->contact_email}} <br>
													Photo: <br>
													<img src="{{asset($sales->employee->photo)}}" style="max-width:400px" alt=""> <br>
												</p>
												
												
												
												<div class="btn-group mr-10">
													<a href="{{route('sales.index')}}" class="btn btn-success btn-anim"><i class="fa  fa-angle-double-left"></i><span class="btn-text">Back to Sales list</span></a>
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