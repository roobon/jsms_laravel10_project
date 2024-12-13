@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Point Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">point Edit Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>point</span></a></li>
			<li class="active"><span>Edit point</span></li>
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
							<h6 class="panel-title txt-dark">Edit Point Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							@include('backend.layouts.errors')
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form class="form-horizontal" method="post" action="{{route('points.update', $point->id)}}">
											@method('PUT')
											@csrf
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">point Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="point_name" value="{{$point->point_name ?? old('point_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter point Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Starts*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="business_starts" value="{{$point->business_starts ?? old('business_starts') }}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
							
											<div class="form-group">
												<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<textarea type="text" name="point_address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Shop Address" rows="10">{{$point->point_address ?? old('point_address') }}</textarea>
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Person*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_person" value="{{$point->contact_person ?? old('contact_person') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact person">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Number*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_number" value="{{$point->contact_number ?? old('contact_number') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact Number">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_email" value="{{$point->contact_email ?? old('contact_email') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Email address">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Business</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="last_business" value="{{$point->last_business_date ?? old('last_business') }}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Balance</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="last_balance" value="{{$point->last_balance ?? old('last_balance') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Last Balance">
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
															<option value="active" {{($point->status == 'active') ? 'selected=selected': ''}}>Active</option>
															<option value="inactive" {{($point->status == 'inactive') ? 'selected=selected': ''}}>Inactive</option>
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