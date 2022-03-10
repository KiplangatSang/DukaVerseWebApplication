@extends('Admin.Layouts.app')
@section('content')


				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Supplier Registration</h1>
												<p>Supplier Employee</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Supplier </li>
												<li class="breadcrumb-item"><a href="#">Supplier</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to register a Supplier</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data"
																								action="/supplies/suppliers/update/{{ $suppliersdata['supplierslist']->id }}">

																								@csrf
																								<div class="form-group col">


																												<label for="exampleSelect1">Retail Name</label>
																												<select class="form-control" id="exampleSelect1" name="retail_id">
																																@foreach ($empdata['Retail'] as $data)

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


																				<label for="exampleSelect1">Supplier Name</label>
																				<input class="form-control  @error('name') is-invalid @enderror" type="text"
																								placeholder="Enter Supplier Name" name="name" value="{{ $suppliersdata['supplierslist']->name }}"
																								autocomplete="name" required>

																				@error('name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group col">

																				<label class="control-label ">Supplier ID/Passport Number</label>
																				<div>
																								<input class="form-control  @error('id_number') is-invalid @enderror" type="text"
																												placeholder="Enter Supplier ID/Passport Number" name="id_number"
																												value="{{ $suppliersdata['supplierslist']->id_number }}" autocomplete="id_number" required>

																								@error('id_number')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group col">
																				<label class="control-label ">Phone Number</label>
																				<div>
																								<input class="form-control  @error('phone_number') is-invalid @enderror" type="phone"
																												placeholder="Enter Supplier Phone Number" name="phone_number"
																												value="{{ $suppliersdata['supplierslist']->phone_number }}" autocomplete="phone_number"
																												required>

																								@error('phone_number')
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
																												placeholder="Enter Supplier Email" name="email"
																												value="{{ $suppliersdata['supplierslist']->email }}" autocomplete="email" required>

																								@error('email')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>


																<hr>

																<div class="tile-footer">
																				<div class="row">
																								<div class="col-md-8 col-md-offset-3">
																												<button class="btn btn-primary" type="submit"><i
																																				class="fa fa-fw fa-lg fa-check-circle"></i>Register
																																Supplier</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary"
																																href="/supplies/suppliers/index"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																								</div>
																				</div>
																</div>

																</form>
												</div>
								</div>
				</div>

@endsection
