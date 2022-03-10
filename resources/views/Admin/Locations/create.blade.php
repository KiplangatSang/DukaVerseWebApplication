@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Area Code Registration</h1>
												<p>Register a new Location</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Area </li>
												<li class="breadcrumb-item"><a href="#">Locations</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to add a new Location</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/employees/create-new-emp">

																								@csrf
																								<div class="form-group col">


																												<label for="exampleSelect1">Country</label>
																												<select class="form-control" id="exampleSelect1" name="country">
																																@foreach ($locationdata['country'] as $data)

																																				<option value="{{ $data->id }}">{{ $data->retailName }}</option>
																																@endforeach
																												</select>

																												@error('country')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>

																</div>

																<div class="form-group col">


																				<label for="exampleSelect1">County Name</label>
																				<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																								placeholder="Enter Employee Name" name="emp_name" value="{{ old('emp_name') }}"
																								autocomplete="emp_name" required>

																				@error('emp_name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>






																<div class="form-group col">
																				<label class="control-label ">Constituency</label>
																				<div>
																								<input class="form-control  @error('emp_ID') is-invalid @enderror" type="text"
																												placeholder="Enter Employee ID/Passport Number" name="emp_ID" value="{{ old('emp_ID') }}"
																												autocomplete="emp_ID" required>

																								@error('emp_ID')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Town</label>
																				<div>
																								<input class="form-control  @error('emp_phoneno') is-invalid @enderror" type="phone"
																												placeholder="Enter Employee Phone Number" name="emp_phoneno" value="{{ old('emp_phoneno') }}"
																												autocomplete="emp_phoneno" required>

																								@error('emp_phoneno')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Office Location</label>
																				<div>
																								<input class="form-control  @error('emp_email') is-invalid @enderror" type="email"
																												placeholder="Enter Employee Email" name="emp_email" value="{{ old('emp_email') }}"
																												autocomplete="emp_email" required>

																								@error('emp_email')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>


																<hr>

												</div>


												<hr>

												<div class="tile-footer">
																<div class="row">
																				<div class="col-md-8 col-md-offset-3">
																								<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register
																												Area</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																				</div>
																</div>
												</div>

												</form>
								</div>
				</div>
				</div>

@endsection
