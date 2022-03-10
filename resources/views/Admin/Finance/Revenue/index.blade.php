@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-dashboard"></i>Sales</h1>
												<p><strong>Storm5</strong></p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i>Sales</li>
												<li class="breadcrumb-item"><a href="/home">Sales</a></li>
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
																<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up "></i>
																				<div class="info">
																								<h4>Users</h4>
																								<p><b>25</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-2x"></i>
																				<div class="info">
																								<h4>Internal Loans</h4>
																								<p><b>10</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-2x"></i>
																				<div class="info">
																								<h4>Board</h4>
																								<p><b>500</b></p>
																				</div>
																</div>
												</div>

								</div>
				@endcan
				@can('view-retaildata', Auth::user())
								<div class="row">
												<div class="col-md-6 col-lg-3">

																<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-2x"></i>
																				<div class="info">

																								<h4>Investments</h4>
																								<p><b>5</b></p>

																				</div>
																</div>

												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up "></i>
																				<div class="info">
																								<h4>Credits</h4>
																								<p><b>25</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-2x"></i>
																				<div class="info">
																								<h4>External Loans</h4>
																								<p><b>10</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-2x"></i>
																				<div class="info">
																								<h4>Subscriptions</h4>
																								<p><b>500</b></p>
																				</div>
																</div>
												</div>

								</div>
				@endcan
				@can('view-retaildata', Auth::user())
								<div class="row">
												<div class="col-md-6 col-lg-3">

																<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-2x"></i>
																				<div class="info">

																								<h4>Retail Users</h4>
																								<p><b>5</b></p>

																				</div>
																</div>

												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up "></i>
																				<div class="info">
																								<h4>Retails</h4>
																								<p><b>25</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-2x"></i>
																				<div class="info">
																								<h4>Retail Loans</h4>
																								<p><b>10</b></p>
																				</div>
																</div>
												</div>
												<div class="col-md-6 col-lg-3">
																<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-2x"></i>
																				<div class="info">
																								<h4>Retail Credit</h4>
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
																<h3 class="tile-title">Users</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="usersLineChart"></canvas>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Users</h3>

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="usersPieChart">


																				</canvas>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Loans</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="loansLineChart">

                                                                                </canvas>
																</div>
												</div>
								</div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Loans</h3>

																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="loansPieChart">


																				</canvas>
																</div>
												</div>
								</div>
                                <div class="col-md-6">
                                    <div class="tile">
                                                    <h3 class="tile-title">Credit</h3>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                    <canvas class="embed-responsive-item" id="creditLineChart"></canvas>
                                                    </div>
                                    </div>
                    </div>
								<div class="col-md-6">
												<div class="tile">
																<h3 class="tile-title">Credit</h3>
																<div class="embed-responsive embed-responsive-16by9">
																				<canvas class="embed-responsive-item" id="creditPieChart">


																				</canvas>
																</div>
												</div>
								</div>


				</div>
@endsection
