@extends('layouts.login')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Retail Registration</h1>
												<p>Register Your Retail Shop</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Retails</li>
												<li class="breadcrumb-item"><a href="#">Add A Retail Shop</a></li>
								</ul>
				</div>
				<div class="container">

								<div class="tile-body">
                                    <h3 class="tile-title">Fill in the form to register your shop/retail</h3>
												<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/register/add-retail">

																@csrf
																<div class="form-group col">
																				<label class="control-label ">Retail Name</label>
																				<div>
																								<input class="form-control  @error('retailName') is-invalid @enderror" type="text"
																												placeholder="Enter the name of your shop" name="retailName" value="{{ old('retailName') }}"
																												autocomplete="retailName" required>

																								@error('retailName')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<div class="form-group col">

																				<h3 class="control-label">Which Goods do you deal in?</h3>
																				<p>Click on input field to select the type of goods you sell.</p>
																				<div class="control-col">
																								<select class="form-control well  @error('retailGoods') is-invalid @enderror " type="text"
																												placeholder="Enter the name of your shop" name="retailGoods" required id="multipleSelectForm"
																												multiple="true">
																												<optgroup label="Select The goods you sell">
																																<option value="Shoes">Shoes</option>
																																<option value="Clothes">Clothes</option>
																																<option value="Food">Food</option>
																												</optgroup>
																								</select>
																								@error('retailGoods')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>

																</div>


																<hr>

																<div>
																				<h3 class="text-display-4">Retail Location</h3>
																</div>

																<div class="form-group row">
																				<label class="control-label col-md-3">County</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retailCounty') is-invalid @enderror" type="text"
																												placeholder="Enter the county " name="retailCounty" value="{{ old('retailCounty') }}"
																												autocomplete="retailCounty" required>

																								@error('retailCounty')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group row">
																				<label class="control-label col-md-3">Constituency</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retailConstituency') is-invalid @enderror" type="text"
																												placeholder="Enter the constituency your shop is located" name="retailConstituency"
																												value="{{ old('retailConstituency') }}" autocomplete="retailConstituency" required>

																								@error('retailConstituency')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>


																<div class="form-group row">
																				<label class="control-label col-md-3">Town</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retailTown') is-invalid @enderror " type="text"
																												placeholder="Enter the town your shop is located" name="retailTown"
																												value="{{ old('retailTown') }}" autocomplete="retailTown" required>

																								@error('retailTown')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<hr>
																<h3 class="text-display-4">Add a picture of your retail</h3>

																<div class="form-group row">

																				<div class="col-md">
																								<label class="control-label col-md-3">Retail Picture</label>
																								<input class="form-control  @error('retailPicture') is-invalid @enderror" type="file"
																												name="retailPicture">

																								@error('retailPicture')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>

																</div>
																<div>
																				<div class="tile">
																								<div class="tile-title-w-btn">
																												<h3 class="title">Or drop the picture here</h3>

																								</div>
																								<div class="tile-body">
																												<p></p>
																												<h4>Retail Picture</h4>
																												<div class="text-center dropzone" method="POST" enctype="multipart/form-data"
																																action="/register/add-retail" name="retailPicture">
																																<div class="dz-message" name="retailPicture">Drop files here or click to
																																				upload<br><small class="text-info">Just drop the picture here.</small></div>
																												</div>
																								</div>
																				</div>
																</div>
																<hr>
																<div>
																				<h3 class="text-display-4">Additional Retail Information</h3>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">How many Employees do you have?</label>
																				<div class="col-md-8">
																								<input class="form-control col-md-8  @error('retailEmployees_number') is-invalid @enderror"
																												type="number" placeholder="Enter number of Employees" name="retailEmployees_number"
																												value="{{ old('retailEmployees_number') }}" autocomplete="retailEmployees_number" required>

																								@error('retailEmployees_number')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">What is the Estimated Value of Stock that you have in your
																								store?</label>
																				<div class="col-md-8">
																								<input class="form-control col-md-8" type="number"
																												placeholder="Enter Estimated Value of Stock (Optional)" name="retailStockEstimate"
																												value="{{ old('retailStockEstimate') }}" autocomplete="retailStockEstimate">

																								@error('retailStockEstimate')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

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
@endsection
