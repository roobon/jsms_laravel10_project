@extends('backend.layouts.app')

@section('styles')
	<!-- vector map CSS -->
    <link href="{{asset('vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" type="text/css"/>
		
    <!-- Footable CSS -->
    <link href="{{asset('vendors/bower_components/jsgrid/dist/jsgrid.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('vendors/bower_components/jsgrid/dist/jsgrid-theme.min.css')}}" rel="stylesheet" type="text/css"/>
    @parent
@endsection

@section('title')
	JSMS: Employee List
@endsection

@section('content')

      
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-green">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h5 class="txt-light">jsgrid table</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                  <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>table</span></a></li>
                    <li class="active"><span>jsgrid table</span></li>
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
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">jsgrid Table</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div id="jsgrid_1"></div>
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
    <!-- Bootstrap Core JavaScript -->
		<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		
		<!-- JSgrid table JavaScript -->
		<script src="{{asset('dist/js/db.js')}}"></script>
		<script src="{{asset('vendors/bower_components/jsgrid/dist/jsgrid.min.js')}}"></script>
		<script src="{{asset('dist/js/jsgrid-data.js')}}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
@endsection

	
		
		
		