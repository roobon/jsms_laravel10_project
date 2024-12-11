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
	Company Entry
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Retailer Entry Form</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>retailers</span></a></li>
						<li class="active"><span>New retailer</span></li>
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
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Enter Retailer Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('retailer.store')}}">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Shop Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="shop_name" value="{{old('shop_name')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Shop Name">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Proprieter Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="proprieter_name" value="{{old('proprieter_name')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Proprieter Name">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Address" rows="10">{{old('address')}}</textarea>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Person*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="contact_person" value="{{old('contact_person')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact Person">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Number*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="contact_number" value="{{old('contact_number')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact Number">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Email</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="contact_email" value="{{old('contact_email')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Email address">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Trade Lisence</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="trade_lisence" value="{{old('trade_lisence')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Trade Lisence Number">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Starts*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="business_starts" value="{{old('business_starts')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Business Date</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="last_business" value="{{old('last_business')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Balance</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="last_balance" value="{{old('last_balance')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Last Balance">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Status</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="status" id="" class="form-control">
																		<option value="">Select one</option>
																		<option value="active">Active</option>
																		<option value="inactive">Inactive</option>
																	</select>
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