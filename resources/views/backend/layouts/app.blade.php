<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<meta name="description" content="Kenny is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Kenny Admin, kennyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	@section('styles')
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<!-- Data table CSS -->
	<link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
	@show
	<title>@yield('title')</title>
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper">
			<!-- Top Menu Items -->
			 @if(Auth()->guard('admin')->check())
			 	@include('backend.layouts.topmenu')
			 @elseif(Auth()->guard('doctor')->check())	
			 	@include('backend.layouts.doctor_topmenu')
			 @endif	
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			@if(Auth()->guard('admin')->check())
			 	@include('backend.layouts.leftbar')
			 @elseif(Auth()->guard('doctor')->check())	
			 	@include('backend.layouts.doctor_leftbar')
			 @endif

		
			<!-- /Left Sidebar Menu -->
			
			<!-- Right Sidebar Menu -->
			@include('backend.layouts.rightbar')
			<!-- /Right Sidebar Menu -->

        <!-- Main Content -->
		<div class="page-wrapper">
            @yield('content')
			<!-- Footer -->
			@include('backend.layouts.footer')
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    @section('scripts')
	<!-- jQuery -->
    <script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
	<!-- Data table JavaScript -->
	<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/pdfmake/build/pdfmake.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/pdfmake/build/vfs_fonts.js')}}"></script>
	
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('dist/js/export-table-data.js')}}"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
	<!-- Init JavaScript -->
	<script src="{{asset('dist/js/init.js')}}"></script>
	@show
</body>
</html>
