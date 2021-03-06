@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Transactions Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Transactions Item</p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Transactions</li>
												<li class="breadcrumb-item active"><a href="#">Transactions Table</a></li>
								</ul>
				</div>

				<div class="row">
								<div class="col-md-12 d-flex justify-content-center">
												<div class="col-md-6 col-xl-4 item bg-light p-4  mx-3 ">
																<div class="tile-title">
																				<div class="p-2 d-flex justify-content-center">
																								<h4>
																												<Strong>Trans Id : {{ $transactiondata['transaction']->trans_id }}</Strong>
																								</h4>
																				</div>
																</div>
																<div class="tile-body ">
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Gateway : {{ $transactiondata['transaction']->gateway }}</Strong>
																								</p>
																				</div>
																				<div class="d-flex justify-content-center">
																								<p>
																												<Strong>Amount
																																: {{ $transactiondata['transaction']->amount . ' ' . $transactiondata['transaction']->currency }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Cost
																																: {{ $transactiondata['transaction']->cost . ' ' . $transactiondata['transaction']->currency }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Total
																																: {{ $transactiondata['transaction']->total_amount . ' ' . $transactiondata['transaction']->currency }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Account : {{ $transactiondata['transaction']->party_A ?? 'N/A' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Receiver Party : {{ $transactiondata['transaction']->party_B ?? 'N/A' }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Purpose : {{ $transactiondata['transaction']->purpose }}</Strong>
																								</p>
																				</div>
																				<div class="p-2 d-flex justify-content-center">
																								<p>
																												<Strong>Date : {{ $transactiondata['transaction']->created_at }}</Strong>
																								</p>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
