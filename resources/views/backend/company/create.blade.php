@extends('backend.layouts.app')

@section('styles')
	@parent
	<style>
		.input-group-addon {
			background-color: rgba(236, 236, 236, 0.383)
		}
		label {
			
			padding: 13px;
			
		 	
		}
		.form-title {
			font-size:25px;
			background-color: rgba(226, 230, 226, 0.772);
			padding: 25px;
			width: 100%;
			color: rgb(213, 231, 210);
			text-shadow: 2px 2px 4px #000000;
		}
	</style>
@endsection

@section('title')
	Company Entry
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Company Entry Form</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
						<li><a href="{{route('company.index')}}"><span>companies</span></a></li>
						<li class="active"><span>New Company</span></li>
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
									<div class="text-center">
										<h6 class="panel-title txt-dark form-title">New Company Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="company_name" value="{{old('company_name')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Comopany Name">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														
														
														<div class="form-group">
															<label for="exampleInputEmail_4" class="col-sm-3 control-label">Company Address</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Company Address" rows="10">{{old('address')}}</textarea>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Person*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="contact_person" value="{{old('contact_person')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact person">
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Website</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="website" value="{{old('website')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Web address">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Photo</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="file" name="photo" value="{{old('photo')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
													
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Status*</label>
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
																<button type="submit" class="btn btn-primary btn-block">Submit</button>
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