@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Employee Payment</h1>
												<p>Pay Employee</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Employees </li>
												<li class="breadcrumb-item"><a href="#">Salary Payment</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-xl-8 mx-auto">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to register a Employee</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data"
																								action="/client/employee/salary/store/{{ $empdata->id }}">

																								@csrf
																								<div class="row">
																												<div class="form-group col">


																																<label for="exampleSelect1">Employee Name</label>
																																<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																																				placeholder="Enter Employee's Name" name="emp_name" value="{{ $empdata->emp_name }}"
																																				disabled>
																												</div>
																												<div class="form-group col">
																																<label class="control-label ">Employee ID/Passport Number</label>
																																<div>
																																				<input class="form-control  @error('emp_ID') is-invalid @enderror" type="text"
																																								placeholder="Enter Employee ID/Passport Number" name="emp_ID"
																																								value="{{ $empdata->emp_ID }}" autocomplete="emp_ID" disabled>

																																				@error('emp_ID')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																								</div>
																								<div class="row">
																												<div class="form-group col">
																																<label class="control-label ">Phone Number</label>
																																<div>
																																				<input class="form-control  @error('id') is-invalid @enderror" type="phone"
																																								placeholder="Enter Employee Phone Number" name="id"
																																								value="{{ $empdata->id }}" autocomplete="id" required disabled>

																																				@error('id')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																												<div class="form-group col">
																																<label class="control-label ">Phone Number</label>
																																<div>
																																				<input class="form-control  @error('emp_phoneno') is-invalid @enderror" type="phone"
																																								placeholder="Enter Employee Phone Number" name="emp_phoneno"
																																								value="{{ $empdata->emp_phoneno }}" autocomplete="emp_phoneno" required>

																																				@error('emp_phoneno')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																								</div>
																								<hr>
																								<div class="form-group col">
																												<label class="control-label ">Salary</label>
																												<div>
																																<input class="form-control  @error('emp_salary') is-invalid @enderror" type="Number"
																																				placeholder="Enter Employee Salary" name="emp_salary"
																																				value="{{ $empdata->emp_salary }}" autocomplete="emp_salary" required>

																																@error('emp_salary')
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
																								<div class="col-md-8 col-md-offset-3 mx-auto">
																												<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Pay
																																Employee</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary"
																																href="/client/employee/salary/store"><i
																																				class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																								</div>
																				</div>
																</div>

																</form>
												</div>
								</div>
				</div>
@endsection
