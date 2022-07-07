@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-dashboard"></i> DukaVerse Account</h1>
												<p>Powered by <strong>{{ env('APP_NAME') }}</strong></p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item"><a href="/home">DukaVerse</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-etsy fa-3x"></i>
																<div class="info">
																				<h4>Account Number</h4>
																				<p><b>{{ $dukaversedata['account']->account }}</b></p>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-cart-arrow-down fa-2x"></i>
																<div class="info">
																				<h4>Account Status</h4>
																				@if ($dukaversedata['account']->is_active)
																								<p><b><span class="badge badge-success">Active</span></b></p>
																				@else
																								<p><b><span class="badge badge-danger">Inactive</span></b></p>
																				@endif
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-cart-plus fa-2x"></i>
																<div class="info">
																				<h4>Account Type</h4>
																				<p><b>{{ $dukaversedata['account']->account_type ?? ' N/A ' }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-credit-card-alt fa-2x"></i>
																<div class="info">
																				<h4>Account Owner</h4>
																				<p><b>{{ $dukaversedata['account']->accountable()->first()->retail_name }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-etsy fa-3x"></i>
																<div class="info">
																				<h4>Subscription</h4>
																				@if ($dukaversedata['retail']->is_subscribed)
																								<p><b><span class="badge badge-success">Active</span></b></p>
																				@else
																								<p><b><span class="badge badge-danger">Inactive</span></b></p>
																				@endif
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-cart-arrow-down fa-2x"></i>
																<div class="info">
																				<h4>Subscription Type</h4>
																				<p><b>{{ $dukaversedata['retail']->retail_subscription }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-cart-plus fa-2x"></i>
																<div class="info">
																				<h4>Subscription Cost</h4>
																				<p><b>{{ $dukaversedata['retail']->retail_subscription_paid }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-credit-card-alt fa-2x"></i>
																<div class="info">
																				<h4>Account Subscriber</h4>
																				<p><b>{{ $dukaversedata['retail']->retail_name }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">

												<div class="widget-small primary coloured-icon"><i class="icon fa fa-etsy fa-3x"></i>
																<div class="info">
																				<h4>Loans</h4>
																				@if ($dukaversedata['retail']->is_loanable)
																								<p><b><span class="badge badge-success">Available</span></b></p>
																				@else
																								<p><b><span class="badge badge-danger">No Loans</span></b></p>
																				@endif
																</div>
												</div>

								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-cart-arrow-down fa-2x"></i>
																<div class="info">
																				<h4>Loan Access </h4>
																				@if ($dukaversedata['retail']->is_loanable)
																								<p><b><span class="badge badge-success">Accessible</span></b></p>
																				@else
																								<p><b><span class="badge badge-danger">Cannot Access</span></b></p>
																				@endif
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-cart-plus fa-2x"></i>
																<div class="info">
																				<h4>Loan Limit</h4>
																				<p><b>{{ $dukaversedata['retail']->loan_limit }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-credit-card-alt fa-2x"></i>
																<div class="info">
																				<h4>Loan Account</h4>
																				<p><b>{{ $dukaversedata['account']->account }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md col-xl">
												<div class="tile">
																<div class="tile-title">
																				Re-new Subsciption
																</div>
																<div class="tile-body">
																				<a href="/client/subscriptions/show" class="btn btn-primary">Renew subscription</a>
																</div>
												</div>
								</div>
								<div class="col-md col-xl">
												<div class="tile">
																<div class="tile-title">
																				Check Subsciptions
																</div>
																<div class="tile-body">
																				<a href="/client/subscriptions" class="btn btn-primary"> Subscriptions</a>
																</div>
												</div>
								</div>
				</div>

				<div class="row">
								<div class="col-md col-xl">
												<div class="tile">
																<div class="tile-title">
																				My Profile
																</div>
																<div class="tile-body">
																				<a href="/client/user/profile/edit/{{ auth()->id() }}" class="btn btn-secondary">Check profile</a>
																</div>
												</div>
								</div>
								<div class="col-md col-xl">
												<div class="tile">
																<div class="tile-title">
																				Retail Profile
																</div>
																<div class="tile-body">
																				<a href="/client/retails/profile" class="btn btn-secondary">Check profile</a>
																</div>
												</div>
								</div>
				</div>
				@can('view-retaildata', Auth::user())
				@endcan
@endsection
