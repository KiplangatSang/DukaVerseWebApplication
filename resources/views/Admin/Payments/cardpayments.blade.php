@extends('Admin.Layouts.app')
@section('content')
				<div class="container mt-5 px-5">
								<div class="mb-4">
												<h2>Confirm order and pay</h2> <span>please make the payment, after that you can enjoy all the features and
																benefits.</span>
								</div>
								<div class="row">
												<div class="col-md-8">
																<form action="/stripe" method="POST">
																				@csrf

																				<div class="card p-3">
																								<h6 class="text-uppercase">Payment details</h6>
																								<div class="inputbox mt-3"> <input type="text" name="name" class="form-control"
																																required="required">
																												<span>Name on card</span>
																								</div>
																								<div class="row">
																												<div class="col-md-6">
																																<div class="inputbox mt-3 mr-2"> <input type="number" name="card_number mt-2"
																																								class="form-control" required="required"> <i class="fa fa-credit-card"></i>
																																				<span>Card
																																								Number</span> </div>
																												</div>
																												<div class="col-md-6">
																																<div class="d-flex flex-row">
																																				<div class="inputbox mt-3 mr-2">
																																								<input type="date" name="card_expiry" class="form-control mt-2" required="required">
																																								<span>Expiry </span>
																																				</div>
																																				<div class="inputbox mt-3 mr-2">
																																								<input type="number" name="card_cvv" class="form-control mt-2" required="required">
																																								<span>CVV</span>
																																				</div>
																																</div>
																												</div>
																								</div>
																								<div class="mt-4 mb-4">
																												<h6 class="text-uppercase">Billing Address</h6>
																												<div class="row mt-3">
																																<div class="col-md-6">
																																				<div class="inputbox mt-3 mr-2"> <input type="text" name="address"
																																												class="form-control" required="required"> <span>Street Address</span> </div>
																																</div>
																																<div class="col-md-6">
																																				<div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control"
																																												required="required"> <span>City</span> </div>
																																</div>
																												</div>
																												<div class="row mt-2">
																																<div class="col-md-6">
																																				<div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control"
																																												required="required"> <span>State/Province</span> </div>
																																</div>
																																<div class="col-md-6">
																																				<div class="inputbox mt-3 mr-2"> <input type="text" name="zip_code"
																																												class="form-control" required="required"> <span>Zip code</span> </div>
																																</div>
																												</div>
																								</div>
																				</div>
																				<div class="mt-4 mb-4 d-flex justify-content-between"> <span>Previous step</span> <button
																												class="btn btn-success px-3">Pay {{ $paymentdata['amount'] }}</button>
																				</div>

																</form>
												</div>
												<div class="col-md-4">
																<div class="card card-blue p-3 text-white mb-3"> <span>You have to pay</span>
																				<div class="d-flex flex-row align-items-end mb-3">
																								<h1 class="mb-0 yellow">{{ $paymentdata['amount'] }}</h1> <span>.99</span>
																				</div> <span>Enjoy all the features and perk after you complete the payment</span> <a href="#"
																								class="yellow decoration">Know all the features</a>
																				<div class="hightlight"> <span>100% Guaranteed support and update for the next 5 years.</span>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
