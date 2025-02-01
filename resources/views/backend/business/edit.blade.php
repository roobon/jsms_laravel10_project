@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	business Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">business Edit Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="{{route('business.index')}}"><span>businesses</span></a></li>
			<li class="active"><span>Edit business</span></li>
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
							<h6 class="panel-title txt-dark">Edit business Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							@include('backend.layouts.errors')
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form class="form-horizontal" method="post" action="{{route('business.update', $business->id)}}" enctype="multipart/form-data">
											@method('PUT')
											@csrf
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">business Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="business_name" value="{{$business->business_name ?? old('business_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Comopany Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Starts*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="launch_date" value="{{$business->launch_date ?? old('launch_date') }}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Security Money*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="security_money" value="{{$business->security_money ?? old('security_money') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Security money">
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
															<option value="{{$point->id}}" {{($point->id == $business->point_id) ? 'selected=selected': ''}}>{{$point->point_name}}</option>
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
														<select name="company" class="form-control">
															<option value="">Select one</option>
															@foreach($companies as $company)
															<option value="{{$company->id}}" {{($company->id == $business->company_id) ? 'selected=selected': ''}}>{{$company->company_name}}</option>
															@endforeach
														</select>
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Photo</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="file" name="photo" value="{{old('photo')}}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
													<img src="{{$business->launch_photo? asset($business->launch_photo):''}}" alt="" width="300">
												</div>
												
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Status</label>
												<div class="col-sm-9">
													<div class="input-group">
														<select name="status" id="" class="form-control">
															<option value="">Select one</option>
															<option value="active" {{($business->status == 'active') ? 'selected=selected': ''}}>Active</option>
															<option value="inactive" {{($business->status == 'inactive') ? 'selected=selected': ''}}>Inactive</option>
														</select>
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