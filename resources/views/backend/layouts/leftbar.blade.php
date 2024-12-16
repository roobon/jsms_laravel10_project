<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li>
						<a  class="active" href="{{url('/admin/dashboard')}}" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-picture mr-10"></i>Dashboard <span class="pull-right"></a>
						
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#targlist"><i class="icon-eyeglass mr-10"></i>Monthly Targets<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="targlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('target.index')}}">All Targets</a>
							</li>
							<li>
								<a href="{{route('target.create')}}">New Target</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i class="icon-social-dropbox mr-10"></i>Stocks<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="ecom_dr" class="collapse collapse-level-1">
							<li>
								<a href="#">Current Month Stocks</a>
							</li>
							<li>
								<a href="#">Previous Month Stocks</a>
							</li>
								
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#cmplist"><i class="icon-tag mr-10"></i>Companies<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
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
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#rtlist"><i class="icon-eye mr-10"></i>Retailers<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
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
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#saleslist"><i class="icon-rocket mr-10"></i>Sales<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="saleslist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('sales.index')}}">All Sales</a>
							</li>
							<li>
								<a href="{{route('sales.create')}}">New Sale</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#purchalist"><i class="icon-basket-loaded mr-10"></i>Purchases<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="purchalist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('sales.index')}}">All Purchases</a>
							</li>
							<li>
								<a href="{{route('sales.create')}}">New Purchase</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#paymelist"><i class="icon-credit-card mr-10"></i>Payments<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="paymelist" class="collapse collapse-level-1">
							<li>
								<a href="#">All Payments</a>
							</li>
							<li>
								<a href="#">New Payment</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#investlist"><i class="icon-diamond mr-10"></i>Investments<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="investlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('investment.index')}}">All Investments</a>
							</li>
							<li>
								<a href="{{route('investment.create')}}">New Investment</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#insentlist"><i class="icon-present mr-10"></i>Insentives<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="insentlist" class="collapse collapse-level-1">
							<li>
								<a href="#">All Insentives</a>
							</li>
							<li>
								<a href="#">New Insentive</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#dispcenlist"><i class="icon-badge mr-10"></i>Display Centers<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="dispcenlist" class="collapse collapse-level-1">
							<li>
								<a href="#">All Display Centers</a>
							</li>
							<li>
								<a href="#">New Display Center</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#slablist"><i class="icon-bulb mr-10"></i>Slabs<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="slablist" class="collapse collapse-level-1">
							<li>
								<a href="#">All Slabs</a>
							</li>
							<li>
								<a href="#">New Slab</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#explist"><i class="icon-cloud-download mr-10"></i>Expired Products<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="explist" class="collapse collapse-level-1">
							<li>
								<a href="#">Expired/Replaced Items</a>
							</li>
							<li>
								<a href="#">New Expired Item</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#claimlist"><i class="icon-paper-clip mr-10"></i>Claimed Products<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="claimlist" class="collapse collapse-level-1">
							<li>
								<a href="#">Claimed Items</a>
							</li>
							<li>
								<a href="#">New Claim Item</a>
							</li>	
						</ul>
					</li>
					
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#reptlist"><i class="icon-notebook mr-10"></i>Reports<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="reptlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('companywise.index')}}">Company wise Monthly Report</a>
							</li>
							<li>
								<a href="#">Retailer wise Monthly Report</a>
							</li>	
						</ul>
					</li>				
					
				</ul>
			</div>