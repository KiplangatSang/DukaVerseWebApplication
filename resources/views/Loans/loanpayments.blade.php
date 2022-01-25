@extends('layouts.loanslayout')
@section('content')


				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Loans</h1>
												<p>Loans Payment Methods</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Loans</li>
												<li class="breadcrumb-item active"><a href="#">Loans Payments</a></li>
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







												<div class="tile-body">
																<div class="clearix"></div>
																<div class="col-md container align-self-center well">

																				<form method="GET" action="/request-loan/" id="loanForm">

																								@csrf

																								<div class="tile mx-auto m-3">
																												<div class="col-md-6 mx-auto">
																																<h3 class="tile-title"></h3>
																												</div>
																												<div class="tile-body row">
																																@foreach ($loanPaymentData['thirdPartyImages']['MoneyPayments'] as $key => $value)
																																				<div class="form-group col-md-6">

																																								<a href="/home">
																																												<div class=" tile col-md-6  d-flex justify-content-center">
																																																<img class="app-sidebar__user-avatar d-flex w-50" src="{{ $value }}"
																																																				alt="{{ $key }}">


																																																<h4 class="text-diplay-4">{{ $key }}</h4>


																																												</div>
																																								</a>

																																				</div>

																																@endforeach
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
