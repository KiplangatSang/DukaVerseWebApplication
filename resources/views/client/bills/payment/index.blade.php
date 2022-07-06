@extends('layouts.app')
@section('content')


				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Bills</h1>
												<p>Bills Payment </p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Bills</li>
												<li class="breadcrumb-item active"><a href="#">Bills Payment</a></li>
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

                                                    <div class="d-flex justify-content-center m-2">
                                                        <h2 class="text-display-4 tile-title text-info mx-auto">Choose a Payment Method</h2>
                                                    </div>

																<div class="clearix"></div>
																<div class="col-md container  well">
																				<form method="post" action="/request-loan/" id="loanForm">

																								@csrf

																								<div class="tile mx-auto m-3">
																												<div class="col-md-6 mx-auto">
																																<h3 class="tile-title">Mobile Bill Payment</h3>
																												</div>
																												<div class="tile-body row">
																																@foreach ($billPaymentData['thirdPartyImages']['MoneyPayments'] as $key => $value)
																																				<div class="form-group col-md-6">

																																								<a href="/bills/payment/show/{{ $key }}" class="">
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
