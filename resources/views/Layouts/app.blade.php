<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<head>
				<title>DukaVerse</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
				{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cardpayments.css') }}"> --}}
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
</head>

<body class="app sidebar-mini">
				<!-- Navbar-->

				<header class="app-header"><a class="app-header__logo"
												href="/home">{{ $data['retail']->retail_name ?? env('app_name') }} </a>
								<!-- Sidebar toggle button-->
								<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
								<!-- Navbar Right Menu-->
								<ul class="app-nav ">
												<li class="app-search">
																<input class="app-search__input" type="search" placeholder="Search">
																<button class="app-search__button"><i class="fa fa-search"></i></button>
												</li>
												<!--Notification Menu-->
												<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
																				aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
																<ul class="app-notification dropdown-menu dropdown-menu-right">
																				<li class="app-notification__title">You have 4 new notifications.</li>
																				<div class="app-notification__content">
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-primary"></i><i
																																												class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Lisa sent you a mail</p>
																																				<p class="app-notification__meta">2 min ago</p>
																																</div>
																												</a></li>
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-danger"></i><i
																																												class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Mail server not working</p>
																																				<p class="app-notification__meta">5 min ago</p>
																																</div>
																												</a></li>
																								<li><a class="app-notification__item" href="javascript:;"><span
																																				class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																												class="fa fa-circle fa-stack-2x text-success"></i><i
																																												class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
																																<div>
																																				<p class="app-notification__message">Transaction complete</p>
																																				<p class="app-notification__meta">2 days ago</p>
																																</div>
																												</a></li>
																								<div class="app-notification__content">
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-primary"></i><i
																																																class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Lisa sent you a mail</p>
																																								<p class="app-notification__meta">2 min ago</p>
																																				</div>
																																</a></li>
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-danger"></i><i
																																																class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Mail server not working</p>
																																								<p class="app-notification__meta">5 min ago</p>
																																				</div>
																																</a></li>
																												<li><a class="app-notification__item" href="javascript:;"><span
																																								class="app-notification__icon"><span class="fa-stack fa-lg"><i
																																																class="fa fa-circle fa-stack-2x text-success"></i><i
																																																class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
																																				<div>
																																								<p class="app-notification__message">Transaction complete</p>
																																								<p class="app-notification__meta">2 days ago</p>
																																				</div>
																																</a></li>
																								</div>
																				</div>
																				<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
																</ul>
												</li>
												<!-- User Menu-->
												<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
																				aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
																<ul class="dropdown-menu settings-menu dropdown-menu-right">
																				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a>
																				</li>
																				<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a>
																				</li>
																				<li><a class="dropdown-item" href="{{ route('logout') }}"
																												onclick="event.preventDefault();
																														document.getElementById('logout-form').submit();"><i
																																class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
																								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																												@csrf
																								</form>
																				</li>

																</ul>
												</li>
								</ul>
				</header>
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
				<aside class="app-sidebar">
								<div class="app-sidebar__user bg-dark">

												<a href="/client/retails/profile"><img class="app-sidebar__user-avatar d-flex w-50"
																				src="{{ $data['retail']->retail_profile ??auth()->user()->profiles()->first()->profile_image }}"
																				alt="User Image"></a>
												<div>
																<a href="/client/retails/profile" class="text-light">
																				<p class="app-sidebar__user-name">
																								{{ Auth::user()->username ?? 'Guest' }}</p>
																</a>
																<br>

																@if (Auth::user()->is_owner)

																				<a href="/client/retails/profile" class="text-light">
																								<p class="app-sidebar__user-designation">Retail Owner</p>
																				</a>
																@else
																				@if (Auth::user()->is_employee)
																								<a href="/client/retails/profile" class="text-light">
																												<p class="app-sidebar__user-designation">Employee</p>
																								</a>
																				@else
																								<p class="app-sidebar__user-designation">Guest</p>
																				@endif

																@endif
																<br>

																<p class="app-sidebar__user-designation">{{ $data['retail']->complete ?? '0' }}% Complete</p>

												</div>
								</div>
								<ul class="app-menu ">
												<li><a class="app-menu__item active " href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span
																								class="app-menu__label">Dashboard</span></a>
												</li>
												<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-shopping-bag"></i><span class="app-menu__label">Sales</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item   " href="/client/sales/index"><i
																																class="icon fa fa-circle-o"></i>Sold
																												Items</a></li>
																				<li><a class="treeview-item " href="/client/sales/paiditems/index"><i
																																class="icon fa fa-circle-o"></i> Paid
																												Items</a></li>
																				<li><a class="treeview-item  " href="/client/sales/credit/index"><i
																																class="icon fa fa-circle-o "></i>Items
																												On Credit</a></li>
																				<li><a class="treeview-item  " href="/client/sales/employee/index"><i
																																class="icon fa fa-circle-o "></i>Employee Sales
																								</a></li>
																				<li><a class="treeview-item  " href="/client/sell"><i class="icon fa fa-circle-o "></i>
																												Add item sold</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-shopping-basket"></i><span class="app-menu__label">Stock</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/client/stock/index"><i class="icon fa fa-circle-o"></i>All
																												Stock</a></li>
																				<li><a class="treeview-item " href="/client/stock/create"><i class="icon fa fa-circle-o "></i>Add
																												a
																												stock</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Required
																								Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  " href="/client/requireditem/index"><i
																																class="icon fa fa-circle-o"></i>All Required Items</a></li>
																				<li><a class="treeview-item  " href="/client/requireditem/ordered/index"><i
																																class="icon fa fa-circle-o "></i>
																												Ordered Items</a></li>

																				{{-- <li><a class="treeview-item  " href="/client/requireditem/placeorder/index"><i
																																class="icon fa fa-circle-o "></i>
																												Place Order</a></li> --}}
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-cart-plus"></i><span class="app-menu__label">Orders</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/client/orders/index"><i class="icon fa fa-circle-o"></i>All
																												Orders</a></li>
																				<li><a class="treeview-item " href="/client/orders/delivered/index"><i
																																class="icon fa fa-circle-o"></i>
																												Delivered Orders</a>
																				</li>
																				<li><a class="treeview-item  " href="/client/orders/pending/index"><i
																																class="icon fa fa-circle-o "></i>Pending Orders</a></li>
																				<li><a class="treeview-item  " href="/client/orders/create"><i
																																class="icon fa fa-circle-o "></i>Add
																												Orders</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-address-card-o"></i><span
																								class="app-menu__label">Customers</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/client/customers/index"><i class="icon fa fa-circle-o"></i>
																												Customer List</a></li>
																				<li><a class="treeview-item " href="/client/customers/credit/index"><i
																																class="icon fa fa-circle-o"></i>
																												Customers with credit</a></li>
																				<li><a class="treeview-item  " href="/client/customers/create"><i
																																class="icon fa fa-circle-o "></i>
																												Add a Customer</a></li>
																</ul>
												</li>
												<li class="treeview  "><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-etsy"></i><span class="app-menu__label ">Employees</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/client/employee/index"><i class="icon fa fa-circle-o "></i>
																												Employees List</a></li>
																				<li><a class="treeview-item " href="/employee/viewEmployee/sales"><i
																																class="icon fa fa-circle-o"></i>Employee Sales</a></li>
																				<li><a class="treeview-item" href="form-samples.html"><i
																																class="icon fa fa-circle-o "></i>Requests</a></li>
																				<li><a class="treeview-item " href="/employee/viewEmployee/salaries"><i
																																class="icon fa fa-circle-o "></i>Salaries</a></li>
																				<li><a class="treeview-item " href="/client/employee/create"><i
																																class="icon fa fa-circle-o "></i>Add Employee</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-cart-arrow-down"></i><span class="app-menu__label ">Supplies &
																								Market</span><i class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/market"><i class="icon fa fa-circle-o "></i> Market </a>
																				</li>
																				<li><a class="treeview-item " href="/client/supplies/index"><i
																																class="icon fa fa-circle-o"></i>Supplies</a></li>
																				<li><a class="treeview-item  " href="/client/supplies/payments/index"><i
																																class="icon fa fa-circle-o "></i>Pending Payments</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Finance</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  " href="/client/transactions/index"><i class="icon fa fa-circle-o "></i>
																												Transactions</a></li>
																				<li><a class="treeview-item  " href="table-data-table.html"><i class="icon fa fa-circle-o "></i>
																												Sales Payments</a></li>
																				<li><a class="treeview-item  " href="table-basic.html"><i class="icon fa fa-circle-o "></i>
																												Pending Credits</a></li>
																				<li><a class="treeview-item  " href="table-data-table.html"><i
																																class="icon fa fa-circle-o "></i>Expenses</a></li>
																				<li><a class="treeview-item  " href="table-basic.html"><i class="icon fa fa-circle-o "></i>Total
																												profit</a></li>
																				<li><a class="treeview-item  " href="table-data-table.html"><i class="icon fa fa-circle-o "></i>
																												Reports</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-credit-card-alt"></i><span class="app-menu__label">Loans</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item" href="/client/loans/index"><i
																																class="icon fa fa-circle-o"></i>Request A Loan</a></li>
																				<li><a class="treeview-item" href="/client/loans/applied/index"><i
																																class="icon fa fa-circle-o"></i> Loan
																												History
																								</a></li>
																				<li><a class="treeview-item" href="/loans/show-my-loans"><i class="icon fa fa-circle-o"></i> Pay
																												Loan
																								</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Bills Credit &
																								TV</span><i class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/client/bills/index"><i class="icon fa fa-circle-o"></i>All
																												Bills</a>
																				</li>
																				<li><a class="treeview-item " href="/client/bills/history/index'"><i
																																class="icon fa fa-circle-o"></i>Bill History</a></li>
																				<li><a class="treeview-item " href="/client/bills/create"><i class="icon fa fa-circle-o"></i>Add
																												a
																												Bill</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Retail</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/client/retails/retailowner/show"><i
																																class="icon fa fa-circle-o"></i>Retail
																												Owner</a></li>
																				<li><a class="treeview-item " href="/client/retails/show"><i
																																class="icon fa fa-circle-o"></i>Retail
																												Information</a></li>
																				<li><a class="treeview-item " href="/client/retails/create"><i
																																class="icon fa fa-circle-o"></i>Add
																												a
																												Retail</a></li>
																</ul>
												</li>
												<li><a class="app-menu__item" href="/settigs/index"><i class="app-menu__icon fa fa-cogs"></i><span
																								class="app-menu__label">Settings</span></a>
												</li>
												<li><a class="app-menu__item" href="/client/dukaverse/index"><i
																								class="app-menu__icon fa fa-server"></i><span class="app-menu__label">DukaVerse
																								Account</span></a></li>
												<li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span
																								class="app-menu__label">Help</span></a>
												</li>

								</ul>
				</aside>
				<main class="app-content bg-white">
								@include('inc.messages')

								@yield('content')
				</main>
				{{-- <script type="text/javascript">
				    function submitform() {
				        var btn = document.getElementById("sales_date_btn");
				        if (btn.innerText === "Red") {
				            btn.innerText = "Blue";
				        } else {
				            btn.innerText = "Red";
				        }
				        document.getElementById("sales_date_form").action = "/sales-by-date/1";
				        document.getElementById("sales_date_form").submit();

				    }

				    function submitretailform(id) {

				        document.getElementById("retailform").action = "/sales/sales-by-retail/" + id;
				        document.getElementById("retailform").submit();

				    }
				</script> --}}


				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets/js/plugins/pace.min.js') }}"></script>
				<!-- Page specific javascripts-->
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>


				<script type="text/javascript">
				    $('#sl').on('click', function() {
				        $('#tl').loadingBtn();
				        $('#tb').loadingBtn({
				            text: "Signing In"
				        });
				    });

				    $('#el').on('click', function() {
				        $('#tl').loadingBtnComplete();
				        $('#tb').loadingBtnComplete({
				            html: "Sign In"
				        });
				    });


				    $('#multipleSelectForm').select2();
				</script>

				{{-- date picker --}}
				<script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript">
				    $('#startDate').datepicker({
				        format: "yyyy-mm-dd",
				        autoclose: true,
				        todayHighlight: true
				    });
				    $('#endDate').datepicker({
				        format: "yyyy-mm-dd",
				        autoclose: true,
				        todayHighlight: true
				    });

				    $('#demoSelect').select2();
				</script>
				<script type="text/javascript">
				    $('#sampleTable').DataTable();
				</script>


</body>

</html>
