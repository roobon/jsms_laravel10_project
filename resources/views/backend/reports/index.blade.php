@extends('backend.layouts.app')
	
@section('styles')
	<!-- Bootstrap Treeview -->
	<link href="{{asset('vendors/bower_components/bootstrap-treeview/dist/bootstrap-treeview.min.css')}}" rel="stylesheet" type="text/css">
	@parent

@endsection

@section('title')
	Retailer Entry
@endsection


		
		<div class="wrapper">
			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
				<a href="index.html"><img class="brand-img pull-left" src="dist/img/logo.png" alt="brand"/></a>
				<ul class="nav navbar-right top-nav pull-right">
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#site_navbar_search">
						<i class="fa fa-search top-nav-icon"></i>
						</a>
					</li>
					<li>
						<a id="open_right_sidebar" href="javascript:void(0);"><i class="fa fa-cog top-nav-icon"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th top-nav-icon"></i></a>
						<ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li>
								<ul class="app-icon-wrap">
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-umbrella txt-info"></i>
										<span class="block">weather</span>
										</a>
									</li>
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-mail-open-file txt-success"></i>
										<span class="block">e-mail</span>
										</a>
									</li>
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-date txt-primary"></i>
										<span class="block">calendar</span>
										</a>
									</li>
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-map txt-danger"></i>
										<span class="block">map</span>
										</a>
									</li>
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-comment txt-warning"></i>
										<span class="block">chat</span>
										</a>
									</li>
									<li>
										<a href="#" class="connection-item">
										<i class="pe-7s-notebook"></i>
										<span class="block">contact</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="divider"></li>
							<li class="text-center"><a href="#">More</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li>
								<div class="streamline message-box message-nicescroll-bar">
									<div class="sl-item">
										<div class="sl-avatar avatar avatar-sm avatar-circle">
											<img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
										</div>
										<div class="sl-content">
											<a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">Sandy Doe</a>
											<span class="inline-block font-12  pull-right">12/10/16</span>
											<div class="clearfix"></div>
											<p>Neque porro quisquam est!</p>
										</div>
									</div>
									<hr/>
									<div class="sl-item">
										<div class="icon">
											<i class="fa fa-spotify"></i>
										</div>
										<div class="sl-content">
											<a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">
											2 voice mails</a>
											<span class="inline-block font-12  pull-right">2pm</span>
											<div class="clearfix"></div>
											<p>Neque porro quisquam est</p>
										</div>
									</div>
									<hr/>
									<div class="sl-item">
										<div class="icon">
											<i class="fa fa-whatsapp"></i>
										</div>
										<div class="sl-content">
											<a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">8 voice messanger</a>
											<span class="inline-block font-12 pull-right">1pm</span>
											<div class="clearfix"></div>
											<p>8 texts</p>
										</div>
									</div>
									<hr/>
									<div class="sl-item">
										<div class="icon">
											<i class="fa fa-envelope"></i>
										</div>
										<div class="sl-content">
											<a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">2 new messages</a>
											<span class="inline-block font-12  pull-right">1pm</span>
											<div class="clearfix"></div>
											<p>ashjs@gmail.com</p>
										</div>
									</div>
									<hr/>
									<div class="sl-item">
										<div class="sl-avatar avatar avatar-sm avatar-circle">
											<img class="img-responsive img-circle" src="dist/img/user4.png" alt="avatar"/>
										</div>
										<div class="sl-content">
											<a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">Sandy Doe</a>
											<span class="inline-block font-12  pull-right">1pm</span>
											<div class="clearfix"></div>
											<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li>
								<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-credit-card-alt"></i> my balance</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="collapse navbar-search-overlap" id="site_navbar_search">
					<form role="search">
						<div class="form-group mb-0">
							<div class="input-search">
								<div class="input-group">	
									<input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30" placeholder="Search">
									<span class="input-group-addon pr-30">
									<a  href="javascript:void(0)" class="close-input-overlay" data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
									</span> 
								</div>
							</div>
						</div>
					</form>
				</div>
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			
			<!-- /Left Sidebar Menu -->
			
			<!-- Right Sidebar Menu -->
		
			<!-- /Right Sidebar Menu -->
			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg bg-yellow">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-light">bootstrap-treeview</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="#"><span>ui-elements</span></a></li>
							<li class="active"><span>bootstrap-treeview</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Default</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="treeview" id="treeview1"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
						   <div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">collapsed</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="treeview" id="treeview2"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">expanded</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="treeview" id="treeview3"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">JSON</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="treeview" id="treeview4"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>
				
				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30"> 
					<div class="row">
						<div class="col-sm-5">
							<a href="index.html" class="brand mr-30"><img src="dist/img/logo-sm.png" alt="logo"/></a>
							<ul class="footer-link nav navbar-nav">
								<li class="logo-footer"><a href="#">help</a></li>
								<li class="logo-footer"><a href="#">terms</a></li>
								<li class="logo-footer"><a href="#">privacy</a></li>
							</ul>
						</div>
						<div class="col-sm-7 text-right">
							<p>2016 &copy; Kenny. Pampered by Hencework</p>
						</div>	
					</div>	
				</footer>
				<!-- /Footer -->
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		
		<!-- Treeview JavaScript -->
		<script src="{{asset('vendors/bower_components/bootstrap-treeview/dist/bootstrap-treeview.min.js')}}"></script>
		
		<!-- Treeview Init JavaScript -->
		<script src="{{asset('dist/js/treeview-data.js')}}"></script>
		<!-- Slimscroll JavaScript -->
		<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
		<!-- Init JavaScript -->
		<script src="{{asset('dist/js/init.js')}}"></script>
		
