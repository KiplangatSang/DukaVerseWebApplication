@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Profile </h1>
												<p>User Profile</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Users </li>
												<li class="breadcrumb-item"><a href="#">Profile</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to Update Your details</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/admin/profile/user/update/{{$empdata['Storm5Employees']->id}}">

																								@csrf

                                                                                                <div class="col-md-6">
                                                                                                    <img class="app-sidebar__user-avatar d-flex w-25"
                                                                                                                    src="/storage/Profiles/{{ $empdata['Storm5Employees']->emp_profileImage ?? 'noprofile.png' }}"
                                                                                                                    alt="{{ $empdata['Storm5Employees']->empName }}">
                                                                                    </div>

																</div>

																<div class="form-group col">


																				<label for="exampleSelect1"> Name </label>
																				<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																								placeholder="Enter Employee Name" name="emp_name" value="{{ $empdata['Storm5Employees']->empName }}"
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
																								<select class="form-control" id="exampleSelect1" name="emp_role" value="{{$empdata['Storm5Employees']->empRole}}">
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
																				<label class="control-label ">Employee ID/Passport Number</label>
																				<div>
																								<input class="form-control  @error('emp_ID') is-invalid @enderror" type="text"
																												placeholder="Enter Employee ID/Passport Number" name="emp_ID" value="{{ $empdata['Storm5Employees']->empNationalId}}"
																												autocomplete="emp_ID" required>

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
																												placeholder="Enter Employee Phone Number" name="emp_phoneno" value="{{$empdata['Storm5Employees']->empPhoneno }}"
																												autocomplete="emp_phoneno" required>

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
																												placeholder="Enter Employee Email" name="emp_email" value="{{$empdata['Storm5Employees']->empEmail }}"
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
																												placeholder="Enter Employee Salary" name="emp_salary" value="{{ $empdata['Storm5Employees']->salary}}"
																												autocomplete="emp_salary" required>

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
																								<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register
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
