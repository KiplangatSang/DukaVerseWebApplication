@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Employee Registration</h1>
												<p>Register Employee</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Employees </li>
												<li class="breadcrumb-item"><a href="#">Employee</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to register a Employee</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data"
																								action="/client/employee/update/{{ $empdata['emp']->id }}">
																								@csrf
																								<div class="form-group col d-flex justify-content-center">

																												<label class="display-4"> {{ $data['retail']->retail_name }} Shop</label>
																								</div>
																</div>

																<div class="form-group col">


																				<label for="exampleSelect1">Employee Name</label>
																				<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																								placeholder="Enter Employee Name" name="emp_name" value="{{ $empdata['emp']->emp_name }}"
																								autocomplete="emp_name" required>

																				@error('emp_name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>



																<div class="form-group col">
																				<div class="form-group">
																								<label for="exampleSelect1">Role</label>
																								<select class="form-control" id="exampleSelect1" name="emp_role">
																												<option value="{{ $empdata['emp']->emp_role }}" selected>{{ $empdata['emp']->emp_role }}
																												</option>
																												<option value="Sales">Sales</option>
																												<option value="Managerial">Managerial</option>
																												<option value="Accounts">Account</option>
																								</select>
																								@error('emp_role')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																</div>



																<div class="form-group col">
																				<label class="control-label ">Emplo;yee ID/Passport Number</label>
																				<div>
																								<input class="form-control  @error('emp_ID') is-invalid @enderror" type="text"
																												placeholder="Enter Employee ID/Passport Number" name="emp_ID"
																												value="{{ $empdata['emp']->emp_ID }}" autocomplete="emp_ID" required>

																								@error('emp_ID')
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
																												value="{{ $empdata['emp']->emp_phoneno }}" autocomplete="emp_phoneno" required>

																								@error('emp_phoneno')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Email</label>
																				<div>
																								<input class="form-control  @error('emp_email') is-invalid @enderror" type="email"
																												placeholder="Enter Employee Email" name="emp_email" value="{{ $empdata['emp']->emp_email }}"
																												autocomplete="emp_email" required>

																								@error('emp_email')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>


																<hr>

																<div class="form-group col">
																				<label class="control-label ">Salary</label>
																				<div>
																								<input class="form-control  @error('emp_salary') is-invalid @enderror" type="Number"
																												placeholder="Enter Employee Salary" name="emp_salary"
																												value="{{ $empdata['emp']->emp_salary }}" autocomplete="emp_salary" required>

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
																				<div class="col-md-8 col-md-offset-3">
																								<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
																												Employee</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																				</div>
																</div>
												</div>

												</form>
								</div>
				</div>
				</div>
@endsection
