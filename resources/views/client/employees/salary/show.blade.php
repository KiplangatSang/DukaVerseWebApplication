@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Salaries Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Salary Item</p>
																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Salaries</li>
												<li class="breadcrumb-item active"><a href="#">Salaries Table</a></li>
								</ul>
				</div>

				<div class="row">
								<div class="col-md-12 d-flex justify-content-center">
												<div class="col-md-6 col-xl-4 item bg-light p-4  mx-3 ">
																<div class="tile-title">
																				<div class="p-2 d-flex justify-content-center">
																								<h4>
																												<Strong>Employee Id : {{ $empdata['employees']->id }}</Strong>
																								</h4>
																				</div>
																</div>
																<div class="tile-body ">
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Employee Name : {{ $empdata['employees']->emp_name }}</Strong>
																								</p>
																				</div>
																				<div class="d-flex justify-content-center">
																								<p>
																												<Strong>Amount
																																:
																																{{ $empdata->amount . ' Ksh ' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Deductions
																																:
																																{{ $empdata->deductions . ' Ksh ' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Paid Amount
																																:
																																{{ $empdata->total_payable . ' ksh' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Account : {{ $empdata->account->account ?? 'N/A' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Paid By : {{ $empdata->salaryPayer->username ?? 'N/A' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Comment : {{ $empdata->comment }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Month :
																																{{ $empdata['created_at']->format('M') . ' ' . $empdata['created_at']->format('Y') }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Date : {{ $empdata->created_at }}</Strong>
																								</p>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
