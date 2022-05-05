@extends('Layouts.app')
@section('content')
				<div class="container-fluid ">
								<a href="#">
												<div class="  col-md-3  d-flex justify-content-center mx-auto">
																<img class="app-sidebar__user-avatar d-flex w-50" src="/storage/3rdPartyPictures/MPESA.jpg" alt="MPESA">


																<h4 class="text-diplay-4">MPESA</h4>


												</div>
								</a>
				</div>


								<form action="/payments/mpesapayments/stkpush" method="POST">
												@csrf
                                                <div class="row mt-3">
												<div class="col-xl-6 col-md-6">
																<h3 class="text-info">Terms and Conditions</h3>
																<br>
																<h4 class="text-danger">
																				Mpesa Payment Terms and Conditions. 8.1.
																</h4>
																<p class="h6">

																				The fees for the Products and Support Services are listed in the Order Form.
																				In addition to the fees listed in the Order Form,
																				Customer shall be responsible for all personal property, sales,
																				use, value-added, withholding and similar taxes (other than taxes on Axway's net income)
																				arising from the transactions described in this Agreement. Where Customer's
																				Use of the Software or receipt of Services is exempt from sales or other taxes,
																				Customer shall provide Axway with the appropriate exemption certificate.
																				All amounts payable under this Agreement shall be paid net 30 days from the invoice date,
																				unless stated otherwise in an Order Form.
																</p>

																<hr>

																<div class="form-check">


																				@if (session()->has('terms_and_conditions'))
																								<input class="form-check-input me-2 @error('terms_and_conditions') is-invalid @enderror"
																												type="checkbox" value="Accepted" id="terms_and_conditions" name="terms_and_conditions"
																												checked />

																				@else

																								<input class="form-check-input me-2 @error('terms_and_conditions') is-invalid @enderror"
																												type="checkbox" value="Accepted" id="terms_and_conditions" name="terms_and_conditions"
																												required />
																				@endif


																				<label class="h6 form-check-label mt-1 text-success" for="form2Example3g">
																								<Strong>Always accept all statements in this </Strong><a href="/terms_and_conditions"
																												class="text-body"><u>Terms of
																																service</u></a>
																				</label>

																				@error('terms_and_conditions')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

												</div>
												<div class="col-xl-6 col-md-6">
																<div class="tile mt-3 mx-auto">
																				<div class="tile-title">
																								<h3 class="text-success">MPESA Transaction</h3>
																				</div>
																				<div class="tile-body">

																								<div class="form-group">

																												<label for="phone">Phone Number</label>
																												<input type="text" name="phone" value="{{ $mpesadata['phone_number'] }}"
																																class="form-control" id="phone">
																												<label for="amount">Amount</label>
																												<input type="text" name="amount" value="{{ $mpesadata['amount'] }}" class="form-control"
																																id="amount">
																												<label for="amount">Account</label>
																												<input type="text" name="account" value="{{ $mpesadata['account'] }}" class="form-control"
																																id="account">
																								</div>
																								<button class="btn btn-primary" type="submit" id="simulate">Simulate Payments</button>

																				</div>
																</div>
												</div>

                                            </div>
                                            </form>




				<script src="{{ asset('js/app.js') }}"></script>

@endsection
