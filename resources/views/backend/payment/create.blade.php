@extends('backend.layouts.app')

@section('styles')
	@parent
	<style>
		.input-group-addon {
			background-color: rgba(236, 236, 236, 0.383)
		}
	</style>
@endsection

@section('title')
	Payment Entry
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">New Payment Entry</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Payments</span></a></li>
						<li class="active"><span>New Payment</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">	
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									@include('backend.layouts.error')
									<div class="pull-left">
										<h6 class="panel-title txt-dark">New Payment Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('payment.store')}}">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Payment Method*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="transfer_method" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		<option value="banktransfer">Bank Transfer</option>
																		<option value="rtgs">RTGS</option>
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Vourcher/Cheque*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="voucher" value="{{old('voucher')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Voucher or cheque Number">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Payment Amount*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="payment_amount" value="{{old('payment_amount')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Payment Amount">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Payment Date*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="payment_date" value="{{old('payment_date')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Point Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="point" class="form-control">
																		<option value="">Select one</option>
																		@foreach($points as $point)
																		<option value="{{$point->id}}">{{$point->point_name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="company" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($companies as $company)
																		<option value="{{$company->id}}">{{$company->company_name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Employee Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="employee" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($employees as $employee)
																		<option value="{{$employee->id}}">{{$employee->name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputEmail_4" class="col-sm-3 control-label">Note</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea type="text" name="payment_note" class="form-control" id="exampleInputEmail_4" placeholder="Enter any message" rows="10">{{old('payment_note')}}</textarea>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info ">SUBMIT</button>
															</div>
														</div>
													</form>
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
	<script>
		// $(document).ready(function () {
		// 	$('#retailerId').on('change', function(){
		// 		let id =$('#retailerId').val();

		// 		$.ajax({
		// 			type: "GET",
		// 			url: "info",
		// 			data: {
		// 				"_token": "{{ csrf_token() }}",
		// 				"data":"Hello World"
		// 			},
					
		// 			success: function (response) {
		// 				alert('Success');
		// 			},
		// 			error: function(response){
		// 				alert("fail");
		// 			}
		// 		});
		// 	})
		// });
	</script>
@endsection