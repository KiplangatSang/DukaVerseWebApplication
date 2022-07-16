
@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Stock</h1>
												<p>Stock Registration</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item"><a href="#">Save Stock Item</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">

												<div class="tile row">
																<div class="col-md col-xl">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data"
																								action="/supplier/stock/update/{{ $stocksdata['allStocks']->id }}">
																								@csrf
																								<h3 class="tile-title">Stock Item</h3>
																								<div class="tile-body">
																												<div class="form-group row">
																																<label class="control-label col-md-3">Item Name</label>
																																<div class="col-md-8">
																																				<input class="form-control  @error('name') is-invalid @enderror" id="stockName"
																																								name="name" type="text" placeholder="Enter Stock name"
																																								value="{{ $stocksdata['allStocks']->name }}" required>

																																				@error('name')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>

																												<div class="form-group row">
																																<label class="control-label col-md-3">Click to select item image</label>
																																<div class="col-md-8">
																																				<input class="form-control  @error('image') is-invalid @enderror" id="image"
																																								name="image" type="file" placeholder="Enter item image">

																																				@error('image')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>

																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Or Select to re-use</label>
																																<div class="col-md-3 well w-100">

																																				<img src="{{ $stocksdata['allStocks']->image }}" alt="stock image" id="stockImageSrc"
																																								class="w-50">

																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Item Brand</label>
																																<div class="col-md-8">
																																				<input class="form-control  @error('brand') is-invalid @enderror" id="brand"
																																								name="brand" type="text" placeholder="Enter the brand"
																																								value="{{ $stocksdata['allStocks']->brand }}" required>

																																				@error('brand')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>

																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Description/Size</label>
																																<div class="col-md-8">
																																				<input class="form-control   @error('size') is-invalid @enderror" id="stockSize"
																																								name="size" type="text" placeholder="Description ie kgs or litres"
																																								value="{{ $stocksdata['allStocks']->size }}" required>

																																				@error('size')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>

																												<div class="form-group row">
																																<label class="control-label col-md-3">Enter the Buying Price</label>
																																<div class="col-md-8">
																																				<input class="form-control col-md-8  @error('buying_price') is-invalid @enderror"
																																								id="buying_price" name="buying_price" type="number"
																																								placeholder="Enter the buying price per item"
																																								value="{{ $stocksdata['allStocks']->buying_price }}" required>

																																				@error('buying_price')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Enter the Selling Price</label>
																																<div class="col-md-8">
																																				<input class="form-control col-md-8  @error('selling_price') is-invalid @enderror"
																																								id="selling_price" name="selling_price" type="number"
																																								placeholder="Enter the selling price per item"
																																								value="{{ $stocksdata['allStocks']->selling_price }}" required>

																																				@error('selling_price')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>

																												<div class="form-group row">
																																<label class="control-label col-md-3">Enter the Item Description</label>

																																<textarea class="form-control col-md-8  @error('description') is-invalid @enderror" id="description" name="description"
																																    type="number" placeholder="Enter the description of item" required>{{ $stocksdata['allStocks']->description }}</textarea>
																																@error('description')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror


																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Enter the Item Regulation</label>

																																<textarea class="form-control col-md-8  @error('regulation') is-invalid @enderror" id="regulation" name="regulation"
																																    type="number" placeholder="Enter the regulations of the item" required>{{ $stocksdata['allStocks']->regulation }}</textarea>
																																@error('regulation')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																								</div>
																								<div class="tile-footer">
																												<div class="row">
																																<div class="col-md-8 col-md-offset-3 mx-auto d-flex justify-content-center">
																																				<button class="btn btn-primary" type="submit"><i
																																												class="fa fa-fw fa-lg fa-pencil"></i>Update Stock</button>

																																</div>
																												</div>
																								</div>
																				</form>
																</div>




												</div>
								</div>
				</div>
@endsection
