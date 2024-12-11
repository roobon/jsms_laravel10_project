@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	Retailer Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">Retailer Edit Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>retailer</span></a></li>
			<li class="active"><span>Edit Retailer</span></li>
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
							<h6 class="panel-title txt-dark">Edit Retailer Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							@include('backend.layouts.errors')
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form class="form-horizontal" method="post" action="{{route('retailer.update', $retailer->id)}}">
											@method('PUT')
											@csrf
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Retailer Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="shop_name" value="{{$retailer->shop_name ?? old('shop_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter retailer Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Proprieter Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="proprietor_name" value="{{$retailer->proprietor_name ?? old('proprietor_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Proprietor Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Trade Lisence</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="trade_lisence" value="{{$retailer->trade_lisence ?? old('trade_lisence') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Trade Lisence Number">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Business Starts*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="business_starts" value="{{$retailer->business_starts ?? old('business_starts') }}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
							
											<div class="form-group">
												<label for="exampleInputEmail_4" class="col-sm-3 control-label">Address*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<textarea type="text" name="address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Shop Address" rows="10">{{$retailer->shop_address ?? old('address') }}</textarea>
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Person*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_person" value="{{$retailer->contact_person ?? old('contact_person') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact person">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Contact Number*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_number" value="{{$retailer->contact_number ?? old('contact_number') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Contact Number">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="contact_email" value="{{$retailer->contact_email ?? old('contact_email') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Email address">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Business</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="last_business" value="{{$retailer->last_business ?? old('last_business') }}" class="form-control" id="exampleInputuname_4">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Last Balance</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="last_balance" value="{{$retailer->last_balance ?? old('last_balance') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Last Balance">
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
															<option value="active" {{($retailer->status == 'active') ? 'selected=selected': ''}}>Active</option>
															<option value="inactive" {{($retailer->status == 'inactive') ? 'selected=selected': ''}}>Inactive</option>
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