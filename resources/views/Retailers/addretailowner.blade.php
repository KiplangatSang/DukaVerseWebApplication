@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Retail Owner Registration</h1>
												<p>Register Another Retail Owner</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Retails </li>
												<li class="breadcrumb-item"><a href="#">Add A Retail Owner</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to register a retail co-owner</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/register/add-retail">

																								@csrf
																								<div class="form-group col">
																												<label class="control-label ">Retail Name</label>
																												<div>
																																<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																																				placeholder="Enter the name of your shop" name="retailName"
																																				value="{{ old('retailName') }}" autocomplete="retailName" required>

																																@error('retailName')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>

																								<div class="form-group col">
																												<label class="control-label ">Retail Owner Name</label>
																												<div>
																																<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																																				placeholder="Enter the name of your shop" name="retailName"
																																				value="{{ old('retailName') }}" autocomplete="retailName" required>

																																@error('retailName')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>

																								<div class="form-group col">
																												<label class="control-label ">Retail Owner ID/Passport Number</label>
																												<div>
																																<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																																				placeholder="Enter the name of your shop" name="retailName"
																																				value="{{ old('retailName') }}" autocomplete="retailName" required>

																																@error('retailName')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>

																								<div class="form-group col">
																												<label class="control-label ">Phone Number</label>
																												<div>
																																<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																																				placeholder="Enter the name of your shop" name="retailName"
																																				value="{{ old('retailName') }}" autocomplete="retailName" required>

																																@error('retailName')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>

																								<div class="form-group col">
																									<label class="control-label "> Role</label>
																									<div>
																													<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																																	placeholder="Enter the name of your shop" name="retailName"
																																	value="{{ old('retailName') }}" autocomplete="retailName" required>

																													@error('retailName')
																																	<span class="invalid-feedback" role="alert">
																																					<strong>{{ $message }}</strong>
																																	</span>
																													@enderror

																									</div>
																					</div>


																</div>


																<hr>

																<div class="tile-footer">
																				<div class="row">
																								<div class="col-md-8 col-md-offset-3">
																												<button class="btn btn-primary" type="submit"><i
																																				class="fa fa-fw fa-lg fa-check-circle"></i>Register
																																Retail</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																				class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																								</div>
																				</div>
																</div>

																</form>
												</div>
								</div>
				</div>

@endsection
