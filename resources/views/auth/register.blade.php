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

																																				<div class="form-outline mb-2">
																																								<input type="text" id="name" class="form-control form-control-lg  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus/>
																																								<label class="form-label" for="username">Your Name</label>
                                                                                                                                                                @error('username')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-2">
																																								<input type="email" id="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
																																								<label class="form-label" for="email">Your Email</label>
                                                                                                                                                                @error('email')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-2">
																																								<input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password" />
																																								<label class="form-label" for="password">Password</label>

                                                                                                                                                                @error('password')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror
																																				</div>

																																				<div class="form-outline mb-2">
																																								<input type="password" id="password-confirm" class="form-control form-control-lg"  name="password_confirmation" required autocomplete="new-password"/>
																																								<label class="form-label" for="password-confirm">Repeat your password</label>

																																				</div>

																																				<div class="form-check">


                                                                                                                                                    @if (session()->has('terms_and_conditions'))

                                                                                                                                                    <input class="form-check-input me-2 @error('terms_and_conditions') is-invalid @enderror" type="checkbox" value="Accepted"
                                                                                                                                                    id="terms_and_conditions" name="terms_and_conditions"  checked/>

                                                                                                                                                    @else

                                                                                                                                                    <input class="form-check-input me-2 @error('terms_and_conditions') is-invalid @enderror" type="checkbox" value="Accepted"
                                                                                                                                                    id="terms_and_conditions" name="terms_and_conditions" />

                                                                                                                                                    @endif


                                                                                                                                                       <label class="form-check-label mt-1" for="form2Example3g">
																																												I agree all statements in <a href="/terms_and_conditions" class="text-body"><u>Terms of
																																																				service</u></a>
																																								</label>

                                                                                                                                                                @error('terms_and_conditions')
                                                                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @enderror

																																				</div>

																																				<div class="d-flex justify-content-center mt-2">
																																								<button type ="submit"
																																												class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">{{ __('Register') }}</button>
																																				</div>

																																				<p class="text-center text-muted mt-2">Have already an account? <a href="/login"
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
