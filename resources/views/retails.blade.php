@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="retail-box " >
												<form class="form-horizontal p-3" method="POST" action="/user/home/retails/show" >
																@csrf

																<h3 class="login-head"><i class="fa fa-lg fa-fw fa-home"></i>Select Your Retail</h3>

																<select class="form-control mt-3 mb-3  @error('retail') is-invalid @enderror" name="retail" >
																				<optgroup class="form-control" label="Select your retail to login">
																								@foreach ($retails['retails'] as $retail)
																												<option class="form-control" value="{{ $retail->id }}">{{ $retail->retail_name }}</option>
																								@endforeach
																				</optgroup>
																</select>
																@error('retail')
																				<span class="invalid-feedback" role="alert">
																								<strong>{{ $message }}</strong>
																				</span>
																@enderror
																<div class="row-3  btn-bottom mx-auto p-3">
																				<button class="form-control btn-success mt-3 mb-3" type="submit">Sign In</button>

																</div>


												</form>


								</div>
				</section>
@endsection
