@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="col-md-6 col-xl-6">
												<div class="tile row d-flex justify-content-center p-5">
																Update My Profile
																<div class="ml-4">
																				<a class="btn btn-primary" href="/client/user/profile/edit/{{ $retail->id }}">Update</a>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-xl-6">
												<div class="tile row d-flex justify-content-center p-5">
																Update Retail Profile
																<div class="ml-4">
																				<a class="btn btn-primary" href="/client/retails/profile/edit/{{ $retail->id }}">Update</a>
																</div>
												</div>

								</div>
								<div class="col-md-6 col-xl-6">

								</div>
				</section>
@endsection
