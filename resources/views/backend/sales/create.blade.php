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
	Sale Entry
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-green">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-light">Selling Entry Form</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Sells</span></a></li>
						<li class="active"><span>New sell</span></li>
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
										<h6 class="panel-title txt-dark">Enter Sell Details</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										@include('backend.layouts.errors')
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="{{route('sales.store')}}">
														@csrf
                                                        <div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Retailer Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="retailer" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($retailers as $retailer)
																		<option value="{{$retailer->id}}">{{$retailer->shop_name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div id="retailerData" class="form-group">
															
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Vourcher Number*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="voucher" value="{{old('voucher')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Voucher Number">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Total Amount*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="total_amount" value="{{old('total_amount')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Total Amount">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Collection Amount*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="text" name="collection_amount" value="{{old('collection_amount')}}" class="form-control" id="exampleInputuname_4" placeholder="Enter Collection Amount">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Employee Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<select name="employee" class="form-control" id="retailerId">
																		<option value="">Select one</option>
																		@foreach($employees as $employee)
																		<option value="{{$employee->id}}">{{$employee->name}}</option>
																		@endforeach
																	</select>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Point Name*</label>
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
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Company Name*</label>
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
															<label for="exampleInputEmail_4" class="col-sm-3 control-label">Note</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<textarea type="text" name="note" class="form-control" id="exampleInputEmail_4" placeholder="Enter any message" rows="10">{{old('note')}}</textarea>
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="exampleInputuname_4" class="col-sm-3 control-label">Sales Date*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<input type="date" name="sales_date" value="{{old('sales_date')}}" class="form-control" id="exampleInputuname_4">
																	<div class="input-group-addon"></div>
																</div>
															</div>
														</div>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" id="btnSub" class="btn btn-info ">SUBMIT</button>
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
	<script>
		$(document).ready(function () {
			$('#retailerId').on('change', function(){
				let id =$('#retailerId').val();
				let receivedData ='';
				$.ajax({
					type: "GET",
					url: "/info",
					data: {
						"_token":"{{ csrf_token() }}",
						id:id	
					},
					success: function (response) {
						//alert(response.retailer);
						console.log(response.retailer);
						receivedData = response.retailer;
						$('#retailerData').html(detailInfo());
						if(receivedData.status == 'inactive') {
							$('#btnSub').attr('disabled','disabled');
						} else {
							$('#btnSub').removeAttr("disabled");
						}
					},
					error: function (response){
						alert("Failed to run");
					}
				});

				function detailInfo(){
					let content= '';
					content += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="panel panel-info card-view"><div class="panel-heading">';

					content += '<h6 class="panel-title txt-dark">Retailer Information</h6></div>';
					content += '<div  class="panel-wrapper collapse in"><div  class="panel-body">';
					content += '<div class="table-wrap mt-40">';
					content +=	'<div class="table-responsive">'
					content +=	'<table class="table table-striped table-bordered mb-0">'
					content +=	'<thead><tr><td colspan="2"><h4>' + receivedData.shop_name +  '</h4></td>';	
					content +=	'</tr></thead><tbody>';
					content +=	'<tr><td> Proprietor Name</td><td>' + receivedData.shop_name +  '</td></tr>';
					content +=	'<tr><td> Market Name</td><td>' + receivedData.market_name +  '</td></tr>';
					content +=	'<tr><td> Shop Address</td><td>' + receivedData.shop_address +  '</td></tr>';
					content +=	'<tr><td> Current Due</td><td>' + receivedData.current_due +  '</td></tr>';
					content +=	'<tr><td> Responsible Employee</td><td>' + receivedData.name +  '</td></tr>';
					content +=	'<tr><td> Center</td><td>' + receivedData.shop_name +  '</td></tr>';
					content +=	'<tr><td> Status</td><td><h5>' + receivedData.status + '</h5></td></tr>';
					content +=  '</tbody></table></div></div>';
					content += '</div></div></div></div>';
						
								return content;
				}
				/*
									
																	
																			
																		

				*/
			})
		});
	</script>
@endsection