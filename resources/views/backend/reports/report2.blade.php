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
	Business wise Monthly Report
@endsection

@section('content')
<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					 
					<h5 class="txt-light">Business wise Monthly Report</h5>
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
									<h3 class="text-muted text-center">Jahanara Traders</h3>
									<p class="text-muted text-center">{{$business->business_name}} Business</p>
									
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table table-striped table-bordered">
												<thead>
												  <tr>
													<th rowspan="2">Date</th>
													<th rowspan="2" class="text-center">Total Security Money (Tk.)</th>
													<th colspan="2" class="text-center">Investment</th>
													<th colspan="2" class="text-center">Bank Deposit to SQUARE</th>
													<th colspan="6" class="text-center">Product Received from SQUARE</th>
													<th rowspan="2" class="text-center">Insentive Received (Tk.)</th>
													<th rowspan="2" class="text-center">Delivery Date</th>
													<th rowspan="2" class="text-center">Total Sale (Tk.)</th>
													<th rowspan="2" class="text-center">Deposit to Office (Tk.)</th>
													<th rowspan="2" class="text-center">Due (Tk.)</th>
													<th rowspan="2" class="text-center">Due Realization (Tk.)</th>
													<th rowspan="2" class="text-center">Total Due (Tk.)</th>
													<th rowspan="2" class="text-center">Deposit to HO (Tk.)</th>
												  </tr>
												  <tr>
													<th>Date</th>
													<th>Amount in Tk.</th>
													<th>Date</th>
													<th>Amount in Tk.</th>
													<th>Date</th>
													<th>Invoice No.</th>
													<th>Amount in Tk.</th>
													<th>Slab (Tk.)</th>
													<th>VAT Adjustment</th>
													<th>Market Promotion (Tk.)</th>
												  </tr>
												  <tr>
													<th></th>
													<th>{{$items[0]->security_money}}</th>
													<th>Up to last Month</th>
													<th>{{$items[0]->investment_amount}}</th>
													<th>Up to last Month</th>
													<th>{{$items[0]->bank_deposit_amount}}</th>
													<th>Up to last Month</th>
													<th>N/A</th>
													<th>{{$items[0]->product_received_amount}}</th>
													<th>Will add</th>
													<th>Will add</th>
													<th>Will add</th>
													<th>{{$items[0]->insentive_received_amount}}</th>
													<th>Up to last Month</th>
													<th>{{$items[0]->sales_amount}}</th>
													<th>{{$items[0]->collection_amount}}</th>
													<th>{{$items[0]->due_amount}}</th>
													<th>{{$items[0]->due_realize_amount}}</th>
													<th>{{$items[0]->total_due_amount}}</th>
													<th>{{$items[0]->ho_deposit_amount}}</th>
												  </tr>
												</thead>
												<tbody>
												<tr class="datas">
													<td></td>
													<td></td>
													@if(count($investments)>0 && count($items)>0)
													<td colspan="2" class="align-text-top">
														<table class="table table-bordered mb-0">
															@foreach($investments as $investment)
															<tr><td>{{$investment->investment_date}}</td><td>{{$investment->investment_amount}}</td></tr>
															@endforeach
														</table>
													</td>

													@else 
													<td></td>
													<td></td>
													@endif
													@if(count($payments)>0 && count($items)>0)
													<td colspan="2" class="align-top">
														<table class="table table-bordered mb-0" style="padding: 0; margin:0">
															@foreach($payments as $payment)
															<tr><td>{{$payment->payment_date}}</td><td>{{$payment->payment_amount}}</td></tr>
															@endforeach
														</table>
													</td>

													@else 
													<td></td>
													<td></td>
													@endif
													@if(count($stocks)>0 && count($items)>0)
													<td colspan="3">
														<table class="table table-bordered mb-0" style="padding: 0; margin:0">
															@foreach($stocks as $stock)
															<tr>
																<td>{{$stock->received_date}}</td>
																<td>{{$stock->invoice_number}}</td>
																<td>{{$stock->product_amount}}</td>
															</tr>
															@endforeach
														</table>
													</td>
													@else 
													<td></td>
													<td></td>
													<td></td>
													@endif
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												  </tr>
												 
												  
												</tbody>
												<tfoot>
												@if($items)
												  @foreach($items as $item)
												  <tr class="top-row">
													<td></td>
													<td>{{number_format($item->security_money, 2)}}</td>
													<td>Up to last Month</td>  {{--Investment Start --}}
													<td>{{number_format($item->investment_amount, 2)}}</td> {{--Investment End --}}
													<td>Up to last Month</td>
													<th>{{number_format($item->bank_deposit_amount, 2)}}</th>
													<td>Up to last Month</td>
													<th>N/A</th>
													<th>{{number_format($item->product_received_amount, 2)}}</th>
													<th>Will add</th>
													<th>Will add</th>
													<th>Will add</th>
													<th>{{number_format($item->product_received_amount, 2)}}</th>
													<td>Up to last Month</td>
													<th>{{number_format($item->sales_amount, 2)}}</th>
													<th>{{number_format($item->collection_amount, 2)}}</th>
													<th>{{number_format($item->due_amount, 2)}}</th>
													<th>{{number_format($item->due_realize_amount, 2)}}</th>
													<th>{{number_format($item->total_due_amount, 2)}}</th>
													<th>{{number_format($item->ho_deposit_amount, 2)}}</th>
												  </tr>
												  @endforeach
												  @else
												  <tr>
													<th>No Data Found</th>
												  </tr>
												  @endif
												</tfoot>
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
			$("table td").css({'vertical-align':'top'});
			$("td").css({'padding':'12px'});
			$(".datas td").css({'padding':'0', 'color':'000'});
			$("tbody>tr").css({'background-color':'rgba(107, 154, 182, 0.55)', 'color':'rgb(252, 252, 252)'});
			$("thead>tr").css({'background-color':'rgba(69, 146, 191, 0.55)', 'color':'rgb(252, 252, 252)'});
			$("tfoot>tr").css({'background-color':'rgba(127, 106, 124, 0.55)', 'color':'white'});
		//	$("td").css({'background-color':'rgba(97, 85, 155, 0.27)', 'font-size':'18px', 'color':'blue'});
		});
	</script>
@endsection