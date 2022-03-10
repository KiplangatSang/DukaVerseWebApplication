@extends('Admin.Layouts.app')
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

												@if (count($loansdata) < 1)

																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

																				<a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
																</div>
												@endif





												<div class="tile-body">
																<div class="clearix"></div>
																<div class="col-md container align-self-center well">

																				<form method="GET" action="/request-loan/" id="loanForm">

																								@csrf

																								<div class="tile mx-auto m-3">
																												<div class="form-group col-md-6 mx-auto">

																																<a class="btn btn-info" href="/admin/loans/edit/{{$loansdata['loan']->id}}" id="loanAmountAlert">Edit Loan
																																			</a>


																												</div>
																												<div class="col-md-6 mx-auto">
																																<h3 class="tile-title">{{ $loansdata['loan']->loan_type  }} </h3>
																												</div>

																												<div class="tile-body ">




																																<div class="form-group col-md-6 mx-auto">

																																				<div class="col-md-6">
																																								<img class="app-sidebar__user-avatar d-flex w-25"
																																												src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																												alt="{{ $loansdata['loan']->loan_type }}">
																																				</div>

																																</div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Amount</strong> </label>
																																				<h5 class="text-display-6 text-danger">Ksh {{  $loansdata['loan']->min_loan_range }} to
                                                                                                                                                    Ksh {{  $loansdata['loan']->max_loan_range }}</h3>
                                                                                                                                                    <br>
																																</div>
                                                                                                                                <div class="form-group col-md-6 mx-auto">
                                                                                                                                    <label class="control-label"><strong>Interest Rate</strong> </label>
                                                                                                                                    <h5 class="text-display-6 text-danger"> {{  $loansdata['loan']->loan_interest_rate }} %
                                                                                                                                        </h3>
                                                                                                                                        <br>
                                                                                                                    </div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Loan Description</strong></label>
																																				<h6 class="text-display-6 text-info">{{  $loansdata['loan']->loan_description }}</h3>
                                                                                                                                                    <h6 class="text-display-6 text-danger">Applicable after 6 months of actively
                                                                                                                                                                    using Storm5.</h6>


																																</div>



																																</div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Date created</strong></label>
																																				<h6 class="text-display-6 text-info">{{ $loansdata['loan']->created_at }}
																																								</h6>


																																</div>


																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Updated At</strong></label>
																																				<h6 class="text-display-6 text-info">
																																								{{ $loansdata['loan']->updated_at }}
																																				</h6>


																																</div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Added By</strong></label>
																																				<h6 class="text-display-6 text-info">
																																								{{ $loansdata['user']->username }}
																																				</h6>


																																</div>




																												</div>
																				</form>
																</div>
												</div>

								</div>


				</div>
				</div>
				</div>


				</div>

@endsection
