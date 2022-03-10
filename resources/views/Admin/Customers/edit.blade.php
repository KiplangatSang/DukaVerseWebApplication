@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Customer Registration</h1>
												<p>Register Customer</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Customer </li>
												<li class="breadcrumb-item"><a href="#">Customer</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to register a Customer</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/customers/store">

																								@csrf
																								<div class="form-group col">


																												<label for="exampleSelect1">Retail Name</label>
																												<select class="form-control @error('retail_id') is-invalid @enderror" id="exampleSelect1" name="retail_id">
																																@foreach ($custdata['Retail'] as $data)

																																				<option value="{{ $data->id }}">{{ $data->retailName }}</option>
																																@endforeach
																												</select>

																												@error('retail_id')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>

																</div>

																<div class="form-group col">


																				<label for="exampleSelect1">Customer Name</label>
																				<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																								placeholder="Enter Customer Name" name="name" value="{{ old('name') }}"
																								autocomplete="name" required>

																				@error('name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>



																<div class="form-group col">
																				<div class="form-group">
																								<label for="exampleSelect1">Role</label>
																								<select class="form-control" id="exampleSelect1" name="emp_role">
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
																				<label class="control-label ">Customer ID/Passport Number</label>
																				<div>
																								<input class="form-control  @error('ID') is-invalid @enderror" type="text"
																												placeholder="Enter Customer ID/Passport Number" name="ID" value="{{ old('ID') }}"
																												autocomplete="emp_ID" required>

																								@error('ID')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Phone Number</label>
																				<div>
																								<input class="form-control  @error('phoneno') is-invalid @enderror" type="phone"
																												placeholder="Enter Customer Phone Number" name="phoneno" value="{{ old('phoneno') }}"
																												autocomplete="phoneno" required>

																								@error('phoneno')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Email</label>
																				<div>
																								<input class="form-control  @error('email') is-invalid @enderror" type="email"
																												placeholder="Enter Customer Email" name="email" value="{{ old('email') }}"
																												autocomplete="email" required>

																								@error('email')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

                                                                <div class="form-group col">
                                                                    <label class="control-label ">Address</label>
                                                                    <div>
                                                                                    <input class="form-control  @error('address') is-invalid @enderror" type="address"
                                                                                                    placeholder="Enter Customer Address" name="address" value="{{ old('address') }}"
                                                                                                    autocomplete="address" required>

                                                                                    @error('address')
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
																												Customer</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/customers/index"><i
																																class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																				</div>
																</div>
												</div>

												</form>
								</div>
				</div>
				</div>

@endsection
