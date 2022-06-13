@extends('layouts.app')
@section('content')
				<div class="app-title">

								<div>
												<h1><i class="fa fa-th-list"></i> Customers Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Customers </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Customers</li>
												<li class="breadcrumb-item active"><a href="#">Customers Table</a></li>
								</ul>
				</div>

				<div class="d-flex justify-content-center">
								<div class="d-flex justify-content-center m-2">
												<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
																id="sales_date_form">
																@csrf
																<div class="col">
																				<div class="tile-body">
																								<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate"
																												id="startDate" type="text" placeholder="Select Date" autocomplete="off">
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
																												placeholder="Select Date" name="endDate" autocomplete="off">
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

				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-address-card-o fa-3x"></i>
																<div class="info">
																				<h5>Credited Customers</h5>

																				<p class="text-warning"><b>{{ $customerdata['customercount'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-address-book-o fa-3x"></i>
																<div class="info">
																				<h5>Total Amount Credit</h5>
																				<p class="text-warning"><b>{{ $customerdata['customercount'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-area-chart fa-3x"></i>
																<div class="info">
																				<h5>Average Credit</h5>
																				<p class="text-warning"><b>{{ $customerdata['customercount'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-bar-chart fa-3x"></i>
																<div class="info">
																				<h5>Highest Credit Amount</h5>
																				<p class="text-warning"><b>{{ $customerdata['customercount'] }} ksh</b></p>
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
																																				<th>Customer Id</th>
																																				<th>Customer Name</th>
																																				<th>Customer Phone Number</th>
																																				<th>Customer Email</th>
																																				<th>Address</th>
																																				<th>Date Entered</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($customerdata['customerlist'] as $customer)
																																				<tr>
																																								<td>
																																												{{ $customer->id_number }}
																																								</td>

																																								<td>
																																												{{ $customer->name }}
																																								</td>
																																								<td>
																																												{{ $customer->phone_number }}
																																								</td>
																																								<td>
																																												{{ $customer->email }}
																																								</td>
																																								<td>
																																												{{ $customer->address }}
																																								</td>
																																								<td>
																																												{{ $customer->created_at }}
																																								</td>
																																								<td><a href="/customers/show/{{ $customer->id }}"><i class="fa fa-eye ">
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
