@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="bg-info text-warning p-3 m-2">
												<h6 class="display-4 glow m-2"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Get a plan today.</h6>
								</div>
								<div class="row pl-4 mx-auto d-flex justify-content-center">
												@foreach ($subscriptions as $subscription)
																@if ($subscription->subscription_level == 1)
																				<div class="subscription-box m-2">
																								<form class="login-form p-3" method="POST"
																												action="/client/subscriptions/show/{{ $subscription->id }}">
																												@csrf

																												<div class="d-flex justify-content-center">
																																<h3 class="login-head"><i
																																								class="fa fa-lg fa-fw fa fa-circle-o-notch"></i>{{ $subscription->subscription_name }}
																																</h3>
																												</div>
																												<div class="p-2 mt-2">
																																@foreach ($subscription->subscription_description as $item)
																																				<h4 class="control-label"><i
																																												class="fa fa-lg fa-fw fa fa-check-square-o"></i>{{ $item }}</h4>
																																@endforeach

																												</div>
																												<div class="d-flex justify-content-center mt-2">
																																<h2 class="login-head text-info"><i class="fa fa-lg fa-fw fa fa-money"></i>Price
																																				<small>Ksh</small>
																																				{{ $subscription->subscription_price['first'] }}
																																</h2>
																																<h5 class="login-head">
																																				.00<small>/{{ $subscription->subscription_duration['first'] }}</small></h5>
																												</div>


																												<div class="row-3 mx-auto p-3">
																																<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed</button>

																												</div>
																								</form>
																				</div>
																@elseIf($subscription->subscription_level == 2)
																				<div class="subscription-box silver-box m-2">
																								<form class="login-form p-3" method="POST"
																												action="/client/subscriptions/show/{{ $subscription->id }}">
																												@csrf
																												<div class="d-flex justify-content-center">
																																<h3 class="login-head"><i
																																								class="fa fa-lg fa-fw fa fa-cog"></i>{{ $subscription->subscription_name }}
																																				Package
																																</h3>
																												</div>

																												<div class="p-2 mt-2">
																																@foreach ($subscription->subscription_description as $item)
																																				<h4 class="control-label"><i
																																												class="fa fa-lg fa-fw fa fa-check-square-o"></i>{{ $item }}</h4>
																																@endforeach
																												</div>
																												<div class="d-flex justify-content-center mt-2">
																																<h2 class="login-head text-success"><i
																																								class="fa fa-lg fa-fw fa fa-money text-secondary"></i>Price
																																				<small>Ksh </small>{{ $subscription->subscription_price['first'] }}
																																</h2>
																																<h5 class="login-head">
																																				.00<small>/{{ $subscription->subscription_duration['first'] }}</small></h5>
																												</div>
																												<div class="row-3  btn-bottom mx-auto p-3">
																																<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed</button>

																												</div>
																								</form>
																				</div>
																@elseIf($subscription->subscription_level == 3)
																				<div class="subscription-box gold-box m-2">
																								<form class="login-form p-3" method="POST"
																												action="/client/subscriptions/show/{{ $subscription->id }}">
																												@csrf
																												<div class="d-flex justify-content-center">
																																<h3 class="login-head"><i
																																								class="fa fa-lg fa-fw fa fa-sun-o"></i>{{ $subscription->subscription_name }}
																																				Package</h3>
																												</div>

																												<div class="p-2 mt-2">
																																@foreach ($subscription->subscription_description as $item)
																																				<h4 class="control-label"><i
																																												class="fa fa-lg fa-fw fa fa-check-square-o"></i>{{ $item }}</h4>
																																@endforeach
																												</div>
																												<div class="d-flex justify-content-center mt-1">
																																<h2 class="login-head text-info"><i
																																								class="fa fa-lg fa-fw fa fa-money text-warning"></i>Price
																																				<small>Ksh</small> {{ $subscription->subscription_price['first'] }}
																																</h2>
																																<h5 class="login-head">.00
																																				<small>/{{ $subscription->subscription_duration['first'] }}</small>
																																</h5>
																												</div>
																												<div class="row-3  mx-auto p-3">
																																<button class="form-control btn-primary mt-3 mb-3 " type="submit">Proceed</button>
																												</div>
																								</form>
																				</div>
																@endif
												@endforeach

								</div>

				</section>
@endsection
