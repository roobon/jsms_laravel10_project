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
						<li><a href="#"><span>Reports</span></a></li>
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
										<div class="table-bordered">
											<table id="example" class="table table-hover display  pb-30" >
												<caption class="report-header">
													<div class="report-caption">স্কয়ার টয়লেট্রিজ</div>
													<div>চলমান প্রতিবেদন</div>
													<span class="report-title"><br>
														তাং -- হতে -- তারিখ পর্যন্ত  
													</span>
												</caption>
												<thead>
													<tr>
                                                        <th>ক্রমিক নং</th>
														<th>সেন্টার</th>
														<th class="colwidth">আই এমএস টার্গেট</th>
														<th class="colwidth">কালেকশন টার্গেট (৯৫%)</th>
														<th class="colwidth">প্রতিদিনের বিক্রয় টার্গেট</th>
														<th>এ পর্যন্ত বিক্রি</th>
														<th>কালেকশন</th>
														<th>স্কয়ার কোডে ব্যাংকে জমা</th>
														<th>পার্থক্য (কালেকশন টার্গেট বনাম ব্যাংকে জমা)</th>
														<th>বাকীর পরিমাণ মাসের শুরুতে ()</th>
														<th>বাকীর পরিমাণ মাসের শেষে ()</th>
														<th>গোডাউন স্টক</th>
														<th>লেজার ডিউ</th>
														
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Center</th>
														<th>IMS Target</th>
														<th>Collection Target (95%)</th>
														<th>Everyday Selling Target</th>
														<th>Sales upto</th>
														<th>Collection</th>
														<th>Deposit to Bank</th>
														<th>Depost VS Collection</th>
														<th>Due Begning Month</th>
														<th>Due Endof Month</th>
														<th>Godown Stock</th>
														<th>Ledger Due</th>
														
													</tr>
												</tfoot>
												<tbody>
													@foreach($items as $item) 
                                                    	<tr>
														<td>{{$loop->iteration}}</td>
														<td>{{$item->point_name}}</td>
														<td>{{number_format($item->ims_target, 0)}}</td>
														<td>{{number_format($item->ims_target * $item->collection_target/100, 0)}}</td>
														<td>{{number_format($item->ims_target / $item->working_days, 0)}}</td>
														<td>{{number_format($item->sales_amount, 0)}}</td>
														<td>{{number_format($item->collection_amount,0)}}</td>
														<td>{{number_format($item->deposit_amount, 0)}}</td>
														<td>{{number_format($item->collection_target - $item->deposit_amount, 0)}}</td>
														<td>{{$item->startMonthdue}}</td>
														<td>{{$item->startMonthdue - $item->sales_amount }}</td>
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
			
			$(".sorting").css({"background-color": "#ccc", "font-size": "130%", "width": "10px", "height": "100px"});
			$(".sorting_asc").css({"background-color": "#eed", "font-size": "130%", "width": "10px"});
			$("td").css({"background-color": "#fff", "font-size": "130%", "width": "10px"});
			
			
		});
	</script>

	<script>
		
	$(document).ready(function () {
		$("tr.odd").css({'background-color':'rgba(31, 53, 9, 0.27)', 'font-size':'18px', 'color':'rgb(12, 72, 187)'});
		$("tr.even").css({'background-color':'rgba(31, 35, 9, 0.27)', 'font-size':'18px', 'color':'rgb(12, 72, 187)'});
	});

	</script>
@endsection