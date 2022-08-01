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
								<div class="col-md d-flex justify-content-center">
												<div class="col-md-6 col-xl-4 item bg-light p-4  mx-3 ">
																<div class="tile-title">
																				<div class="p-2 d-flex justify-content-center">
																								<h4>
																												<Strong>Trans Id : {{ $transactiondata['transaction']->trans_id }}</Strong>
																								</h4>
																				</div>
																</div>
																<div class="tile-body ">

																</div>
												</div>
								</div>
								<div class="col-md d-flex justify-content-center">
												<div class="col-md-6 col-xl-4 item bg-light p-4  mx-3 ">
																<div class="tile-title">
																				<div class="p-2 d-flex justify-content-center">
																								<h4>
																												<Strong>Trans Id : {{ $transactiondata['transaction']->trans_id }}</Strong>
																								</h4>
																				</div>
																</div>
																<div class="tile-body ">

																</div>
												</div>
								</div>
				</div>
@endsection
