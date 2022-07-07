@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="bg-info p-3 m-2">
												<h6 class="glow m-2"><i class="fa fa-fire" aria-hidden="true"></i> Lets finalize</h6>
												<h6 class="glow m-2"> with what is best for you.</h6>

								</div>
								<div class="row pl-4 mx-auto d-flex justify-content-center">
												@if ($subscription->subscription_level == 1)
																@foreach ($subscription->subscription_categories as $key => $category)
																				<div class="subscription-box m-2">
																								<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																												@csrf

																												<div class="d-flex justify-content-center text-info p-2">
																																<h3>{{ $category }} Plan</h3>

																												</div>
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
																												<div class="mt-2 text-info">
																																{{ $discount = $subscription->subscription_discount[$key] ?? 0 }}
																																<h4 class="control-label">Discount {{ $discount }}%</h4>
																																<h4 class="control-label">Save
																																				{{ ($discount / 100) * $subscription->subscription_price[$key] }} ksh</h4>
																																<h4 class="control-label">Payable ksh {{ $subscription->subscription_price[$key] }}</h4>
																												</div>

																												<div class=" mx-auto p-3">
																																<button class="form-control btn-primary mt-3 mb-3" type="submit">Proceed to Pay</button>

																												</div>


																								</form>
																				</div>
																@endforeach
												@elseIf($subscription->subscription_level == 2)
																@foreach ($subscription->subscription_categories as $key => $category)
																				<div class="subscription-box m-2">
																								<form class="login-form p-3" method="POST" action="/user/home/retails/show">
																												@csrf
																												<div class="d-flex justify-content-center text-success">
																																<h3>{{ $category }} Plan</h3>
																												</div>
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
																												<div class="mt-2 text-success">
																																{{ $discount = $subscription->subscription_discount[$key] ?? 0 }}
																																<h4 class="control-label">Discount {{ $discount }}%</h4>
																																<h4 class="control-label">Save
																																				{{ ($discount / 100) * $subscription->subscription_price[$key] }} ksh</h4>
																																<h4 class="control-label">Payable ksh {{ $subscription->subscription_price[$key] }}</h4>
																												</div>
																												<div class="row-3  mx-auto p-3">
																																<button class="form-control btn-primary mb-3" type="submit">Proceed to Pay</button>

																												</div>


																								</form>
																				</div>
																@endforeach
												@elseIf($subscription->subscription_level == 3)
																@foreach ($subscription->subscription_categories as $key => $category)
																				<div class="subscription-box m-2">
																								<form class=" p-3" method="POST" action="/user/home/retails/show">
																												@csrf
																												<div class="d-flex justify-content-center text-warning">
																																<h3>{{ $category }} Plan</h3>
																												</div>
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
																												<div class="mt-2 text-warning">
																																<h4 class="control-label">Discount {{ $discount = $subscription->subscription_discount[$key] ?? 0 }}%</h4>
																																<h4 class="control-label">Save
																																				{{ ($discount / 100) * $subscription->subscription_price[$key] }} ksh</h4>
																																<h4 class="control-label">Payable ksh {{ $subscription->subscription_price[$key] }}</h4>
																												</div>

																												<div class="row-3  mx-auto p-3">
																																<button class="form-control btn-primary mt-3 mb-1 " type="submit">Proceed to Pay</button>

																												</div>


																								</form>
																				</div>
																@endforeach
												@endif



								</div>

				</section>
@endsection
