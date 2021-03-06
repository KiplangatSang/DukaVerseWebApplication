<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<head>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
				<script type="text/javascript">
				    $('#datepicker').DatePicker();
				</script>

				<title>Storm5</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
				<!-- Navbar-->
				<header class="app-header"><a class="app-header__logo" href="index.html">Storm5</a>
								<!-- Sidebar toggle button-->
								<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
								<!-- Navbar Right Menu-->
								<ul class="app-nav">
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
																				<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
				<aside class="app-sidebar bg-success">
								<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
																src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
												<div>
																<p class="app-sidebar__user-name">User</p>
																<p class="app-sidebar__user-designation">Employee</p>
												</div>
								</div>
								<ul class="app-menu ">
												<li><a class="app-menu__item active bg-success" href="/home"><i
																								class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
												</li>
											
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Stock</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu  bg-success">
																				<li><a class="treeview-item   bg-success" href="/show-all-stock"><i
																																class="icon fa fa-circle-o"></i>All Stock</a></li>
																				<li><a class="treeview-item  bg-success" href="/updateAStock" target="_blank" rel="noopener"><i
																																class="icon fa fa-circle-o"></i> Update Stock</a></li>
																				<li><a class="treeview-item  bg-success " href="/create-stock"><i
																																class="icon fa fa-circle-o "></i>Add a stock</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Required Items</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu  bg-success">
																				<li><a class="treeview-item   bg-success" href="/show-all-required-item"><i
																																class="icon fa fa-circle-o"></i>All Required Items</a></li>
																				<li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/"
																												target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i>Order Required Items</a>
																				</li>
																				<li><a class="treeview-item   bg-success" href="/create-requireditems"><i
																																class="icon fa fa-circle-o "></i> Add Required Items</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Orders</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu  bg-success">
																				<li><a class="treeview-item   bg-success" href="bootstrap-components.html"><i
																																class="icon fa fa-circle-o"></i>All Orders</a></li>
																				<li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/"
																												target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Delivered Orders</a>
																				</li>
																				<li><a class="treeview-item  bg-success " href="ui-cards.html"><i
																																class="icon fa fa-circle-o "></i>Pending Orders</a></li>
																				<li><a class="treeview-item   bg-success" href="widgets.html"><i
																																class="icon fa fa-circle-o "></i>Add Orders</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Customers</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu  bg-success">
																				<li><a class="treeview-item   bg-success" href="bootstrap-components.html"><i
																																class="icon fa fa-circle-o"></i> Stock</a></li>
																				<li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/"
																												target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Supplies</a></li>
																				<li><a class="treeview-item  bg-success " href="ui-cards.html"><i
																																class="icon fa fa-circle-o "></i> Required Items</a></li>
																				<li><a class="treeview-item   bg-success" href="widgets.html"><i class="icon fa fa-circle-o "></i>
																												Orders</a></li>
																</ul>
												</li>
												<li class="treeview  bg-success"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Employees</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="form-components.html"><i
																																class="icon fa fa-circle-o "></i> Employee Information</a></li>
																				<li><a class="treeview-item  bg-success" href="form-custom.html"><i
																																class="icon fa fa-circle-o"></i>Employee Sales</a></li>
																				<li><a class="treeview-item  bg-success" href="form-samples.html"><i
																																class="icon fa fa-circle-o "></i>Requests</a></li>
																				<li><a class="treeview-item  bg-success" href="form-notifications.html"><i
																																class="icon fa fa-circle-o "></i>Salaries</a></li>
																				<li><a class="treeview-item  bg-success" href="form-notifications.html"><i
																																class="icon fa fa-circle-o "></i>Add Employee</a></li>
																</ul>
												</li>
												<li class="treeview  bg-success"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Suppliers</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="form-components.html"><i
																																class="icon fa fa-circle-o "></i> Suppliers Information</a></li>
																				<li><a class="treeview-item  bg-success" href="form-custom.html"><i
																																class="icon fa fa-circle-o"></i> Supplies</a></li>
																				<li><a class="treeview-item  bg-success" href="form-samples.html"><i
																																class="icon fa fa-circle-o "></i>Finance</a></li>
																				<li><a class="treeview-item  bg-success" href="form-notifications.html"><i
																																class="icon fa fa-circle-o "></i>Add Supplier</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item   bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Finance</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="table-basic.html"><i
																																class="icon fa fa-circle-o "></i> Sales</a></li>
																				<li><a class="treeview-item  bg-success" href="table-data-table.html"><i
																																class="icon fa fa-circle-o "></i> Purchases</a></li>
																				<li><a class="treeview-item  bg-success" href="table-basic.html"><i
																																class="icon fa fa-circle-o "></i> Pending Credits</a></li>
																				<li><a class="treeview-item  bg-success" href="table-data-table.html"><i
																																class="icon fa fa-circle-o "></i>Expenses</a></li>
																				<li><a class="treeview-item  bg-success" href="table-basic.html"><i
																																class="icon fa fa-circle-o "></i>Total profit</a></li>
																				<li><a class="treeview-item  bg-success" href="table-data-table.html"><i
																																class="icon fa fa-circle-o "></i> Reports</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Loans</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="/get-available-loans"><i
																																class="icon fa fa-circle-o"></i>Request A Loan</a></li>
																				<li><a class="treeview-item  bg-success" href="#"><i class="icon fa fa-circle-o"></i>Pay A
																												loan</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Bills</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="blank-page.html"><i
																																class="icon fa fa-circle-o"></i>All Bills</a></li>
																				<li><a class="treeview-item  bg-success" href="page-login.html"><i
																																class="icon fa fa-circle-o"></i>Pay Bill</a></li>
																				<li><a class="treeview-item  bg-success" href="page-lockscreen.html"><i
																																class="icon fa fa-circle-o"></i>Add a Bill</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Retail</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  bg-success" href="blank-page.html"><i
																																class="icon fa fa-circle-o"></i>Retail Owner</a></li>
																				<li><a class="treeview-item  bg-success" href="page-login.html"><i
																																class="icon fa fa-circle-o"></i>Retail Information</a></li>
																				<li><a class="treeview-item  bg-success" href="page-lockscreen.html"><i
																																class="icon fa fa-circle-o"></i>Add a Retail</a></li>
																</ul>
												</li>
												<li><a class="app-menu__item  bg-success" href="docs.html"><i
																								class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Settings</span></a>
												</li>
												<li><a class="app-menu__item  bg-success" href="docs.html"><i
																								class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Storm5
																								Account</span></a></li>
												<li><a class="app-menu__item  bg-success" href="docs.html"><i
																								class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Help</span></a>
												</li>

								</ul>
				</aside>
				<main class="app-content bg-white">
								@yield('content')
				</main>
				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="js/plugins/pace.min.js')}}"></script>
				<!-- Page specific javascripts-->
				<!-- Data table plugin-->
				<script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
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

				    $('#startDate').datepicker({
				        format: "dd/mm/yyyy",
				        autoclose: true,
				        todayHighlight: true
				    });
				    $('#endDate').datepicker({
				        format: "dd/mm/yyyy",
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
