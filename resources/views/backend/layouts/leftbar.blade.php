<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li>
						<a  class="active" href="{{url('/admin/dashboard')}}" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-picture mr-10"></i>Dashboard <span class="pull-right"></a>
						
					</li>
					{{-- <li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i class="icon-basket-loaded mr-10"></i>Specialist<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="ecom_dr" class="collapse collapse-level-1">
							<li>
								<a href="{{route('specialist.index')}}">All Specialists</a>
							</li>
							<li>
								<a href="{{route('specialist.create')}}">New Specialist</a>
							</li>	
						</ul>
					</li> --}}
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#cmplist"><i class="icon-home mr-10"></i>Companies<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="cmplist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('company.index')}}">All Company</a>
							</li>
							<li>
								<a href="{{route('company.create')}}">New Company</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#rtlist"><i class="icon-basket-loaded mr-10"></i>Retailers<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="rtlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('retailer.index')}}">All Retailers</a>
							</li>
							<li>
								<a href="{{route('retailer.create')}}">New Retailer</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#pointlist"><i class="icon-flag mr-10"></i>Points<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="pointlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('points.index')}}">All Points</a>
							</li>
							<li>
								<a href="{{route('points.create')}}">New Point</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#saleslist"><i class="icon-rocket mr-10"></i>Sales<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="saleslist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('retailer.index')}}">All Sales</a>
							</li>
							<li>
								<a href="{{route('retailer.create')}}">New Sale</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#emplist"><i class="icon-people mr-10"></i>Employees<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="emplist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('employee.index')}}">All Employees</a>
							</li>
							<li>
								<a href="{{route('employee.create')}}">New Employee</a>
							</li>	
						</ul>
					</li>
					
				</ul>
			</div>