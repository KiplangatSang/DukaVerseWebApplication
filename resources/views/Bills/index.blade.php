@extends('layouts.loanslayout')
@section('content')


				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Bills</h1>
												<p>Bills due for Payment</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Bills</li>
												<li class="breadcrumb-item active"><a href="#">Bills View</a></li>
								</ul>
				</div>
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

								<div class="col-md-12">

												@if (count($billsdata) < 1)

																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

                                                                                <a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
                                                                            </div>
												@endif



												@foreach ($billsdata['billslist'] as $bill)
																<div class="tile-body">
																				<div class="clearix"></div>
																				<div class="col-md-12">

																								<form method="GET" action="/request-loan/" id="loanForm">

																												@csrf

																												<div class="tile ">
																																<h3 class="tile-title">{{ $bill->billName }} </h3>
																																<div class="tile-body row">




																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Bill Type</strong></label>
																																								<img class="app-sidebar__user-avatar d-flex w-25"
																																												src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																												alt="{{ $bill->billName }}">

																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Amount</strong> </label>
																																								<h5 class="text-display-6 text-danger">Ksh {{ $bill->billAmount }}  <br>
                                                                                                                                                                   </h3>
																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Bill Description</strong></label>
																																								<h6 class="text-display-6 text-info">{{ $bill->billDescription }}</h6>


																																				</div>
																																				<div class="form-group col-md-3 align-self-end">

																																								<a class="btn btn-info" href="#" id="loanAmountAlert"
																																												onclick="submitform(@json($bill->id),@json($bill->min_loan_range),@json($bill->max_loan_range))">Pay
																																												Now</a>


																																				</div>



																																</div>
																								</form>
																				</div>
																</div>

								</div>
								@endforeach

				</div>
				</div>
				</div>


				</div>

@endsection
