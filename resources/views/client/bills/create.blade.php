@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Bills </h1>
												<p>Add a Bill</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Bills </li>
												<li class="breadcrumb-item"><a href="#">Add a Bill</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-xl-6">
												<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/admin/bills/store">
																@csrf
																<div class="tile">
																				<h3 class="tile-title">Fill in the form to create a Loan Item</h3>
																				<div class="tile-body">
																								<div class="form-group col">
																												<label for="billName">Bill</label>
																												<input class="form-control  @error('billName') is-invalid @enderror" type="text"
																																placeholder="Enter the Bill" name="billName" value="{{ old('billName') }}"
																																autocomplete="billName" required>

																												@error('billName')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>
																								<div class="form-group col">
																												<div class="form-group">
																																<label for="exampleSelect1">Bill Payment</label>
																																<select class="form-control" id="exampleSelect1" name="billPaymentDuration">
																																				<option value="once">Once</option>
																																				<option value="weekly">Weekly</option>
																																				<option value="monthly">Monthly</option>
																																				<option value="yearly">Yearly</option>
																																</select>
																																@error('billPaymentDuration')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																								</div>
																								<div class="form-group col">

																												<label class="control-label ">Bill amount</label>
																												<div>
																																<input class="form-control  @error('billAmount') is-invalid @enderror" type="text"
																																				placeholder="Enter  amount to be paid" name="billAmount"
																																				value="{{ old('billAmount') }}" autocomplete="billAmount" required>

																																@error('billAmount')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																												<div class="form-group">
																																<label class="control-label ">Bill Description</label>
																																<div>
																																				<textarea class="form-control  @error('billDescription') is-invalid @enderror" type="number"
																																				    placeholder="Add a description about the Bill" name="billDescription" value="{{ old('billDescription') }}"
																																				    autocomplete="billDescription" required></textarea>

																																				@error('billDescription')
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
																																								Bill</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																												class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
												</form>
								</div>
								<div class="col-md-6 col-xl-6">
												<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/admin/bills/store">
																@csrf
																<div class="tile">
																				<h3 class="tile-title">Fill in the form to create a Loan Item</h3>
																				<div class="tile-body">
																								<div class="form-group col">
																												<label for="billName">Bill</label>
																												<input class="form-control  @error('billName') is-invalid @enderror" type="text"
																																placeholder="Enter the Bill" name="billName" value="{{ old('billName') }}"
																																autocomplete="billName" required>

																												@error('billName')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>
																								<div class="form-group col">
																												<div class="form-group">
																																<label for="exampleSelect1">Bill Payment</label>
																																<select class="form-control" id="exampleSelect1" name="billPaymentDuration">
																																				<option value="once">Once</option>
																																				<option value="weekly">Weekly</option>
																																				<option value="monthly">Monthly</option>
																																				<option value="yearly">Yearly</option>
																																</select>
																																@error('billPaymentDuration')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																								</div>
																								<div class="form-group col">

																												<label class="control-label ">Bill amount</label>
																												<div>
																																<input class="form-control  @error('billAmount') is-invalid @enderror" type="text"
																																				placeholder="Enter  amount to be paid" name="billAmount"
																																				value="{{ old('billAmount') }}" autocomplete="billAmount" required>

																																@error('billAmount')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																												<div class="form-group">
																																<label class="control-label ">Bill Description</label>
																																<div>
																																				<textarea class="form-control  @error('billDescription') is-invalid @enderror" type="number"
																																				    placeholder="Add a description about the Bill" name="billDescription" value="{{ old('billDescription') }}"
																																				    autocomplete="billDescription" required></textarea>

																																				@error('billDescription')
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
																																								Bill</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																												class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
												</form>
								</div>
				</div>
@endsection
