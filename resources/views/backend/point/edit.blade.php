@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	JSMS: Center Edit
@endsection

@section('content')
<div class="container-fluid">
				
	<!-- Title -->
	<div class="row heading-bg bg-green">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-light">Center Edit Form</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>centers</span></a></li>
			<li class="active"><span>Edit Center</span></li>
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
							<h6 class="panel-title txt-dark form-title">Edit Center Details</h6>
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
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Center Name*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="text" name="point_name" value="{{$point->point_name ?? old('point_name') }}" class="form-control" id="exampleInputuname_4" placeholder="Enter Center Name">
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail_4" class="col-sm-3 control-label">Center Address*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<textarea type="text" name="point_address" class="form-control" id="exampleInputEmail_4" placeholder="Enter Center Address" rows="10">{{$point->point_address ?? old('point_address') }}</textarea>
														<div class="input-group-addon"></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleInputuname_4" class="col-sm-3 control-label">Opening Date*</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="date" name="opening_date" value="{{$point->opening_date ?? old('opening_date') }}" class="form-control" id="exampleInputuname_4">
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