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
	New Deposit Details
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Deposit Entry Form</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
						<li><a href="{{route('deposit.index')}}"><span>Stoks</span></a></li>
						<li class="active"><span>New Deposit</span></li>
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
										<h6 class="panel-title txt-dark">New Deposit Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('deposit.store')}}" enctype="multipart/form-data">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Check/Voucher Number*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="voucher" value="{{old('voucher')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Invoice Number">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Deposit Amount*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="deposit_amount" value="{{old('deposit_amount')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Deposit Amount">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="business" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($businesses as $business)
																		<option value="{{$business->id}}">{{$business->business_name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Deposit Date*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="deposit_date" value="{{old('deposit_date')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Deposit By Manager*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="manager" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($managers as $manager)
																		<option value="{{$manager->id}}">{{$manager->name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Invoice Photo</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="file" name="photo" value="{{old('photo')}}" class="form-control" id="exampleInputuname_4">
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
	
@endsection