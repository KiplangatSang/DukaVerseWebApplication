@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Loans </h1>
												<p>Create a Loan Item</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Loans </li>
												<li class="breadcrumb-item"><a href="#">Loan Item</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/admin/loans/store">
																@csrf
																<div class="tile">
																				<h3 class="tile-title">Fill in the form to create a Loan Item</h3>
																				<div class="tile-body">
																								<div class="form-group col">


																												<label for="exampleSelect1">Loan Name</label>
																												<input class="form-control  @error('loan_type') is-invalid @enderror" type="text"
																																placeholder="Enter the Name of the loan" name="loan_type" value="{{ old('loan_type') }}"
																																autocomplete="loan_type" required>

																												@error('loan_type')
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
																												<div class="row">
																																<div class="col col-sm-6">
																																				<label class="control-label ">Minimum Loan Range</label>
																																				<div>
																																								<input class="form-control  @error('min_loan_range') is-invalid @enderror"
																																												type="text" placeholder="Enter minimum amount loanable" name="min_loan_range"
																																												value="{{ old('min_loan_range') }}" autocomplete="min_loan_range" required>

																																								@error('min_loan_range')
																																												<span class="invalid-feedback" role="alert">
																																																<strong>{{ $message }}</strong>
																																												</span>
																																								@enderror

																																				</div>
																																</div>
																																<div class="col col-sm-6">
																																				<label class="control-label ">Maximum Loan Range</label>
																																				<div>
																																								<input class="form-control  @error('max_loan_range') is-invalid @enderror"
																																												type="text" placeholder="Enter maximum amount loanable" name="max_loan_range"
																																												value="{{ old('max_loan_range') }}" autocomplete="max_loan_range" required>

																																								@error('max_loan_range')
																																												<span class="invalid-feedback" role="alert">
																																																<strong>{{ $message }}</strong>
																																												</span>
																																								@enderror

																																				</div>
																																</div>
																												</div>



																								</div>

																								<div class="form-group col">
																												<label class="control-label ">Loan Interest Rate</label>
																												<div>
																																<input class="form-control  @error('loan_interest_rate') is-invalid @enderror" type="phone"
																																				placeholder="Enter Loan interest rate" name="loan_interest_rate"
																																				value="{{ old('loan_interest_rate') }}" autocomplete="loan_interest_rate" required>

																																@error('loan_interest_rate')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>

																								<div class="form-group col">
																												<label class="control-label ">Loan Description</label>
																												<div>
																																<textarea class="form-control  @error('loan_description') is-invalid @enderror"
																																				type="number" placeholder="Input Loan Description" name="loan_description"
																																				value="{{ old('loan_description') }}" autocomplete="loan_description"
																																				required ></textarea>

																																@error('loan_description')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																				</div>
																				<div class="tile-footer">
																								<div class="row">
																												<div class="col-md-8 col-md-offset-3">
																																<button class="btn btn-primary" type="submit"><i
																																								class="fa fa-fw fa-lg fa-check-circle"></i>Submit
																																				Loan Item</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																								class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																												</div>
																								</div>
																				</div>
																</div>



												</form>
								</div>
				</div>
@endsection
