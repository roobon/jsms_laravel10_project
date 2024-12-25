@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Target Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">Target Edit Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>Targets</span></a></li>
			<li class="active"><span>Edit Target</span></li>
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
							<h6 class="panel-title txt-dark">Edit Target Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							@include('backend.layouts.errors')
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form class="form-horizontal" method="post" action="{{route('target.update', $target->id)}}">
											@method('PUT')
											@csrf
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Target for*</label>
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
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Target Set by*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<select name="company" class="form-control">
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
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Start Date*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="start_date" value="{{old('start_date')}}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">End Date*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="end_date" value="{{old('end_date')}}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">IMS Target*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="ims_target" value="{{old('ims_target')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Target Amount">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Collection Target*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="collection_target" value="{{old('collection_target')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Collection Target (%) ">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Working Days*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="working_days" value="{{old('working_days')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Numbr of Working Days for Current month">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group mb-0">
												<div class="col-sm-offset-3 col-sm-9">
													<button type="submit" class="btn btn-info ">UPDATE</button>
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