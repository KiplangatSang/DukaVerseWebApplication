@extends('layouts.loanslayout')
@section('content')


				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Loans</h1>
												<p>Loans available for you</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Loans</li>
												<li class="breadcrumb-item active"><a href="#">Loans View</a></li>
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

												@if (count($loans) < 1)

																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

                                                                                <a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
                                                                            </div>
												@endif



												@foreach ($loans as $loan)
																<div class="tile-body">
																				<div class="clearix"></div>
																				<div class="col-md-12">

																								<form method="GET" action="/request-loan/" id="loanForm">

																												@csrf

																												<div class="tile ">
																																<h3 class="tile-title">{{ $loan->loan_type }} </h3>
																																<div class="tile-body row">




																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Loan Type</strong></label>
																																								<img class="app-sidebar__user-avatar d-flex w-25"
																																												src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																												alt="{{ $loan->loan_type }}">

																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Amount</strong> </label>
																																								<h5 class="text-display-6 text-danger">Ksh {{ $loan->min_loan_range }} to <br>
                                                                                                                                                                    Ksh {{ $loan->max_loan_range }}</h3>
																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Loan Description</strong></label>
																																								<h6 class="text-display-6 text-info">{{ $loan->loan_description }}</h3>
																																												<h6 class="text-display-6 text-danger">Applicable after 6 months of actively
																																																using Storm5.</h3>

																																				</div>
																																				<div class="form-group col-md-3 align-self-end">

																																								<a class="btn btn-info" href="#" id="loanAmountAlert"
																																												onclick="submitform(@json($loan->id),@json($loan->min_loan_range),@json($loan->max_loan_range))">Apply
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
