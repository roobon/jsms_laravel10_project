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
    Damage Amount Entry
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg bg-green">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-light">Damage Entry Form</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('damage.index') }}"><span>Damages</span></a></li>
                    <li class="active"><span>New Damage</span></li>
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
                        @include('backend.layouts.error')
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Enter Damage Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            @include('backend.layouts.errors')
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form class="form-horizontal" method="post" action="{{ route('damage.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Factory
                                                    Name*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="factory_name"
                                                            value="{{ old('factory_name') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Factory Name">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Chalan
                                                    Date*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="date" name="chalan_date"
                                                            value="{{ old('chalan_date') }}" class="form-control"
                                                            id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Claim
                                                    Type*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="claim_type" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            <option value="replacement">Replacement</option>
                                                            <option value="outofpolicy">Out of Policy</option>
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Claim
                                                    Amount*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="claim_amount"
                                                            value="{{ old('claim_amount') }}" class="form-control"
                                                            id="exampleInputuname_4" placeholder="Enter Claim Amount">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Voucher
                                                    Photo
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="file" name="photo" value="{{ old('photo') }}"
                                                            class="form-control" id="exampleInputuname_4">
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">From
                                                    Business
                                                    *</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="business" class="form-control">
                                                            <option value="">Select one</option>
                                                            @foreach ($businesses as $business)
                                                                <option value="{{ $business->id }}">
                                                                    {{ $business->business_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4" class="col-sm-3 control-label">Claim
                                                    Company*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="company" class="form-control">
                                                            <option value="">Select one</option>
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}">
                                                                    {{ $company->company_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputuname_4"
                                                    class="col-sm-3 control-label">Manager*</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <select name="manager" class="form-control" id="retailerId">
                                                            <option value="">Select one</option>
                                                            @foreach ($managers as $manager)
                                                                <option value="{{ $manager->id }}"
                                                                    {{ old('manager') ? 'selected=selected' : '' }}>
                                                                    {{ $manager->name }}
                                                                    {{ $manager->point->point_name ? ', ' . $manager->point->point_name : '' }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-addon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" id="btnSub"
                                                        class="btn btn-info ">SUBMIT</button>
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
        // $(document).ready(function () {
        // 	$('#retailerId').on('change', function(){
        // 		let id =$('#retailerId').val();
        // 		let receivedData ='';
        // 		$.ajax({
        // 			type: "GET",
        // 			url: "/info",
        // 			data: {
        // 				"_token":"{{ csrf_token() }}",
        // 				id:id	
        // 			},
        // 			success: function (response) {
        // 				//alert(response.retailer);
        // 				console.log(response.retailer);
        // 				receivedData = response.retailer;
        // 				$('#retailerData').html(detailInfo());
        // 				if(receivedData.status == 'inactive') {
        // 					$('#btnSub').attr('disabled','disabled');
        // 				} else {
        // 					$('#btnSub').removeAttr("disabled");
        // 				}
        // 			},
        // 			error: function (response){
        // 				alert("Failed to run");
        // 			}
        // 		});

        // 		function detailInfo(){
        // 			let content= '';
        // 			content += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="panel panel-info card-view"><div class="panel-heading">';

        // 			content += '<h6 class="panel-title txt-dark">Retailer Information</h6></div>';
        // 			content += '<div  class="panel-wrapper collapse in"><div  class="panel-body">';
        // 			content += '<div class="table-wrap mt-40">';
        // 			content +=	'<div class="table-responsive">'
        // 			content +=	'<table class="table table-striped table-bordered mb-0">'
        // 			content +=	'<thead><tr><td colspan="2"><h4>' + receivedData.shop_name +  '</h4></td>';	
        // 			content +=	'</tr></thead><tbody>';
        // 			content +=	'<tr><td> Proprietor Name</td><td>' + receivedData.shop_name +  '</td></tr>';
        // 			content +=	'<tr><td> Market Name</td><td>' + receivedData.market_name +  '</td></tr>';
        // 			content +=	'<tr><td> Shop Address</td><td>' + receivedData.shop_address +  '</td></tr>';
        // 			content +=	'<tr><td> Current Due</td><td>' + receivedData.current_due +  '</td></tr>';
        // 			content +=	'<tr><td> Responsible Employee</td><td>' + receivedData.name +  '</td></tr>';
        // 			content +=	'<tr><td> Center</td><td>' + receivedData.shop_name +  '</td></tr>';
        // 			content +=	'<tr><td> Status</td><td><h5>' + receivedData.status + '</h5></td></tr>';
        // 			content +=  '</tbody></table></div></div>';
        // 			content += '</div></div></div></div>';

        // 						return content;
        // 		}
        // 		/*





        // 		*/
        // 	})
        // });
    </script>
@endsection
