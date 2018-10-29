<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/admin') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item {{ Request::is( 'home' ) ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Dashboard"  >
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item  {{ Request::is( 'admin/manage/*' ) ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Tables">
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
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/sales/*') ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Charts">
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
            <li class="nav-item {{ Request::is( 'admin/purchases/*' ) ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Tables">
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
            <li class="nav-item {{ Request::is( 'admin/accounting/*' ) ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Components">
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
            <li class="nav-item {{ Request::is( 'admin/reports/*' ) ? ' active' : null }}" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-bar-chart"></i>
                    <span class="nav-link-text">Reports</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="{{ url('/admin/login') }}">Financial Statements</a>
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
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
                    <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
                    <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                </div>
            </li> -->
            <!-- <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for...">
                        <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </li> -->
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