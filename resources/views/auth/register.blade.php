@extends('layouts.login')

@section('content')

				<div class="vh-100 bg-image "
								style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
								<div class="mask d-flex align-items-center h-100 gradient-custom-3 p-3">
												<div class="container h-100">
																<div class="row d-flex justify-content-center align-items-center h-100">
																				<div class="col-12 col-md-9 col-lg-7 col-xl-6">
																								<div class="card" style="border-radius: 15px;">
																												<div class="card-body p-5">
																																<h2 class="text-uppercase text-center mb-5">Create an account</h2>

																																<form method="POST" action="{{ route('register') }}">
                                                                                                                                    @csrf

																																				<div class="form-outline mb-4">
																																								<input type="text" id="name" class="form-control form-control-lg  @error('username') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="name" autofocus/>
																																								<label class="form-label" for="username">Your Name</label>
                                                                                                                                                                @error('username')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-4">
																																								<input type="email" id="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
																																								<label class="form-label" for="email">Your Email</label>
                                                                                                                                                                @error('email')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-4">
																																								<input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password" />
																																								<label class="form-label" for="password">Password</label>

                                                                                                                                                                @error('password')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-4">
																																								<input type="password" id="password-confirm" class="form-control form-control-lg"  name="password_confirmation" required autocomplete="new-password"/>
																																								<label class="form-label" for="password-confirm">Repeat your password</label>

																																				</div>

																																				<div class="form-check d-flex justify-content-center mb-5 row">
                                                                                                                                                    <div class="col col-sm-1">
                                                                                                                                                        <input class="form-check-input me-2 @error('termsAndConditions') is-invalid @enderror" type="checkbox" value=""
                                                                                                                                                        id="termsAndConditions" name="termsAndConditions"/>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col col-sm-11">
                                                                                                                                                       <label class="form-check-label " for="form2Example3g">
																																												I agree all statements in <a href="#!" class="text-body"><u>Terms of
																																																				service</u></a>
																																								</label>

                                                                                                                                                                @error('termsAndConditions')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
                                                                                                                                                    </div>


																																				</div>

																																				<div class="d-flex justify-content-center">
																																								<button type="submit"
																																												class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">{{ __('Register') }}</button>
																																				</div>

																																				<p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login"
																																												class="fw-bold text-body"><u>Login here</u></a></p>

																																</form>

																												</div>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
