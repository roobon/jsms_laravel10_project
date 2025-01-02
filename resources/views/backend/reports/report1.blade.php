@extends('backend.layouts.app')

@section('styles')
	@parent
	<style>
		.report-caption {
			font-size: 30px;
		}
		.report-header {
			border: 1px solid rgb(13, 0, 255);
			padding:15px;
			background-color: rgba(26, 8, 87, 0.551);
			color: white;
		}
	</style>
@endsection

@section('title')
	Company wise Monthly Report
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					 
					<h5 class="txt-light">Companywise Monthly Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
						<li><a href="/admin/report"><span>Reports</span></a></li>
						<li class="active"><span>Comopanywise</span></li>
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
									{{-- <h6 class="panel-title txt-dark">Employee List</h6> --}}
								</div>
								
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<caption class="report-header">
													<div class="report-caption">Companywise Summary Report</div>
													<span class="report-title">Company Name: {{$company->company_name}} <br>
														
													Report Duration: 01-01-2025 to 31-01-2025
													</span>
												</caption>
												<thead>
													<tr>
                                                        <th>ID</th>
														<th>Center</th>
														<th>IMS Target</th>
														<th>Collection Target</th>
														<th>Sales upto</th>
														<th>Collection</th>
														<th>Deposit to Bank</th>
														<th>Depost VS Collection</th>
														<th>Due Begning Month</th>
														<th>Due Endof Month</th>
														<th>Godown Stock</th>
														<th>Ledger Due</th>
														
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Center</th>
														<th>IMS Target (100%)</th>
														<th>Collection Target (95%)</th>
														<th>Sales upto</th>
														<th>Collection</th>
														<th>Deposit to Bank</th>
														<th>Depost VS Collection</th>
														<th>Due Begning Month</th>
														<th>Due Endof Month</th>
														<th>Godown Stock</th>
														<th>Ledger View</th>
														
													</tr>
												</tfoot>
												<tbody>
													@foreach($items as $item) 
                                                    	<tr>
														<td>{{$loop->iteration}}</td>
														<td>{{$item->point_name}}</td>
														<td>{{number_format($item->ims_target, 0)}}</td>
														<td>
															{{
															
															number_format($item->ims_target * $item->collection_target/100, 0)
														}}
														</td>
														<td>{{$item->sales_amount}}</td>
														<td>{{$item->collection_amount}}</td>
														<td>{{$item->deposit_amount}}</td>
														<td>
															{{
																$item->ims_target *									($item->collection_target /100) - $item->deposit_amount
															}}
														
														</td>
														<td>{{$item->startMonthdue}}</td>
														<td>{{$item->endMonthdue}}</td>
														<td>{{$item->godownstock}}</td>
														<td>{{$item->ledgerDue}}</td>
														
													</tr>
													@endforeach
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
	<script>
		$(document).ready(function () {
			$("td").css({'background-color':'rgba(97, 85, 155, 0.27)', 'font-size':'18px', 'color':'blue'});
		});
	</script>
@endsection