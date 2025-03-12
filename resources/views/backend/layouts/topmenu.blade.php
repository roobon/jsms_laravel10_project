<nav class="navbar navbar-inverse navbar-fixed-top">
    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left" href="javascript:void();"><i
            class="fa fa-bars"></i></a>
    <a href="{{ url('/admin/dashboard') }}"><img class="brand-img pull-left" src="{{ asset('dist/img/JT_logo1.png') }}"
            alt="JSMS" /></a>
    <ul class="nav navbar-right top-nav pull-right">
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#site_navbar_search">
                <i class="fa fa-search top-nav-icon"></i>
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                    class="fa fa-yoast top-nav-icon"></i></a>
            <ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home mr-10"></i> All
                        Company</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-note mr-10"></i>New
                        Company</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home mr-10"></i> All
                        Center</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-note mr-10"></i>New
                        Center</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-modx top-nav-icon"></i></a>
            <ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home mr-10"></i> All
                        Company</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-note mr-10"></i>New
                        Company</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home mr-10"></i> All
                        Center</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-note mr-10"></i>New
                        Center</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th top-nav-icon"></i></a>
            <ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <li>
                    <ul class="app-icon-wrap">
                        <li>
                            <a href="{{ route('company.index') }}" class="connection-item">
                                <i class="pe-7s-airplay txt-info"></i>
                                <span class="block">Companies</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('points.index') }}" class="connection-item">
                                <i class="pe-7s-culture txt-primary"></i>
                                <span class="block">Centers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee.index') }}" class="connection-item">
                                <i class="pe-7s-users txt-danger"></i>
                                <span class="block">Employees</span>
                            </a>
                        </li>
                        <li>
                            <ul class="app-icon-wrap">
                                <li>
                                    <a href="{{ route('retailer.index') }}" class="connection-item">
                                        <i class="pe-7s-map-marker txt-info"></i>
                                        <span class="block">Retailers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('business.index') }}" class="connection-item">
                                        <i class="pe-7s-network txt-info"></i>
                                        <span class="block">Businesses</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>
                <li class="text-center">
                    <ul class="app-icon-wrap">
                        <li>
                            <a href="{{ route('target.index') }}" class="connection-item">
                                <i class="pe-7s-target txt-danger"></i>
                                <span class="block">Targets</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="divider"></li>
                <li class="text-center">
                    <ul class="app-icon-wrap">
                        <li>
                            <a href="{{ route('investment.index') }}" class="connection-item">
                                <i class="pe-7s-helm txt-primary"></i>
                                <span class="block">Investments</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('payment.index') }}" class="connection-item">
                                <i class="pe-7s-cash txt-info"></i>
                                <span class="block">Deposits</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('stock.index') }}" class="connection-item">
                                <i class="pe-7s-keypad txt-info"></i>
                                <span class="block">Stocks</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('insentive.index') }}" class="connection-item">
                                <i class="pe-7s-gift txt-primary"></i>
                                <span class="block">Insentives</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li class="text-center">
                    <ul class="app-icon-wrap">
                        <li>
                            <a href="{{ route('sales.index') }}" class="connection-item">
                                <i class="pe-7s-cart txt-info"></i>
                                <span class="block">Sales</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dues.index') }}" class="connection-item">
                                <i class="pe-7s-credit txt-info"></i>
                                <span class="block">Dues</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('collection.index') }}" class="connection-item">
                                <i class="pe-7s-graph1 txt-primary"></i>
                                <span class="block">Collections</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('deposit.index') }}" class="connection-item">
                                <i class="pe-7s-cash txt-info"></i>
                                <span class="block">Deposit to HO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li class="text-center">
                    <ul class="app-icon-wrap">

                        <li>
                            <a href="{{ url('admin/report') }}" class="connection-item">
                                <i class="pe-7s-graph2 txt-info"></i>
                                <span class="block">Reports</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="divider"></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img
                    src="{{ asset('images/user/user3.png') }}" alt="user_auth"
                    class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
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
                    <form action="{{ route('admin.logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="fa fa-fw fa-power-off"></i> Log Out</button>
                    </form>
                    <!-- <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a> -->
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-search-overlap" id="site_navbar_search">
        <form role="search">
            <div class="form-group mb-0">
                <div class="input-search">
                    <div class="input-group">
                        <input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30"
                            placeholder="Search">
                        <span class="input-group-addon pr-30">
                            <a href="javascript:void(0)" class="close-input-overlay"
                                data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close"
                                aria-expanded="true"><i class="fa fa-times"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>
