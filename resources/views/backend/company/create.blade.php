@extends('backend.layouts.app')

@section('css')
    <!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<!-- Data table CSS -->
	<link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
	<!-- Data table JavaScript -->
	<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/pdfmake/build/pdfmake.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/pdfmake/build/vfs_fonts.js')}}"></script>
	
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('dist/js/export-table-data.js')}}"></script>
	<!-- Slimscroll JavaScript -->
	<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
	<!-- Init JavaScript -->
	<script src="{{asset('dist/js/init.js')}}"></script>
@endsection
@section('title')

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
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Enter Company Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('company.store')}}">
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Starts*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="start_date" value="{{old('start_date')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Security Money*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="security_money" value="{{old('security_money')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Security money">
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Website</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="website" value="{{old('website')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Web address">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Business</label>
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Balance</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="status" id="">
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
																<button type="submit" class="btn btn-info ">Submit</button>
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