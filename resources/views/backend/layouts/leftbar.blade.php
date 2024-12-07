<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li>
						<a  class="active" href="{{url('/admin/dashboard')}}" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-picture mr-10"></i>Dashboard <span class="pull-right"></a>
						
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i class="icon-basket-loaded mr-10"></i>Specialist<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="ecom_dr" class="collapse collapse-level-1">
							<li>
								<a href="{{route('specialist.index')}}">All Specialists</a>
							</li>
							<li>
								<a href="{{route('specialist.create')}}">New Specialist</a>
							</li>	
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#cmplist"><i class="icon-basket-loaded mr-10"></i>Companies<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
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
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#drlist"><i class="icon-basket-loaded mr-10"></i>Doctors<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
						<ul id="drlist" class="collapse collapse-level-1">
							<li>
								<a href="{{route('doctor.index')}}">All Doctors</a>
							</li>
							<li>
								<a href="{{route('doctor.create')}}">New Doctor</a>
							</li>	
						</ul>
					</li>
					
				</ul>
			</div>