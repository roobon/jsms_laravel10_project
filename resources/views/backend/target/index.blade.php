@extends('backend.layouts.app')

@section('styles')
	@parent
@endsection

@section('title')
	JSMS: Target List
@endsection

@section('content')
<div class="container-fluid">
@inject('carbon', 'Carbon\Carbon')				
				<!-- Title -->
				<div class="row heading-bg bg-blue">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					 
					<h5 class="txt-light">Monthly Target List from all Centers</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Targets</span></a></li>
						<li class="active"><span>Target list</span></li>
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
								</div>
								<div class="pull-right"><a href="{{route('target.create')}}" class="btn btn-primary">New Target</a></div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                                        <th>ID</th>
														<th>Center</th>
														<th>Company Name</th>
														<th>Target Month</th>
														<th>IMS Target</th>
														<th>Collection Target</th>
														<th style="width: 10%;" class="text-center">Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Center</th>
														<th>Company Name</th>
														<th>Target Month</th>
														<th>IMS Target</th>
														<th>Collection Target</th>
														<th style="width: 10%;" class="text-center">Action</th>
													</tr>
												</tfoot>
												<tbody>
													@foreach($items as $item)
													
                                                    <tr>
														<td>{{$loop->iteration}}</td>
														<td>{{$item->point->point_name}}</td>
														<td>{{$item->company->company_name}}</td>
														<td>{{$carbon::parse($item->start_date)->format('M-Y')}}</td>
														<td>Tk {{number_format($item->ims_target, 2)}}</td>
														<td>Tk {{number_format($item->ims_target * $item->collection_target /100, 2)}} ({{$item->collection_target}}%)</td>
														<td style="width: 15%;" class="text-center">
														<form onSubmit="return confirm('Are you sure to Delete')" action="{{route('target.destroy', $item->id)}}" method="post">
														<a class="btn btn-default btn-icon-anim btn-circle" href="{{route('target.show', $item->id)}}"><i class="glyphicon glyphicon-search"></i></a>	
														<a href="{{route('target.edit', $item->id)}}" class="btn btn-primary btn-icon-anim btn-circle"><i class="glyphicon glyphicon-edit"></i></a>
														@csrf
														@method('DELETE')
														<button class="btn btn-danger btn-icon-anim btn-circle"  type="submit" name="submit"><i class="glyphicon glyphicon-trash"></i></button>
														</form>
														</td>	
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