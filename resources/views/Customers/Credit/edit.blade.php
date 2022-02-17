@extends('layouts.app')
@section('content')
				@if (session()->has('message'))
								<div class="container-fluid alert alert-danger">
												{{ session()->get('message') }}
								</div>
				@endif

				@if (session()->has('success'))
								<div class="container-fluid alert alert-success">
												{{ session()->get('success') }}
								</div>
				@endif
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Customer Credit Registration</h1>
												<p>Update Customer Credit</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Customer </li>
												<li class="breadcrumb-item"><a href="#">Customer Credit</a></li>
								</ul>
				</div>
				<div class="row">

								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to Update Customer Credit</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data"
																								action="/customers/credit/update/{{ $custCreditdata['creditItems']->id }}">

																								@csrf
																								<div class="form-group col">

																												<label for="exampleSelect1">Retail Name</label>
																												<select class="form-control @error('retailID') is-invalid @enderror" id="exampleSelect1" name="retailID"
																																value="{{ $custCreditdata['retail']->id }}">
																																@foreach ($custCreditdata['retails'] as $data)

																																				<option value="{{ $data->id }}">{{ $data->retailName }}</option>
																																@endforeach
																												</select>

																												@error('retailID')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>

																</div>

																<div class="form-group col">


																				<label for="exampleSelect1">Item Name</label>
																				<input class="form-control  @error('itemName') is-invalid @enderror" type="text"
																								placeholder="Enter Credit Item's Name" name="itemName"
																								value="{{ $custCreditdata['creditItems']->itemName }}" autocomplete="itemName" required>

																				@error('itemName')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>



																<div class="form-group col">
																				<label class="control-label ">Credit Item Description</label>
																				<div>
																								<input class="form-control  @error('itemDescription') is-invalid @enderror" type="text"
																												placeholder="Enter Credit Item Description" name="itemDescription"
																												value="{{ $custCreditdata['creditItems']['itemDescription'] }}" autocomplete="itemDescription"
																												required>

																								@error('itemDescription')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Credit Item Amount</label>
																				<div>
																								<input class="form-control  @error('amount') is-invalid @enderror" type="phone"
																												placeholder="Enter Customer Phone Number" name="amount"
																												value="{{ $custCreditdata['creditItems']['amount'] }}" autocomplete="amount" required>

																								@error('amount')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Due Amount</label>
																				<div>
																								<input class="form-control  @error('requiredAmount') is-invalid @enderror" type="requiredAmount"
																												placeholder="Enter Customer Email" name="requiredAmount"
																												value="{{ $custCreditdata['creditItems']['requiredAmount'] }}" autocomplete="requiredAmount"
																												required>

																								@error('requiredAmount')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Paid Amount</label>
																				<div>
																								<input class="form-control  @error('amountPaid') is-invalid @enderror" type="amountPaid"
																												placeholder="Enter Paid Amount" name="amountPaid"
																												value="{{ $custCreditdata['creditItems']['amountPaid'] }}" autocomplete="amountPaid"
																												required>

																								@error('amountPaid')
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
																								<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
																												Credit Item</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																				</div>
																</div>
												</div>

												</form>
								</div>
				</div>
				</div>

@endsection
