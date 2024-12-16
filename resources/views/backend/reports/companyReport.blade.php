@extends('backend.layouts.app')

@section('styles')
	@parent
	<style>
		.report-caption {
			font-size: 30px;
		}
		.report-header {
			border: 1px solid blue;
			padding:20px;
			background-color: aqua
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
					 
					<h5 class="txt-light">Employee List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Employees</span></a></li>
						<li class="active"><span>Employee list</span></li>
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
								<div class="pull-right"><a href="{{route('employee.create')}}" class="btn btn-success">New Employee</a></div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<caption class="report-header">
													<div class="report-caption">Companywise Report</div>
													<span class="report-title">Company Name: SQUARE <br>
														Duration: 1-12-2024 to 31-12-2024
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
														<th>Ledger View</th>
														
													</tr>
												</thead>
												<tfoot>
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
														<th>Ledger View</th>
														
													</tr>
												</tfoot>
												<tbody>
													@foreach($items as $item) 
                                                    	<tr>
														<td>{{$loop->iteration}}</td>
														<td>{{$item->point_name}}</td>
														<td>{{$item->ims_target}}</td>
														<td>{{$item->collection_target}}</td>
														<td>{{$item->sales_amount}}</td>
														<td>{{$item->collection_amount}}</td>
														<td>{{$item->deposit_amount}}</td>
														<td>{{$item->collection_target - $item->deposit_amount}}</td>
														<td>{{$item->startMonthdue}}</td>
														<td>{{$item->endMonthdue}}</td>
														<td>{{$item->GodownStock}}</td>
														<td>{{$item->ledgerView}}</td>
														
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
@endsection