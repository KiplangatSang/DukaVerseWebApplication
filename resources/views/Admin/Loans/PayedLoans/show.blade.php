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

												{{-- @if (count($appliedLoan) < 1)

																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

																				<a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
																</div>
												@endif --}}





												<div class="tile-body well">
																<div class="clearix"></div>

																<div class="tile  m-2">
																				<div class="container row d-flex justify-content-center">
																								<div class="form-group col-md-6 ">
																												<div class="row d-flex justify-content-center">

																																<div class="col-md-6">
																																				<form method="POST"
																																								action="/admin/loans/paid/update/{{ $appliedLoan['loanapplication']->id }}"
																																								id="loanForm">

																																								@csrf
																																								<button class="btn btn-info" type='submit'>Accept Loan Request</button>
																																				</form>
																																</div>
																																<div class="col-md-6">
																																				<form method="POST"
																																								action="/admin/loans/paid/delete/{{ $appliedLoan['loanapplication']->id }}"
																																								id="loanForm">

																																								@csrf
																																								<button class="btn btn-danger" type='submit'>Delete Loan Request</button>
																																				</form>
																																</div>

																												</div>

																								</div>


																								<div class="tile-body mx-auto">
																												<div class="row d-flex justify-content-center">

																																<div class="form-group ">
																																				<div class="col-md-8">
																																								<img class="app-sidebar__user-avatar d-flex w-25"
																																												src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																												alt="{{ $appliedLoan['loan']->loan_type }}">
																																								<br>
																																								<h3 class="tile-title">{{ $appliedLoan['loan']->loan_type }} </h3>
																																				</div>

																																</div>

																												</div>

																												<div class="row mx-auto">
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Amount</strong> </label>
																																				<h5 class="text-display-6 text-danger">Ksh
																																								{{ $appliedLoan['loanapplication']->loan_amount }}
																																								</h3><br>
																																</div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Loan Status</strong></label>
																																				<h3 class="text-display-6 {{ $appliedLoan['styling']['loan_status_color'] }}">
																																								{{ $appliedLoan['loanapplication']->loan_status }}</h3>


																																</div>
																												</div>
																												<div class="row mx-auto">
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Paid Amount</strong></label>
																																				<h4 class="text-display-6 text-info">
																																								{{ $appliedLoan['loanapplication']->loan_repaid_amount }}</h4>
																																</div>
																																<div class="form-group col-md-6 mx-auto">
																																				<label class="control-label"><strong>Loan Duration</strong></label>
																																				<h4 class="text-display-6 text-info">
																																								{{ $appliedLoan['loanapplication']->loan_duration }}</h4>


																																</div>
																												</div>
																												<div class="row mx-auto">
																																<div class="form-group col-md-6 ">
																																				<label class="control-label"><strong>Loan Description</strong></label>
																																				<h6 class="text-display-6 text-info">{{ $appliedLoan['loan']->loan_description }}
																																				</h6>


																																</div>
																												</div>


																												<div class="row mx-auto">
																																<div class="form-group col-md-6">
																																				<label class="control-label"><strong>Assigned At</strong></label>
																																				<h6 class="text-display-6 text-danger">
																																								{{ $appliedLoan['loanapplication']->loan_assigned_at }}
																																				</h6>


																																</div>
																																<div class="form-group col-md-6 ">
																																				<label class="control-label"><strong>Assigned By</strong></label>
																																				<h6 class="text-display-6 text-success">
																																								{{ $appliedLoan['loanapplication']->loan_assigned_by }}
																																				</h6>


																																</div>
																												</div>
																												<div class="row mx-auto">
																																<div class="form-group col-md-6 ">
																																				<label class="control-label"><strong>Date Applied</strong></label>
																																				<h6 class="text-display-6 text-info">
																																								{{ $appliedLoan['loanapplication']->created_at }}
																																				</h6>


																																</div>
																												</div>








																								</div>

																				</div>
																</div>


												</div>


								</div>
				</div>
				</div>


				</div>
@endsection
