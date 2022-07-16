@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
												<p>Powered by <strong>{{ env('APP_NAME') }}</strong></p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-etsy fa-3x"></i>
																<div class="info">
																				<h4>Employees</h4>
																				<p><b>{{ $data['employees'] }}</b></p>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-cart-arrow-down fa-2x"></i>
																<div class="info">
																				<h4>Supplies</h4>
																				<p><b>{{ $data['supplies'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-cart-plus fa-2x"></i>
																<div class="info">
																				<h4>Orders</h4>
																				<p><b>{{ $data['orders'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-credit-card-alt fa-2x"></i>
																<div class="info">
																				<h4>Loans</h4>
																				<p><b>{{ $data['loans'] }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-bag fa-3x"></i>
																<div class="info">
																				<h4>Sold Items</h4>
																				<p><b>{{ $data['sold_items'] }}</b></p>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-shopping-basket fa-2x"></i>
																<div class="info">
																				<h4>Stock Items</h4>
																				<p><b>{{ $data['stock'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-shopping-cart fa-2x"></i>
																<div class="info">
																				<h4>Required Items</h4>
																				<p><b>{{ $data['required_items'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-cart-plus fa-2x"></i>
																<div class="info">
																				<h4>Ordered Items</h4>
																				<p><b>{{ $data['ordered_items'] }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h4>Sales</h4>
																				<p><b>{{ $data['sales_value'] }}</b></p>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-bar-chart fa-2x"></i>
																<div class="info">
																				<h4>Expenses</h4>
																				<p><b>{{ $data['expenses_value'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-area-chart fa-2x"></i>
																<div class="info">
																				<h4>Revenue</h4>
																				<p><b>{{ $data['revenue_value'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-plus fa-2x"></i>
																<div class="info">
																				<h4>Profit</h4>
																				<p><b>{{ $data['profit_value'] }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-percent fa-2x"></i>
																<div class="info">
																				<h4>Sales Growth</h4>
																				<p><b>{{ $data['sales_growth'] }}%</b></p>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-percent fa-2x"></i>
																<div class="info">
																				<h4>Expenses Growth</h4>
																				<p><b>{{ $data['expenses_growth'] }}%</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-percent fa-2x"></i>
																<div class="info">
																				<h4>Revenue Growth</h4>
																				<p><b>{{ $data['revenue_growth'] }}%</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-percent fa-2x"></i>
																<div class="info">
																				<h4>Profit Growth</h4>
																				<p><b>{{ $data['profit_growth'] }}%</b></p>
																</div>
												</div>
								</div>

				</div>

				@can('view-retaildata', Auth::user())
				@endcan
				<div class="row">
								<div class="container">
												<div class="col-md-10 col-xl-10 mx-auto">
																<div class="tile m-2 ">
																				<h3 class="tile-title ">Sales Revenue and Expenses for {{ date('Y') }}</h3>
																				<div class="embed-responsive embed-responsive-16by9 m-2">
																								<canvas class="embed-responsive-item " id="salesrevexpLineChart"></canvas>
																				</div>
																				<div class="row d-flex justify-content-center">
																								<h5 class="p-1"><span class="badge badge-success">Sales</span></h5>
																								<h5 class="p-1"><span class="badge badge-danger">Expenses</span></h5>
																								<h5 class="p-1"><span class="badge badge-info">Revenue</span></h5>
																				</div>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Sales Revenue Expenses Profit for {{ date('M') . ' ' . date('Y') }}</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="stockPieChart">
																				</canvas>
																</div>
																<div class="row d-flex justify-content-center">
																				<h5 class="p-1"><span class="badge badge-success">Sales</span></h5>
																				<h5 class="p-1"><span class="badge badge-danger">Expenses</span></h5>
																				<h5 class="p-1"><span class="badge badge-warning">Revenue</span></h5>
																				<h5 class="p-1"><span class="badge badge-info">Profit</span></h5>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Sales for {{ date('Y') }}</h3>

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="usersPieChart">
																				</canvas>
																</div>
												</div>
								</div>
								{{-- <div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Expense</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="expenseLineChart">
																				</canvas>
																</div>

																<div class="row">
																				<h5 class="p-1"><span class="badge badge-success">Sales</span></h5>
																				<h5 class="p-1"><span class="badge badge-danger">Expenses</span></h5>
																				<h5 class="p-1"><span class="badge badge-info">Revenue</span></h5>
																</div>
												</div>
								</div> --}}
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Expense for {{ date('Y') }}</h3>

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="expensePieChart">


																				</canvas>
																</div>
												</div>
								</div>
								{{-- <div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Revenue</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="revenueLineChart"></canvas>
																</div>
												</div>
								</div> --}}
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Revenue for {{ date('Y') }}</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="revenuePieChart">


																				</canvas>
																</div>
												</div>
								</div>
								{{-- <div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Stock</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="stockLineChart"></canvas>
																</div>
												</div>
								</div> --}}
								<div class="container-fluid row">

												<div class="col-md-6">
																<div class="tile">
																				<h3 class="tile-title">Loans for {{ date('Y') }}</h3>
																				<div class="embed-responsive embed-responsive-16by9">
																								<canvas class="embed-responsive-item" id="loansLineChart"></canvas>
																				</div>
																				<div class="row d-flex justify-content-center">
																								<h5 class="p-1"><span class="badge badge-danger">Loans in ksh</span></h5>
																				</div>
																</div>
												</div>
												<div class="col-md-6">
																<div class="tile">
																				<h3 class="tile-title">Loans for {{ date('Y') }}</h3>
																				<div class="embed-responsive embed-responsive-16by9">
																								<canvas class="embed-responsive-item" id="loansPieChart">
																								</canvas>
																				</div>
																</div>
												</div>
								</div>

				</div>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/chart.js') }}"></script>
				<script type="text/javascript">
				    /*
																								                   var data = {
																												        labels: @json($data['months']),
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
																												                data: @json($data['salesData'])



																												            }
																												        ]
																												    };

																								                    */
				    var loansLdata = {
				        labels: @json($data['months']),
				        datasets: [{
				            title: "My Second dataset",
				            fillColor: "rgba(255,0,0,0.2)",
				            strokeColor: "rgba(255,0,0,1)",
				            pointColor: "rgba(255,0,0,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(151,187,205,1)",
				            data: @json($data['loansData'])
				        }],
				        options: {
				            responsive: true,
				            title: {
				                display: true,
				                text: 'Chart.js Line Chart'
				            },
				        }
				    }

				    var salesexprevLdata = {
				        labels: @json($data['months']),
				        datasets: [{
				                title: "Sales",
				                display: true,
				                fillColor: "rgba(225,225,220,0.1)",
				                strokeColor: "rgba(0,255,0,1)",
				                pointColor: "rgba(127,255,0,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])
				            },
				            {

				                title: "Revenue",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(0,0,255,1)",
				                pointColor: "rgba(0,187,255,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['revenueData'])
				            },
				            {
				                title: "Expenses",
				                fillColor: "rgba(240,0,0,0.1)",
				                strokeColor: "rgba(255,0,0,1)",
				                pointColor: "rgba(255,0,0,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(127,255,0,1)",
				                data: @json($data['expenseData'])
				            }
				        ]
				    };

				    var creditLdata = {
				        labels: @json($data['months']),
				        datasets: [{
				                title: "Sales",
				                display: true,
				                fillColor: "rgba(225,225,220,0.1)",
				                strokeColor: "rgba(0,255,0,1)",
				                pointColor: "rgba(127,255,0,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(220,220,220,1)",
				                data: @json($data['salesData'])
				            },
				            {

				                title: "Revenue",
				                fillColor: "rgba(151,187,205,0.2)",
				                strokeColor: "rgba(0,0,255,1)",
				                pointColor: "rgba(0,187,255,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(151,187,205,1)",
				                data: @json($data['revenueData'])
				            },
				            {
				                title: "Expenses",
				                fillColor: "rgba(240,0,0,0.1)",
				                strokeColor: "rgba(255,0,0,1)",
				                pointColor: "rgba(255,0,0,1)",
				                pointStrokeColor: "#fff",
				                pointHighlightFill: "#fff",
				                pointHighlightStroke: "rgba(127,255,0,1)",
				                data: @json($data['expenseData'])
				            }
				        ]
				    };
				    var revenueLdata = {
				        labels: @json($data['months']),
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

				    var options = {
				        scaleShowLabels: true, // to hide vertical lables
				        xAxes: [{
				            display: false
				        }],
				        yAxes: [{
				            display: false
				        }],
				    };

				    var pdata = [{
				            value: @json($data['expenses_value']),
				            color: "red",
				            highlight: "red",
				            label: "Expenses"
				        },
				        {
				            value: @json($data['sales_value']),
				            color: "green",
				            highlight: "lightgreen",
				            label: "Sales"
				        },
				        {
				            value: @json($data['revenue_value']),
				            color: "yellow",
				            highlight: "#FFC870",
				            label: "Revenue"
				        },
				        {
				            value: @json($data['profit_value']),
				            color: "blue",
				            highlight: "lightblue",
				            label: "Profit"
				        }
				    ]


				    var ctxl = $("#salesrevexpLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(salesexprevLdata);

				    // var ctxl = $("#expenseLineChart").get(0).getContext("2d");
				    // var lineChart = new Chart(ctxl).Line(creditLdata);

				    // var ctxl = $("#revenueLineChart").get(0).getContext("2d");
				    // var lineChart = new Chart(ctxl).Line(creditLdata);

				    // var ctxl = $("#stockLineChart").get(0).getContext("2d");
				    // var lineChart = new Chart(ctxl).Line(creditLdata);


				    var ctxl = $("#loansLineChart").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(loansLdata);

				    //piecharts
				    console.log(@json($data['salesPData']));
				    var salesPdata = @json($data['salesPData']);
				    var espensePdata = @json($data['expensePData']);
				    var revenuePdata = @json($data['revenuePData']);
				    var stockPdata = @json($data['stockPData']);
				    var loansPdata = @json($data['loansPData']);

				    var ctxp = $("#usersPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(salesPdata);
				    var ctxp = $("#expensePieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(espensePdata);
				    var ctxp = $("#revenuePieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(revenuePdata);

				    var ctxp = $("#stockPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(pdata);

				    var ctxp = $("#loansPieChart").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(loansPdata);
				</script>
@endsection
