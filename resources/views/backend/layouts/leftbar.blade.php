<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a class="active" href="{{ url('/admin/dashboard') }}" data-toggle="collapse" data-target="#dashboard_dr"><i
                    class="icon-picture mr-10"></i>Dashboard <span class="pull-right"></a>

        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#busilist"><i
                    class="icon-fire mr-10"></i>Business<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="busilist" class="collapse collapse-level-1">
                {{-- <li>
								<a href="{{route('business.active')}}">Business List (Active)</a>
							</li> --}}
                <li>
                    <a href="{{ route('business.index') }}">Business List (All)</a>
                </li>
                <li>
                    <a href="{{ route('business.create') }}">New Business</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#investlist"><i
                    class="icon-plane mr-10"></i>Investments<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="investlist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('investment.index') }}">Investment List</a>
                </li>
                <li>
                    <a href="{{ route('investment.create') }}">New Investment</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#targlist"><i
                    class="icon-eyeglass mr-10"></i>Monthly Targets<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="targlist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('target.index') }}">All Targets</a>
                </li>
                <li>
                    <a href="{{ route('target.create') }}">New Target</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#paymelist"><i
                    class="icon-credit-card mr-10"></i>Bank Deposits<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="paymelist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('payment.index') }}">All Deposits</a>
                </li>
                <li>
                    <a href="{{ route('payment.create') }}">New Deposit</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i
                    class="icon-social-dropbox mr-10"></i>Stocks<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('stock.index') }}">All Stocks</a>
                </li>
                <li>
                    <a href="{{ route('stock.create') }}">New Stock Details</a>
                </li>
                <li>
                    <a href="#">Current Month Stocks</a>
                </li>
                <li>
                    <a href="#">Previous Month Stocks</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#incentive_dr"><i
                    class="icon-social-dropbox mr-10"></i>Insentives<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="incentive_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('insentive.index') }}">All Insentives</a>
                </li>
                <li>
                    <a href="{{ route('insentive.create') }}">New Insentive</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#saleslist"><i
                    class="icon-rocket mr-10"></i>Sales<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="saleslist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('sales.index') }}">All Sales</a>
                </li>
                <li>
                    <a href="{{ route('sales.create') }}">New Sale</a>
                </li>
                <li>
                    <a href="{{ route('sales.create') }}">New Return</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dueslist"><i
                    class="icon-link mr-10"></i>Dues<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="dueslist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('dues.index') }}">All Dues</a>
                </li>
                <li>
                    <a href="{{ route('dues.index') }}">All Collections</a>
                </li>
                <li>
                    <a href="{{ route('dues.create') }}">New Collection</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#depolist"><i
                    class="icon-link mr-10"></i>Deposit to HO<span class="pull-right"><i
                        class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="depolist" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('deposit.index') }}">All Deposits</a>
                </li>
                <li>
                    <a href="{{ route('deposit.create') }}">New Deposit</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="{{ url('admin/report/') }}"><i class="icon-notebook mr-10"></i>Reports<span
                    class="pull-right"></span></a>
            <!-- <ul id="reptlist" class="collapse collapse-level-1">
       <li>
        <a href="{{ url('admin/report/') }}">Company wise Monthly Report</a>
       </li>
       <li>
        <a href="#">Retailer wise Monthly Report</a>
       </li>
      </ul> -->
        </li>

    </ul>
</div>
