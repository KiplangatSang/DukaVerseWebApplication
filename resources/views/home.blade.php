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
@endsection
