<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/admin') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item {{ Request::is( 'home' ) ? ' active' : null }}" >
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item  {{ Request::is( 'admin/manage/*' ) ? ' active' : null }}">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#manage" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-cog"></i>
                    <span class="nav-link-text">Manage</span>
                </a>
                <ul class="sidenav-second-level collapse" id="manage">
                    <li>
                        <a href="{{ route('manage.customers') }}">Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('manage.vendors') }}">Vendors</a>
                    </li>
                    <li>
                        <a href="{{ route('manage.items') }}">Item or Products</a>
                    </li>
                    <li>
                        <a href="{{ route('manage.coa') }}">Chart of Accounts</a>
                    </li>
                    <li>
                        <a href="{{ route('manage.fiscal') }}">Fiscal Data</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/sales/*') ? ' active' : null }}">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#sales" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="nav-link-text">Sales</span>
                </a>
                <ul class="sidenav-second-level collapse" id="sales">
                    <li>
                        <a href="{{ route('sales.estimates') }}">Estimates</a>
                    </li>
                    <li>
                        <a href="{{ route('sales.invoices') }}">Invoices</a>
                    </li>
                    <li>
                        <a href="{{ route('sales.customerstatements') }}">Customer Statements</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is( 'admin/purchases/*' ) ? ' active' : null }}">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#purchases" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                    <span class="nav-link-text">Purchases</span>
                </a>
                <ul class="sidenav-second-level collapse" id="purchases">
                    <li>
                        <a href="{{ route('purchases.bills') }}">Bills</a>
                    </li>
                    <li>
                        <a href="{{ route('purchases.receipts') }}">Receipts</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is( 'admin/accounting/*' ) ? ' active' : null }}">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-balance-scale"></i>
                    <span class="nav-link-text">Accounting</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="{{ route('accounting.transaction') }}">Transaction</a>
                    </li>
                    <li>
                        <a href="{{ route('accounting.journaltransaction') }}">Journal Transactions</a>
                    </li>
                    <li>
                        <a href="{{ route('accounting.startingbalance') }}">Starting Balances</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is( 'admin/reports/*' ) ? ' active' : null }}">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-bar-chart"></i>
                    <span class="nav-link-text">Reports</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="{{ route('report.financial') }}">Financial Statements</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/blank') }}">Others</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-sign-out"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
        </ul>
    </div>
</nav>