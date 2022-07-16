@extends('supplier.layouts.app')
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
																								action="/supplier/stock/item/update/{{ $stocksdata['allStocks']->id }}">
																								@csrf
																								<h3 class="tile-title">Stock Item</h3>
																								<div class="tile-body">
																												<div class="form-group row ">
																																<div class="col">
																																				<h2>{{ $stocksdata['allStocks']->item->name }}</h2>
																																</div>
																																<div class="col">
																																				<div class="col-md-6 well w-100">
																																								<img src="{{ $stocksdata['allStocks']->item->image }}" alt="stock image"
																																												id="stockImageSrc" class="w-50">
																																				</div>
																																</div>
																																<div class="col">
																																				<h2>{{ $stocksdata['allStocks']->item->brand }}</h2>
																																				<h3>{{ $stocksdata['allStocks']->item->size }}</h3>
																																</div>
																																<div class="col">
																																				<h4>Selling Price: {{ $stocksdata['allStocks']->item->selling_price }} ksh</h4>
																																				<h4>Buying Price: {{ $stocksdata['allStocks']->item->buying_price }} ksh</h4>
																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Item Code</label>
																																<div class="col-md-8">
																																				<input class="form-control  @error('code') is-invalid @enderror" id="code"
																																								name="code" type="text" placeholder="Enter Stock code"
																																								value="{{ $stocksdata['allStocks']->code }}" required>

																																				@error('code')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
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
												<div class="tile row">
																<div class="row tile mx-auto">
																				{{-- <div class="col-md col-xl ">
																								<h4>Availability Status</h4>

																								@if ($stocksdata['allStocks']->isRequired)
																												<div class="col d-flex justify-content-center p-2">
																																<h3 class="text-danger">Required</h3>
																												</div>
																												<div class="col d-flex justify-content-center p-2">
																																<a href="/client/stock/item/update/orders/{{$stocksdata['allStocks']->id}}" class="btn btn-primary"> Order Item</a>
																												</div>
																								@else
																												<div class="col d-flex justify-content-center p-2">
																																<h3 class="text-danger">Avaiable</h3>
																												</div>
																												<div class="col d-flex justify-content-center p-2">
																																<a href="/client/stock/item/update/required/{{$stocksdata['allStocks']->id}}" class="btn btn-secondary"> Mark Item as Required</a>
																												</div>
																								@endif


																				</div> --}}
																</div>
												</div>
								</div>
				</div>
@endsection
