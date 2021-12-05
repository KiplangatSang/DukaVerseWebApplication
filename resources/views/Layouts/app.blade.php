<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}




<head>

    {{-- <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    {{-- <!-- Twitter meta--> --}}
    {{-- <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya"> --}}
    <!-- Open Graph Meta-->
    {{-- <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."> --}}
    <title>Storm5</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body  class="app sidebar-mini" >
       <!-- Navbar-->
       <header class="app-header"><a class="app-header__logo" href="index.html">Storm5</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav ">
          <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
          </li>
          <!--Notification Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
              <li class="app-notification__title">You have 4 new notifications.</li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
                <div class="app-notification__content">
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Lisa sent you a mail</p>
                        <p class="app-notification__meta">2 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Mail server not working</p>
                        <p class="app-notification__meta">5 min ago</p>
                      </div></a></li>
                  <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div>
                        <p class="app-notification__message">Transaction complete</p>
                        <p class="app-notification__meta">2 days ago</p>
                      </div></a></li>
                </div>
              </div>
              <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
          </li>
          <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
              <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
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
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
          <div>
            <p class="app-sidebar__user-name">User</p>
            <p class="app-sidebar__user-designation">Employee</p>
          </div>
        </div>
        <ul class="app-menu ">
          <li><a class="app-menu__item active bg-success" href="dashboard.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Sales</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu  bg-success">
              <li><a class="treeview-item   bg-success" href="/showallsales"><i class="icon fa fa-circle-o"></i>Sold Items</a></li>
              <li><a class="treeview-item  bg-success" href="/soldPaidItems" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Paid Items</a></li>
              <li ><a class="treeview-item  bg-success " href="/salesitemsoncredit"><i class="icon fa fa-circle-o "></i>Items On Credit</a></li>
              <li ><a class="treeview-item   bg-success" href="/createsales"><i class="icon fa fa-circle-o "></i> Create Sales Item</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Stock</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu  bg-success">
              <li><a class="treeview-item   bg-success" href="/show-all-stock"><i class="icon fa fa-circle-o"></i>All Stock</a></li>
              <li><a class="treeview-item  bg-success" href="/updateAStock" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Update Stock</a></li>
              <li ><a class="treeview-item  bg-success " href="/create-stock"><i class="icon fa fa-circle-o "></i>Add a stock</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Required Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu  bg-success">
              <li><a class="treeview-item   bg-success" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>All Required Items</a></li>
              <li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i>Order Required Items</a></li>
              <li ><a class="treeview-item   bg-success" href="widgets.html"><i class="icon fa fa-circle-o "></i> Add Required Items</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Orders</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu  bg-success">
              <li><a class="treeview-item   bg-success" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>All Orders</a></li>
              <li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Delivered Orders</a></li>
              <li ><a class="treeview-item  bg-success " href="ui-cards.html"><i class="icon fa fa-circle-o "></i>Pending Orders</a></li>
              <li ><a class="treeview-item   bg-success" href="widgets.html"><i class="icon fa fa-circle-o "></i>Add Orders</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Customers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu  bg-success">
              <li><a class="treeview-item   bg-success" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>  Stock</a></li>
              <li><a class="treeview-item  bg-success" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Supplies</a></li>
              <li ><a class="treeview-item  bg-success " href="ui-cards.html"><i class="icon fa fa-circle-o "></i> Required Items</a></li>
              <li ><a class="treeview-item   bg-success" href="widgets.html"><i class="icon fa fa-circle-o "></i> Orders</a></li>
            </ul>
          </li>
          <li class="treeview  bg-success"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Employees</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item  bg-success" href="form-components.html"><i class="icon fa fa-circle-o "></i> Employee Information</a></li>
              <li><a class="treeview-item  bg-success" href="form-custom.html"><i class="icon fa fa-circle-o"></i>Employee Sales</a></li>
              <li><a class="treeview-item  bg-success" href="form-samples.html"><i class="icon fa fa-circle-o "></i>Requests</a></li>
              <li><a class="treeview-item  bg-success" href="form-notifications.html"><i class="icon fa fa-circle-o "></i>Salaries</a></li>
              <li><a class="treeview-item  bg-success" href="form-notifications.html"><i class="icon fa fa-circle-o "></i>Add Employee</a></li>
            </ul>
          </li>
          <li class="treeview  bg-success"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label ">Suppliers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item  bg-success" href="form-components.html"><i class="icon fa fa-circle-o "></i> Suppliers Information</a></li>
              <li><a class="treeview-item  bg-success" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Supplies</a></li>
              <li><a class="treeview-item  bg-success" href="form-samples.html"><i class="icon fa fa-circle-o "></i>Finance</a></li>
              <li><a class="treeview-item  bg-success" href="form-notifications.html"><i class="icon fa fa-circle-o "></i>Add Supplier</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item   bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Finance</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item  bg-success" href="table-basic.html"><i class="icon fa fa-circle-o "></i> Sales</a></li>
              <li><a class="treeview-item  bg-success" href="table-data-table.html"><i class="icon fa fa-circle-o "></i> Purchases</a></li>
              <li><a class="treeview-item  bg-success" href="table-basic.html"><i class="icon fa fa-circle-o "></i> Pending Credits</a></li>
              <li><a class="treeview-item  bg-success" href="table-data-table.html"><i class="icon fa fa-circle-o "></i>Expenses</a></li>
              <li><a class="treeview-item  bg-success" href="table-basic.html"><i class="icon fa fa-circle-o "></i>Total profit</a></li>
              <li><a class="treeview-item  bg-success" href="table-data-table.html"><i class="icon fa fa-circle-o "></i> Reports</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Bills</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item  bg-success" href="blank-page.html"><i class="icon fa fa-circle-o"></i>All Bills</a></li>
              <li><a class="treeview-item  bg-success" href="page-login.html"><i class="icon fa fa-circle-o"></i>Pay Bill</a></li>
              <li><a class="treeview-item  bg-success" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i>Add a Bill</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item  bg-success" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Retail</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item  bg-success" href="blank-page.html"><i class="icon fa fa-circle-o"></i>Retail Owner</a></li>
              <li><a class="treeview-item  bg-success" href="page-login.html"><i class="icon fa fa-circle-o"></i>Retail Information</a></li>
              <li><a class="treeview-item  bg-success" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i>Add a Retail</a></li>
            </ul>
          </li>
          <li><a class="app-menu__item  bg-success" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Settings</span></a></li>
          <li><a class="app-menu__item  bg-success" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Storm5 Account</span></a></li>
          <li><a class="app-menu__item  bg-success" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Help</span></a></li>

        </ul>
      </aside>
        <main  class="app-content bg-white">
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
<script type="text/javascript" src="{{ asset('assets/js/plugins/chart.js') }}"></script>
<script type="text/javascript">
  var data = {
      labels: ["January", "February", "March", "April", "May"],
      datasets: [
          {
              label: "My First dataset",
              fillColor: "rgba(220,220,220,0.2)",
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [65, 59, 80, 81, 56]
          },
          {
              label: "My Second dataset",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              data: [28, 48, 40, 19, 86]
          }
      ]
  };
  var pdata = [
      {
          value: 300,
          color: "#46BFBD",
          highlight: "#5AD3D1",
          label: "Complete"
      },
      {
          value: 50,
          color:"#F7464A",
          highlight: "#FF5A5E",
          label: "In-Progress"
      }
  ]

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if(document.location.hostname == 'pratikborsadiya.in') {
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
  }
</script>
</body>
</html>
