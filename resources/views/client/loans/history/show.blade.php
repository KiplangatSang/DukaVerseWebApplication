@extends('layouts.app')
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
								<div class="col-md-12">

												{{-- @if (count($appliedLoan) < 1)
																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

																				<a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
																</div>
												@endif --}}
												<div class="tile-body">
																<div class="clearix"></div>
																<div class="col-md container align-self-center well">

																				<form method="GET" action="/request-loan/" id="loanForm">

																								@csrf

																								<div class="tile mx-auto m-3 row">
																												<div class="col-md-6 mx-auto">
																																<h3 class="tile-title">{{ $appliedLoan['loan']->loan_type }} </h3>
																												</div>
																												<div class="form-group col-md-6 ">

																																<a class="btn btn-info float-right" href="/client/loans/pay/{{ $appliedLoan->id }}"
																																				id="loanAmountAlert">Pay
																																				this Loan
																																				Now</a>
																												</div>


																												<div class="tile-body ">
																																<div class="row well">
																																				<div class="col-md col-xl  m-2 p-2">
																																								<div class="col-md-6">
																																												<img class="app-sidebar__user-avatar d-flex w-50"
																																																src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																																alt="{{ $appliedLoan['loan']->loan_type }}">
																																								</div>
																																				</div>
																																				<div class="col-md col-xl  m-2 p-2">
																																								<label class="control-label"><strong>Amount</strong> </label>
																																								<h5 class="text-display-6 text-danger">Ksh
																																												{{ $appliedLoan->loan_amount }}
																																												</h3><br>
																																				</div>
																																				<div class="col-md col-xl m-2 p-2">
																																								<label class="control-label"><strong>Paid Amount</strong></label>
																																								<h4 class="text-display-6 text-info">
																																												{{ $appliedLoan->loan_repaid_amount }}</h4>
																																				</div>
																																				<div class="col-md col-xl  m-2 p-2 ">

																																								<label class="control-label"><strong>Loan Status</strong></label>
																																								@if ($appliedLoan->loan_status == '-1')
																																												<h5><span class="badge badge-warning">Sent</span></h5>
																																								@elseIf ($appliedLoan->loan_status == '0')
																																												<h5><span class="badge badge-info">Accepted</span></h5>
																																								@elseIf ($appliedLoan->loan_status == '1')
																																												<h5><span class="badge badge-dark">Processed</span></h5>
																																								@elseIf ($appliedLoan->loan_status == '-2')
																																												<h5><span class="badge badge-danger">Rejected</span></h5>
																																								@elseIf ($appliedLoan->loan_status == '2')
																																												<h5><span class="badge badge-success">Disbursed</span></h5>
																																								@else
																																												{{ $appliedLoan->loan_status }}
																																								@endif
																																				</div>
																																</div>
																																<div class="row well">
																																				<div class="col">
																																								<div class="row">
																																												<div class="col-md col-xl  m-2 p-2">
																																																<label class="control-label"><strong>Loan Duration</strong></label>
																																																<h4 class="text-display-6 text-info">
																																																				{{ $appliedLoan->loan_duration }} Months</h4>
																																												</div>
																																												<div class="col-md col-xl  m-2 p-2">
																																																<label class="control-label"><strong>Date Applied</strong></label>
																																																<h6 class="text-display-6 text-info">
																																																				{{ $appliedLoan->created_at->format('D')." " .$appliedLoan->created_at->day."th ".$appliedLoan->created_at->format('M Y  H:II') . ' hrs'}}
																																																</h6>
																																												</div>
																																								</div>
																																				</div>
																																				<div class="col">
																																								<div class="row">
																																												<div class="col-md col-xl  m-2 p-2">
																																																<label class="control-label"><strong>Served By</strong></label>
																																																<h6 class="text-display-6 text-info">
																																																				{{ $appliedLoan->loan_assigned_by }}
																																																</h6>
																																												</div>
																																												<div class="col-md col-xl  m-2 p-2">
																																																<label class="control-label"><strong>Assigned At</strong></label>
																																																<h6 class="text-display-6 text-info">
																																																				{{ $appliedLoan->loan_assigned_at }}
                                                                                                                                                                                                                {{-- {{$appliedLoan->loan_assigned_at->format('D')." " .$appliedLoan->loan_assigned_at->day."th ".$appliedLoan->loan_assigned_at->format('M Y  H:II') . ' hrs'}} --}}
																																																</h6>
																																												</div>
																																								</div>
																																				</div>
																																</div>
																																<div class="row well">
																																				<div class="form-group col-md-6 col-xl-6  ">
																																								<label class="control-label"><strong>Loan Description</strong></label>
																																								<h6 class="text-display-6 text-info">{{ $appliedLoan['loan']->loan_description }}
																																												</h3>
																																												<h6 class="text-display-6 text-danger">Applicable after 6 months of actively
																																																using Storm5.</h3>

																																				</div>
																																</div>
																												</div>


																								</div>
																				</form>
																</div>
												</div>

								</div>


				</div>
@endsection
