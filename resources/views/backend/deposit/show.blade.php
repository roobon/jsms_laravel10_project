@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Deposit Details
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
						<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
						<li><a href="{{route('stock.index')}}"><span>Stocks</span></a></li>
						<li class="active"><span>Stock Details</span></li>
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
												<img class="img-responsive" id="item-display" src="{{asset('images/deposit/novoucher.jpg')}}" alt="voucher"/>
											</div>
										</div>
											
										<div class="col-md-7">
											<div class="product-detail-wrap">
												{{-- @php dd($deposit) @endphp --}}
												
												<h3 class="mb-20">{{$deposit->name}}</h3>
												<div class="product-price head-font mb-30">{{$deposit->invoice_number}} 
												</div>
												
												<h4 class="mb-20">Retailer Info</h4>
												<p class="mb-50">Business Starting Date: {{$deposit->shop_name}} <br>
												Last Business Date: {{$deposit->last_business}} <br>	
												Last Business Balance: {{$deposit->last_balance}}	
												
												</p>
			
												<h4 class="mb-20">Point Info</h4>
												<p class="mb-50">Contact Person: {{$deposit->contact_person}} <br>
												Mobile Number: {{$deposit->contact_number}}
												<br>
												Email Address: {{$deposit->contact_email}}
												</p>
												
												
												
												<div class="btn-group mr-10">
													<a href="{{route('deposit.index')}}" class="btn btn-success btn-anim"><i class="fa  fa-angle-double-left"></i><span class="btn-text">Back to deposit list</span></a>
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