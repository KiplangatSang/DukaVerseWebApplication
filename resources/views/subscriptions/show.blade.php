@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="bg-info p-3 m-2">
												<h6 class="glow m-2"><i class="fa fa-fire" aria-hidden="true"></i> Lets finalize</h6>
                                                <h6 class="glow m-2"> with what is best for you.</h6>

								</div>
								<div class="row pl-4 mx-auto d-flex justify-content-center">
												<div class="subscription-box m-2">
																<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																				@csrf

																				<div class="d-flex justify-content-center text-info p-2">
																								<h6 class="display-4">Monthly Plan</h6>

																				</div>
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
																				<div class="mt-2 text-info">
																								<h4 class="control-label">Discount 0%</h4>
																								<h4 class="control-label">Save 0 ksh</h4>
																								<h4 class="control-label">Payable ksh 300</h4>
																				</div>

																				<div class=" mx-auto p-3">
																								<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed to Pay</button>

																				</div>


																</form>
												</div>
												<div class="subscription-box m-2">

																<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																				@csrf
																				<div class="d-flex justify-content-center text-success">
																								<h6 class="display-4">6 Month Plan</h6>
																				</div>
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
																				<div class="mt-2 text-success">

																								<h4 class="control-label">Discount 3%</h4>
																								<h4 class="control-label">save 300 ksh</h4>
																								<h4 class="control-label">Payable 600</h4>

																				</div>
																				<div class="row-3  mx-auto p-3">
																								<button class="form-control btn-primary mb-3" type="submit">Proceed to Pay</button>

																				</div>


																</form>
												</div>
												<div class="subscription-box m-2">
																<form class=" p-3" method="POST" action="/user/home/retails/show">
																				@csrf
																				<div class="d-flex justify-content-center text-warning">
																								<h6 class="display-4">Yearly Plan</h6>
																				</div>
																				<div class="d-flex justify-content-center">
																								<h3 class="login-head"><i class="fa fa-lg fa-fw fa fa-sun-o"></i>Gold Package</h3>
																				</div>


																				<div class="p-2 mt-2">
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Storage</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Reports</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Management</h5>
																								<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>LoanAccess</h4>
																												<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Bank Payment</h5>
																												<h5 class="control-label"><i class="fa fa-lg fa-fw fa fa-check-square-o"></i>Multiple Retails
																												</h5>

																				</div>
																				<div class="mt-2 text-warning">
																								<h4 class="control-label">Discount 3%</h4>
																								<h4 class="control-label">save 1000 ksh</h4>
																								<h4 class="control-label">Payable 3000 ksh</h4>
																				</div>

																				<div class="row-3  mx-auto p-3">
																								<button class="form-control btn-primary mt-3 mb-1 " type="submit">Proceed to Pay</button>

																				</div>


																</form>
												</div>
								</div>

				</section>
@endsection
