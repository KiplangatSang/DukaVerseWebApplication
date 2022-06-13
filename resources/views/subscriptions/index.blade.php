@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="bg-info text-warning p-3 m-2">
												<h6 class="display-4 glow m-2"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Get a plan today.</h6>
								</div>
								<div class="row pl-4 mx-auto d-flex justify-content-center">
												<div class="subscription-box m-2">
																<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																				@csrf

																				<div class="d-flex justify-content-center">
																								<h3 class="login-head"><i class="fa fa-lg fa-fw fa fa-circle-o-notch"></i>Free Trial</h3>
																				</div>
																				<div class="p-2 mt-2">
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Storage</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Reports</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Management</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i><Strong> 14 Day Free
																																Trial</Strong></h4>
																				</div>
																				<div class="d-flex justify-content-center mt-2">
																								<h2 class="login-head text-info"><i class="fa fa-lg fa-fw fa fa-money"></i>Price <small>Ksh</small> 0</h2>
																								<h5 class="login-head">.00</h5>
																				</div>


																				<div class="row-3  btn-bottom mx-auto p-3">
																								<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed</button>

																				</div>


																</form>
												</div>
												<div class="subscription-box silver-box m-2">
																<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																				@csrf
																				<div class="d-flex justify-content-center">
																								<h3 class="login-head"><i class="fa fa-lg fa-fw fa fa-cog"></i>Silver Package</h3>
																				</div>

																				<div class="p-2 mt-2">
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Storage</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Reports</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Management</h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i><Strong>Loan
																																Access</Strong></h4>
																								<h4 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i><Strong>Bank
																																Payment</Strong></h4>

																				</div>
																				<div class="d-flex justify-content-center mt-2">
																								<h2 class="login-head text-info"><i class="fa fa-lg fa-fw fa fa-money text-secondary"></i>Price <small>Ksh</small>350</h2>
																								<h5 class="login-head">.00<small>/Monthly</small></h5>
																				</div>
																				<div class="row-3  btn-bottom mx-auto p-3">
																								<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed</button>

																				</div>


																</form>
												</div>
												<div class="subscription-box gold-box m-2">
																<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																				@csrf
																				<div class="d-flex justify-content-center">
																								<h3 class="login-head"><i class="fa fa-lg fa-fw fa fa-sun-o"></i>Gold Package</h3>
																				</div>

																				<div class="p-2 mt-2">
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Storage</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Reports</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Management</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>LoanAccess</h4>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Bank Payment</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Multiple Retails</h5>

																				</div>
																				<div class="d-flex justify-content-center mt-1">
																								<h2 class="login-head text-info"><i class="fa fa-lg fa-fw fa fa-money text-warning"></i>Price <small>Ksh</small> 500</h2>
																								<h5 class="login-head">.00 <small>/Monthly</small></h5>

																				</div>

																				<div class="row-3  btn-bottom mx-auto p-3">
																								<button class="form-control btn-primary mt-3 mb-3 " type="submit">Proceed</button>

																				</div>


																</form>
												</div>
								</div>

				</section>
@endsection
