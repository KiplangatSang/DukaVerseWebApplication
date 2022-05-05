@extends('Layouts.app')

@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-dashboard"></i> Dashboard</h1>
												<p>Welcome to Storm5Retail</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
								</ul>
				</div>

				@can('view-retaildata', Auth::user())
								<div class="row">
												<div class="col-md-6 col-lg-3">

																<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-2x"></i>
																				<div class="info">

																								<h4>Employees</h4>
																								<p><b>5</b></p>

																				</div>
																</div>

												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-2x"></i>
																				<div class="info">
																								<h4>Supplies</h4>
																								<p><b>25</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-2x"></i>
																				<div class="info">
																								<h4>Orders</h4>
																								<p><b>10</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-2x"></i>
																				<div class="info">
																								<h4>Stars</h4>
																								<p><b>500</b></p>
																				</div>
																</div>
												</div>

				</div>
                @endcan
				<div class="row">
								@if (session()->has('message'))
												<div class="container-fluid alert alert-danger">
																{{ session()->get('message') }}
												</div>
								@endif

								@if (session()->has('success'))
												<div class="container-fluid alert alert-success">
																{{ session()->get('success') }}
												</div>
								@endif
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Monthly Sales</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Monthly Sales</h3>



																{{-- {{dd($salesData = array(28, 48, 40, 19, 86))}} --}}

																{{-- {{dd($salesData)}} --}}

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="pieChartDemo">


																				</canvas>
																</div>
												</div>
								</div>
				</div>
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
				                data: @json($data['salesData']),
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
				    var pdata = [{
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

				    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
				    var lineChart = new Chart(ctxl).Line(data);

				    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
				    var pieChart = new Chart(ctxp).Pie(pdata);
				</script>
@endsection
