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
												href="/home">{{ $data['supplier']->supplier_name ?? env('app_name') }} </a>
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

												<a href="/supplier/retails/profile"><img class="app-sidebar__user-avatar d-flex w-50"
																				src="{{ $data['retail']->retail_profile ??auth()->user()->profiles()->first()->profile_image }}"
																				alt="User Image"></a>
												<div>
																<a href="/supplier/retails/profile" class="text-light">
																				<p class="app-sidebar__user-name">
																								{{ Auth::user()->username ?? 'Guest' }}</p>
																</a>
																<br>

																@if (Auth::user()->is_owner)

																				<a href="/supplier/retails/profile" class="text-light">
																								<p class="app-sidebar__user-designation">Retail Owner</p>
																				</a>
																@else
																				@if (Auth::user()->is_employee)
																								<a href="/supplier/retails/profile" class="text-light">
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

												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-shopping-basket"></i><span class="app-menu__label">Items</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/supplier/stock/index"><i
																																class="icon fa fa-circle-o"></i>All
																												Items</a></li>
																				<li><a class="treeview-item " href="/supplier/stock/create"><i
																																class="icon fa fa-circle-o "></i>Add an
																												Item</a></li>
																</ul>
												</li>
												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-cart-plus"></i><span class="app-menu__label">Orders</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu ">
																				<li><a class="treeview-item  " href="/supplier/orders/index"><i
																																class="icon fa fa-circle-o"></i>All
																												Orders</a></li>
																				<li><a class="treeview-item " href="/supplier/orders/delivered/index"><i
																																class="icon fa fa-circle-o"></i>
																												Delivered Orders</a>
																				</li>
																				<li><a class="treeview-item  " href="/supplier/orders/pending/index"><i
																																class="icon fa fa-circle-o "></i>Pending Orders</a></li>

																</ul>
												</li>

												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-cart-arrow-down"></i><span
																								class="app-menu__label ">Supplies</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				{{-- <li><a class="treeview-item " href="/supplier/supplies/suppliers/index"><i
																																class="icon fa fa-circle-o "></i> Suppliers </a></li> --}}
																				<li><a class="treeview-item " href="/supplier/supplies/index"><i
																																class="icon fa fa-circle-o"></i>Supplies</a></li>
																				<li><a class="treeview-item  " href="/supplier/supplies/payments/index"><i
																																class="icon fa fa-circle-o "></i>Pending Payments</a></li>
																				<li><a class="treeview-item  " href="/supplier/supplies/payments/index"><i
																																class="icon fa fa-circle-o "></i>Supply Items</a></li>
																</ul>
												</li>
												{{-- <li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-credit-card-alt"></i><span class="app-menu__label">Loans</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item" href="/supplier/loans/index"><i
																																class="icon fa fa-circle-o"></i>Request A Loan</a></li>
																				<li><a class="treeview-item" href="/supplier/loans/applied/index"><i
																																class="icon fa fa-circle-o"></i> Loan
																												History
																								</a></li>
																				<li><a class="treeview-item" href="/loans/show-my-loans"><i class="icon fa fa-circle-o"></i> Pay
																												Loan
																								</a></li>
																</ul>
												</li> --}}


												<li class="treeview"><a class="app-menu__item " href="#" data-toggle="treeview"><i
																								class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Retail</span><i
																								class="treeview-indicator fa fa-angle-right"></i></a>
																<ul class="treeview-menu">
																				<li><a class="treeview-item " href="/supplier/retails/index"><i
																																class="icon fa fa-circle-o"></i>Retails
																								</a></li>
																				<li><a class="treeview-item " href="/supplier/retails/show"><i
																																class="icon fa fa-circle-o"></i>Retail
																												Information</a></li>
																				<li><a class="treeview-item " href="/supplier/retails/create"><i
																																class="icon fa fa-circle-o"></i>Add
																												a
																												Retail</a></li>
																</ul>
												</li>
												<li><a class="app-menu__item" href="/settigs/index"><i class="app-menu__icon fa fa-cogs"></i><span
																								class="app-menu__label">Settings</span></a>
												</li>
												<li><a class="app-menu__item" href="/supplier/dukaverse/index"><i
																								class="app-menu__icon fa fa-server"></i><span class="app-menu__label">DukaVerse
																								Account</span></a></li>
												<li><a class="app-menu__item" href="/dukaverse/help"><i
																								class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Help</span></a>
												</li>

								</ul>
				</aside>
				<main class="app-content bg-white">
								@include('inc.messages')

								@yield('content')
				</main>


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
