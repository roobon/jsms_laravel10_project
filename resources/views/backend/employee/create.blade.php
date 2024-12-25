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
	Employee Entry
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Employee Entry Form</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>remployees</span></a></li>
						<li class="active"><span>New employee</span></li>
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
										<h6 class="panel-title txt-dark">Enter Employee Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('employee.store')}}">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Employee Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Employee Name">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Designation*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="designation" class="form-control">
																		<option value="">Select one</option>
																		<option value="Manager">Manager</option>
																		<option value="Delivery Man">Delivery Man</option>
																		<option value="Van Driver">Van Driver</option>
																		<option value="Store Keeper">Store Keeper</option>
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Address" rows="10">{{old('address')}}</textarea>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Date of Birth</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="dob" value="{{old('dob')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Joining Date*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="joining_date" value="{{old('joining_date')}}" class="form-control" id="exampleInputuname_4">
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Email Address</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="contact_email" value="{{old('contact_email')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Email address">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Password*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="password" name="password" class="form-control" id="exampleInputuname_4" placeholder="Enter Password">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Repeat Password*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="password" name="password_confirmation" class="form-control" id="exampleInputuname_4" placeholder="Enter Password Again">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Photo</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="file" name="photo" value="{{old('photo')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">NID</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="file" name="nid" value="{{old('nid')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Resume</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="file" name="resume" value="{{old('resume')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Center Name*</label>
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