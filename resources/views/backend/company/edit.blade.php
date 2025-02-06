@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Company Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">Company Entry Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
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
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Edit Company Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							@include('backend.layouts.errors')
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form class="form-horizontal" method="post" action="{{route('company.update', $company->id)}}" enctype="multipart/form-data">
											@method('PUT')
											@csrf
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="company_name" value="{{$company->company_name ?? old('company_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Comopany Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Address" rows="10">{{$company->company_address ?? old('address') }}</textarea>
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Person*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_person" value="{{$company->contact_person ?? old('contact_person') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact person">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Number*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_number" value="{{$company->contact_number ?? old('contact_number') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact Number">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_email" value="{{$company->contact_email ?? old('contact_email') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Email address">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Website</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="website" value="{{$company->website ?? old('website') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Web address">
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
													<img src="{{$company->photo? asset($company->photo):''}}" alt="" width="300">
												</div>
												
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Status</label>
												<div class="col-sm-9">
													<div class="input-group">
														<select name="status" id="" class="form-control">
															<option value="">Select one</option>
															<option value="active" {{($company->status == 'active') ? 'selected=selected': ''}}>Active</option>
															<option value="inactive" {{($company->status == 'inactive') ? 'selected=selected': ''}}>Inactive</option>
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