@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i> Add an Item You Sold</h1>
												<p>Sold Items Registration</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item"><a href="#">Add Sales</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">

												<div class="tile">
																<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/create-sales-item">
																				@csrf
																				<h3 class="tile-title">Sales Items</h3>
																				<div class="tile-body">
																								<div class="form-group row">
																												<label class="control-label col-md-3">Item Name</label>
																												<div class="col-md-8">
																																<input class="form-control  @error('itemName') is-invalid @enderror" id="itemName"
																																				name="itemName" type="text" placeholder="Enter sold item's name">

																																@error('itemName')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Amount</label>
																												<div class="col-md-8">
																																<input class="form-control col-md-8  @error('itemAmount') is-invalid @enderror"
																																				id="itemAmount" name="itemAmount" type="number" placeholder="Enter amount sold">

																																@error('itemAmount')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Price</label>
																												<div class="col-md-8">
																																<input class="form-control col-md-8  @error('price') is-invalid @enderror" id="price"
																																				name="price" type="number" placeholder="Enter the price per item">

																																@error('price')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Description</label>
																												<div class="col-md-8">
																																<input class="form-control   @error('description') is-invalid @enderror" id="description"
																																				name="description" type="text" placeholder="Describe the item">

																																@error('description')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Sales </label>
																												<div class="col-md-6">
																																<div class="form-check p-2">
																																				<label class="form-check-label">
																																								<input class="form-check-input  @error('endDate') is-invalid @enderror"
																																												id="endDate"" type=" radio" name="gender">Show on sale right away
																																				</label>
																																</div>
																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Display</label>
																												<div class="col-md-6">
																																<div class="form-check p-2">
																																				<label class="form-check-label">
																																								<input class="form-check-input  @error('endDate') is-invalid @enderror "
																																												id="endDate" type="radio" name="gender">Show on Storm5.com
																																				</label>
																																</div>
																												</div>
																								</div>
																								<div class="form-group row ">
																												<label class="control-label col-md-3 ">Identity Proof</label>
																												<div class="col-md-8">
																																<input class="form-control  @error('itemImage') is-invalid @enderror" id="itemImage"
																																				type="file" name="itemImage">

																																@error('itemImage')
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
																																								class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>

																												</div>
																								</div>
																				</div>
																</form>

												</div>
								</div>
				</div>
@endsection
