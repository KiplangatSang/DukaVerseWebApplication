@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Supplies</h1>
												<p>Supplies</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Supplies </li>
												<li class="breadcrumb-item"><a href="#">Supplies</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">
												<div class="tile">
																<h3 class="tile-title">Fill in the form to add Supplies</h3>
																<div class="tile-body">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/admin/supplies/edit/{{$suppliesdata['supplies']->id}}">

																								@csrf
																								<div class="form-group col">


																												<label for="exampleSelect1">Retail Name</label>
																												<select class="form-control" id="exampleSelect1" name="retail_id">
																																@foreach ($suppliesdata['retail'] as $data)

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
																				<input class="form-control  @error('emp_name') is-invalid @enderror" type="text"
																								placeholder="Enter Employee Name" name="emp_name" value="{{ old('emp_name') }}"
																								autocomplete="emp_name" required>

																				@error('emp_name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>



																<div class="form-group col">
																				<div class="form-group">
																								<label for="exampleSelect1">Supply Items</label>
																								<select class="form-control" id="exampleSelect1" name="supply_items">
                                                                                                    @forelse ($collection as $item)
                                                                                                    <option value="{{$item->itemId}}">{{$item->itemName}}</option>
                                                                                                    @empty
                                                                                                    <input type="text" name="supply_items" value='supply_items_0'>

                                                                                                    @endforelse


																								</select>
                                                                                                @error('emp_role')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																</div>



																<div class="form-group col">
																				<label class="control-label ">Total Cost</label>
																				<div>
																								<input class="form-control  @error('cost') is-invalid @enderror" type="number"
																												placeholder="Enter Total cost of items" name="cost" value="{{ old('cost') }}"
																												autocomplete="emp_ID" required>

																								@error('cost')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

                                                                <div class="form-group col">
                                                                    <label class="control-label ">Amount Paid</label>
                                                                    <div>
                                                                                    <input class="form-control  @error('amount_paid') is-invalid @enderror" type="number"
                                                                                                    placeholder="Enter amount you have paid" name="emp_ID" value="{{ old('amount_paid') }}"
                                                                                                    autocomplete="amount_paid" required>

                                                                                    @error('amount_paid')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                    @enderror

                                                                    </div>
                                                    </div>




												<div class="tile-footer">
																<div class="row">
																				<div class="col-md-8 col-md-offset-3">
																								<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add
																												Supply</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/home"><i
																																class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
																				</div>
																</div>
												</div>

												</form>
								</div>
				</div>
				</div>

@endsection
