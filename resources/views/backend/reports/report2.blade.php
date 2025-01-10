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
									<p class="text-muted">Create style tables by wrapping any table with class <code>table  table-striped table-bordered</code> in <code>color-bg-table</code> class.</p>
									
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table table-striped table-bordered mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Total Security Money (Tk)</th>
													<th>Last Name</th>
													<th>Username</th>
													<th>Role</th>
												  </tr>
												</thead>
												<tbody>
												  <tr>
													<td>1</td>
													<td>Jens</td>
													<td>Brincker</td>
													<td>Brincker123</td>
													<td><span class="label label-danger">admin</span> </td>
												  </tr>
												  <tr>
													<td>2</td>
													<td>Mark</td>
													<td>Hay</td>
													<td>Hay123</td>
													<td><span class="label label-info">member</span> </td>
												  </tr>
												  <tr>
													<td>3</td>
													<td>Anthony</td>
													<td>Davie</td>
													<td>Davie123</td>
													<td><span class="label label-warning">developer</span> </td>
												  </tr>
												  <tr>
													<td>4</td>
													<td>David</td>
													<td>Perry</td>
													<td>Perry123</td>
													<td><span class="label label-success">supporter</span> </td>
												  </tr>
												  <tr>
													<td>5</td>
													<td>Anthony</td>
													<td>Davie</td>
													<td>Davie123</td>
													<td><span class="label label-info">member</span> </td>
												  </tr>
												  <tr>
													<td>6</td>
													<td>Alan</td>
													<td>Gilchrist</td>
													<td>Gilchrist123</td>
													<td><span class="label label-success">supporter</span> </td>
												  </tr>
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
		//$(document).ready(function () {
		//	$("td").css({'background-color':'rgba(97, 85, 155, 0.27)', 'font-size':'18px', 'color':'blue'});
		//});
	</script>
@endsection