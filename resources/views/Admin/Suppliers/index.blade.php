@extends('Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Suppliers Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Suppliers entered between </p>

																</div>
																<div class="d-flex justify-content-center ml-5">
																				<form class="row form formcontrol" method="GET" action="/sales/sales-by-date"
																								enctype="multipart/form-data" id="sales_date_form">
																								@csrf
																								<div class="col">
																												<div class="tile-body">
																																<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate"
																																				type="text" placeholder="Select Date" autocomplete="new-startDate">
																																@error('startDate')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																								</div>
																								<div class="col">
																												<div class="tile-body">
																																<input class="form-control  @error('endDate') is-invalid @enderror" id="endDate" type="text"
																																				placeholder="Select Date" name="endDate" autocomplete="new-endDate">
																																@error('endDate')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																								</div>

																								<div class="tile-body">
																												<button class="btn btnsecondary bg-success text-light" type="submit">View</button>
																								</div>

																				</form>
																</div>
												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item active"><a href="#">Stock Items- Table</a></li>
								</ul>
				</div>

				<div class="d-flex justify-content-center">
								<div class="col-md-3 m-3 ">
												<form action="/sales/sales-by-retail/{id}" method="POST" enctype="multipart/form-data" id="retailform">
																@csrf
																<label for="exampleSelect1"><strong>Retails</strong> </label>
																<select class="form-control" id="exampleSelect1" name="retail_id">
																				<option disabled> <strong> Select a retail shop</strong></option>
																				@foreach ($suppliersdata['retails'] as $data)
																								<option value="0">All Shops</option>
																								<option value="{{ $data->id }}" onclick="submitretailform({{ $data->id }})">
																												{{ $data->retailName }}</option>
																				@endforeach
																</select>

												</form>
								</div>
				</div>

				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h5> Items In Store</h5>

																				<p class="text-warning"><b>{{ count($suppliersdata['supplierslist']) }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5> Estimated Revenue</h5>
																				<p class="text-warning"><b>{{ count($suppliersdata['supplierslist']) }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Average Stock</h5>
																				<p class="text-warning"><b>{{ count($suppliersdata['supplierslist']) }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Name</th>
																																				<th>Phone Number</th>
																																				<th>Email</th>
																																				<th>Address</th>

																																				<th>Date Entered</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($suppliersdata['supplierslist'] as $supplier)

																																				<tr>
																																								<td>
																																												{{ $supplier->name }}
																																								</td>

																																								<td>
																																												{{ $supplier->phone_number }}
																																								</td>
																																								<td>
																																												{{ $supplier->email }}
																																								</td>
																																								<td>
																																												{{ $supplier->address }}
																																								</td>

																																								<td>
																																												{{ $supplier->created_at }}
																																								</td>
																																								<td><a href="/supplies/suppliers/show/{{ $supplier->id }}"><i
																																																				class="fa fa-eye ">
																																																				View</i></a></td>


																																				</tr>
																																@endforeach


																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>

@endsection
