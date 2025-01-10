@extends('backend.layouts.app')

@section('styles')
<link href="{{asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	@parent
@endsection

@section('title')
	JSMS: Report List
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					 
					<h5 class="txt-light">Report List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
						<li class="active"><span>Reports</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div>
									@include('backend.layouts.success')
									{{-- <h6 class="panel-title txt-dark">Point List</h6> --}}
								</div>
								<div class="pull-right"></div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                                        <th>ID</th>
														<th style="width:20%">Report Name</th>
														<th  class="text-center">Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th style="width:20%">Report Name</th>
														<th class="text-center" style="width:80%">Action</th>
													</tr>
												</tfoot>
												<tbody>
													
                                                    <tr>
														<td>1</td>
														<td style="width:20%">Company wise Summary Report</td>
														<td  class="text-right" style="width:80%">
														
														<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-inline" method="get" action="{{route('report1')}}">
											   <div class="form-group mr-15">
													<label class="control-label mr-10" for="email_inline">Company:</label>
													<select name="company">
																<option value="all">All Company</option>
																@foreach($companies as $company)
																<option value="{{$company->id}}">{{$company->company_name}}</option>
																@endforeach
															</select>
											    </div>
											    <div class="form-group mr-15">
													<label class="control-label mr-10" for="pwd_inline">Month:</label>
													<select name="month" id="">
																<option value="">Select Month</option>
																<option value="1">January</option>
																<option value="2">February</option>
																<option value="3">March</option>
																<option value="4">April</option>
																<option value="5">May</option>
																<option value="6">June</option>
																<option value="7">July</option>
																<option value="8">August</option>
																<option value="9">September</option>
																<option value="10">October</option>
																<option value="11">November</option>
																<option value="12">December</option>
															</select>
											    </div>
												<div class="form-group mr-15">
													<label class="control-label mr-10" for="pwd_inline">Year:</label>
													<select name="year">
																<option value="">Select Year</option>
																<option value="2025">2026</option>
																<option value="2025">2025</option>
																<option value="2024">2024</option>
																<option value="2024">2023</option>
																<option value="2024">2022</option>
															</select>
											    </div>
											    
												<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">SHOW</span></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

															
														</td>	
													</tr>
													<tr>
														<td>2</td>
														<td style="width:20%">Company wise Detailed Report</td>
														<td  class="text-right" style="width:80%">
														
														<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-inline" method="get" action="{{route('report2')}}">
											   <div class="form-group mr-15">
													<label class="control-label mr-10" for="email_inline">Company:</label>
													<select name="company">
																<option value="all">All Company</option>
																@foreach($companies as $company)
																<option value="{{$company->id}}">{{$company->company_name}}</option>
																@endforeach
															</select>
											    </div>
											    <div class="form-group mr-15">
													<label class="control-label mr-10" for="pwd_inline">Month:</label>
													<select name="month" id="">
																<option value="">Select Month</option>
																<option>January</option>
																<option>February</option>
																<option>March</option>
																<option>April</option>
																<option>May</option>
																<option>June</option>
																<option>July</option>
																<option>August</option>
																<option>September</option>
																<option>October</option>
																<option>November</option>
																<option>December</option>
															</select>
											    </div>
												<div class="form-group mr-15">
													<label class="control-label mr-10" for="pwd_inline">Year:</label>
													<select name="year">
																<option value="">Select Year</option>
																<option value="2025">2026</option>
																<option value="2025">2025</option>
																<option value="2024">2024</option>
																<option value="2024">2023</option>
																<option value="2024">2022</option>
															</select>
											    </div>
											    
												<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">SHOW</span></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

															
														</td>	
													</tr>
													<tr>
														<td>3</td>
														<td>Company wise Detailed Report</td>
														
														<td style="width: 15%;" class="text-center">
															<a class="btn btn-success" href="{{url('/admin/report1')}}">Show</a>
														</td>	
													</tr>
													<tr>
														<td>4</td>
														<td>Company wise Summary Report in Bangla</td>
														
														<td style="width: 15%;" class="text-center">
															<a class="btn btn-success" href="{{url('/admin/report2')}}">Show</a>
														</td>	
													</tr>
													<tr>
														<td>5</td>
														<td>Center wise Summary Report</td>
														
														<td style="width: 15%;" class="text-center">
															<a class="btn btn-success" href="{{url('/admin/report3')}}">Show</a>
														</td>	
													</tr>
													<tr>
														<td>6</td>
														<td>Center wise Detailed Report</td>
														
														<td style="width: 15%;" class="text-center">
															<a class="btn btn-success" href="{{url('/admin/report3')}}">Show</a>
														</td>	
													</tr>
													
												</tbody>
											</table>
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
	<script src="{{asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>
@endsection