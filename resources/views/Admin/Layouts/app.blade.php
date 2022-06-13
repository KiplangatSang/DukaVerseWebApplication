<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}




<head>

				<title>DukaVerse</title>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cardpayments.css') }}">

				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
</head>

<body class="app sidebar-mini">
				<!-- Navbar-->
				<header class="app-header">
								<a class="app-header__logo" href="/home">DukaVerse</a>
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
				<aside class="app-sidebar">

								<div class="app-sidebar__user"><a href="/client/retails/profile"><img class="app-sidebar__user-avatar d-flex w-25"
																src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																alt="User Image"></a>
												<div>
                                                    <a href="/client/retails/profile"><p class="app-sidebar__user-name">
																				{{ $data['retailimage']->retailName ?? (Auth::user()->username ?? 'guest') }}</p></a>


																@if (Auth::user()->isOnwer)
                                                                <a href="/client/retails/profile"><p class="app-sidebar__user-designation">Retail Owner</p></a>
																@else
																				@if (Auth::user()->isEmployee)
                                                                                <p class="app-sidebar__user-designation">
                                                                                    Employee</a></p>
																				@else
                                                                                <p class="app-sidebar__user-designation">Guest</a></p>
																				@endif

																@endif

												</div>
								</div>
								<ul class="app-menu ">
												<li><a class="app-menu__item active " href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span
																								class="app-menu__label">Dashboard</span></a>
												</li>
												<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Customers</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item   " href="/admin/customers/index"><i
																																class="icon fa fa-circle-o"></i>Customers</a></li>
																				<li><a class="treeview-item " href="/admin/customers/create" target="_blank" rel="noopener"><i
																																class="icon fa fa-circle-o"></i> Add Customer</a></li>
																				<li><a class="treeview-item  " href="/salesitemsoncredit"><i class="icon fa fa-circle-o "></i>Items
																												On Credit</a></li>
																				<li><a class="treeview-item  " href="/createsales"><i class="icon fa fa-circle-o "></i>
																												Add item sold</a></li>
																</ul>
												</li>

												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Finance</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  " href="/admin/finance/index"><i class="icon fa fa-circle-o"></i>View
																												Finances</a></li>
																				<li><a class="treeview-item " href="/admin/finance/graphs/index" target="_blank" rel="noopener"><i
																																class="icon fa fa-circle-o"></i>View Graphs</a>
																				</li>
																				<li><a class="treeview-item  " href="/admin/finance/reports/index"><i
																																class="icon fa fa-circle-o "></i>show
																												Reports</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/reports/create"><i
																																class="icon fa fa-circle-o "></i>Add
																												Report</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Orders</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/admin/orders/index"><i class="icon fa fa-circle-o"></i>
																												Orders</a></li>
																				<li><a class="treeview-item " href="/orders/delivered/index" target="_blank" rel="noopener"><i
																																class="icon fa fa-circle-o"></i> Delivered Orders</a>
																				</li>
																				<li><a class="treeview-item  " href="/orders/pending/index"><i
																																class="icon fa fa-circle-o "></i>Pending Orders</a></li>
																				<li><a class="treeview-item  " href="/orders/create"><i class="icon fa fa-circle-o "></i>Add
																												Orders</a></li>
																</ul>
												</li>


												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Loans</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/admin/loans/index"><i class="icon fa fa-circle-o"></i>
																												All Loans</a></li>
																				<li><a class="treeview-item " href="/admin/loans/create"><i class="icon fa fa-circle-o"></i>Add a
																												Loan</a></li>
																				<li><a class="treeview-item " href="#"><i class="icon fa fa-circle-o"></i>Loan Restrictions</a>
																				</li>
																</ul>
												</li>



												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Loans
																								Processing</span><i class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/admin/loans/appliedloans/index"><i
																																class="icon fa fa-circle-o"></i>
																												Requested Loans</a></li>
																				<li><a class="treeview-item " href="/admin/loans/approved/index"><i
																																class="icon fa fa-circle-o"></i> Approved Loans</a></li>

																				{{-- target="_blank" rel="noopener" --}}
																				<li><a class="treeview-item  " href="/admin/loans/paid/index"><i
																																class="icon fa fa-circle-o "></i>Paid
																												Loans</a></li>
																				<li><a class="treeview-item  " href="/admin/loans/create"><i class="icon fa fa-circle-o "></i>
																												Add a Loan</a></li>
																</ul>
												</li>


												<li class="treeview  "><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Employees</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  " href="/admin/employees/index"><i
																																class="icon fa fa-circle-o"></i>Employees List</a></li>
																				<li><a class="treeview-item" href="/admin/employees/requests/index"><i
																																class="icon fa fa-circle-o "></i>Requests</a></li>
																				<li><a class="treeview-item " href="/admin/employees/salaries/index"><i
																																class="icon fa fa-circle-o "></i>Salaries</a></li>
																				<li><a class="treeview-item " href="/admin/employees/create"><i
																																class="icon fa fa-circle-o "></i>Add Employee</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Suppliers</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/admin/supplies/suppliers/index"><i
																																class="icon fa fa-circle-o "></i> Suppliers </a></li>
																				<li><a class="treeview-item " href="/admin/supplies/index"><i
																																class="icon fa fa-circle-o"></i>Supplies</a></li>
																				<li><a class="treeview-item  " href="/admin/supplies/payments/index"><i
																																class="icon fa fa-circle-o "></i>Pending Payments</a></li>
																				<li><a class="treeview-item  " href="/admin/supplies/suppliers/create"><i
																																class="icon fa fa-circle-o "></i>Add Supplier</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Finance</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item  " href="/admin/finance/sales/index"><i
																																class="icon fa fa-circle-o "></i>
																												Sales</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/purchases/index"><i
																																class="icon fa fa-circle-o "></i>
																												Purchases</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/credits/index"><i
																																class="icon fa fa-circle-o "></i>
																												Pending Credits</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/expenses/index"><i
																																class="icon fa fa-circle-o "></i>Expenses</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/profit/index"><i
																																class="icon fa fa-circle-o "></i>Total
																												profit</a></li>
																				<li><a class="treeview-item  " href="/admin/finance/index"><i
																																class="icon fa fa-circle-o "></i>
																												Reports</a></li>
																</ul>
												</li>





												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Bills</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/admin/bills/index"><i class="icon fa fa-circle-o"></i>All
																												Bills</a>
																				</li>
																				<li><a class="treeview-item " href="/admin/bills/payment/index"><i
																																class="icon fa fa-circle-o"></i>Pay
																												Bill</a></li>
																				<li><a class="treeview-item " href="/admin/bills/create"><i class="icon fa fa-circle-o"></i>Add a
																												Bill</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Retail</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="blank-page.html"><i class="icon fa fa-circle-o"></i>Retail
																												Owner</a></li>
																				<li><a class="treeview-item " href="page-login.html"><i class="icon fa fa-circle-o"></i>Retail
																												Information</a></li>
																				<li><a class="treeview-item " href="/retails/addretail"><i class="icon fa fa-circle-o"></i>Add a
																												Retail</a></li>
																</ul>
												</li>
												<li><a class="app-menu__item" href="/settigs/index"><i class="app-menu__icon fa fa-file-code-o"></i><span
																								class="app-menu__label">Settings</span></a>
												</li>
												<li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span
																								class="app-menu__label">Storm5
																								Account</span></a></li>
												<li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span
																								class="app-menu__label">Help</span></a>
												</li>

								</ul>
				</aside>
				<main class="app-content bg-white">
								@yield('content')
				</main>
				<script type="text/javascript">
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
				</script>


				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets/js/plugins/pace.min.js') }}"></script>
				<!-- Page specific javascripts-->
				<script type="text/javascript" src="{{ asset('assets/js/plugins/chart.js') }}"></script>
				<script type="text/javascript">
				    var data = {
				        labels: ["January", "February", "March", "April", "May"],
				        datasets: [{
				                label: "My First dataset",
				                fillColor: "rgba(220,220,220,0.2)",
				                strokeColor: "rgba(220,220,220,1)",
				                pointColor: "rgba(220,220,220,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])


				            },
				            {
				                label: "My Second dataset",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(151,187,205,1)",
				                pointColor: "rgba(151,187,205,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['usersData'])



				            }
				        ]
				    };
				    var loansLdata = {
				        labels: ["January", "February", "March", "April", "May"],
				        datasets: [{
				                label: "My First dataset",
				                fillColor: "rgba(220,220,220,0.2)",
				                strokeColor: "rgba(220,220,220,1)",
				                pointColor: "rgba(220,220,220,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])


				            },
				            {
				                label: "My Second dataset",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(151,187,205,1)",
				                pointColor: "rgba(151,187,205,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['loansData'])



				            }
				        ]
				    };
				    var creditLdata = {
				        labels: ["January", "February", "March", "April", "May"],
				        datasets: [{
				                label: "My First dataset",
				                fillColor: "rgba(220,220,220,0.2)",
				                strokeColor: "rgba(220,220,220,1)",
				                pointColor: "rgba(220,220,220,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])


				            },
				            {
				                label: "My Second dataset",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(151,187,205,1)",
				                pointColor: "rgba(151,187,205,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['creditData'])



				            }
				        ]
				    };
				    var revenueLdata = {
				        labels: ["January", "February", "March", "April", "May"],
				        datasets: [{
				                label: "My First dataset",
				                fillColor: "rgba(220,220,220,0.2)",
				                strokeColor: "rgba(220,220,220,1)",
				                pointColor: "rgba(220,220,220,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])


				            },
				            {
				                label: "My Second dataset",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(151,187,205,1)",
				                pointColor: "rgba(151,187,205,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['revenueData'])



				            }
				        ]
				    };


				    var ctxl = $("#usersLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(data);
				    var ctxl = $("#loansLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(loansLdata);
				    var ctxl = $("#creditLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(creditLdata);

				    var usersPdata = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]

				    var loansPdata = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]

				    var creditPdata = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]

				    var revenuePdata = [{
				            value: 40,
				            color: "#ff0000",
				            highlight: "#5AD3D1",
				            label: "Complete"
				        },
				        {
				            value: 60,
				            color: "#7a97cc",
				            highlight: "#000000",
				            label: "In-Progress"
				        }
				    ]

				    var ctxp = $("#usersPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(usersPdata);
				    var ctxp = $("#loansPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(loansPdata);
				    var ctxp = $("#creditPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(creditPdata);

				    // var ctxp = $("#revenuePieChart").get(0).getContext("2d");
				    // var pieChart = new Chart(ctxp).Pie(revenuePdata);
				</script>




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
