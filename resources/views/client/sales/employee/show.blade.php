@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Sales Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Sales done between </p>

																</div>
												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
								</ul>
				</div>
				<div class="d-flex justify-content-center m-3">

								<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
												id="sales_date_form">
												@csrf
												<h6 class="mt-2">Sales Between</h6>
												<div class="col">
																<div class="tile-body">
																				<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate" type="text"
																								placeholder="Start Date" autocomplete="off" id="startDate">
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
																								placeholder="End Date" name="endDate" autocomplete="off">
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
				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
																<div class="info">
																				<h4>Employee Name</h4>
																				<p class="text-warning"><b>{{ $salesdata['allSales']['emp']->emp_name }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
																<div class="info">
																				<h4>Employee ID</h4>
																				<p class="text-warning"><b>{{ $salesdata['allSales']['emp']->id }}</b></p>
																</div>
												</div>
								</div>

								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h4> Items Sold</h4>

																				<p class="text-warning"><b>{{ $salesdata['solditemscount'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h4> Sales Total</h4>
																				<p class="text-warning"><b>{{ $salesdata['sales'] }} ksh</b></p>
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
																																				<th>Item </th>
                                                                                                                                                <th>Item Id</th>
																																				<th>Item Name</th>
                                                                                                                                                <th>Brand </th>
																																				<th>Size/Type</th>
																																				<th>Item Amount</th>
																																				<th>Price</th>
																																				<th>Date Sold</th>

																																</tr>
																												</thead>
																												<tbody>

																																@foreach ($salesdata['allSales'] as $soldItem)
																																				@if ($soldItem->saleitem)
																																								<tr>
																																												<td>
																																																{{-- {{ dd($soldItem->saleitem->name) }} --}}
																																																<div class="col col-md-6">
                                                                                                                                                                                                    <img class="icon d-flex w-100"
																																																				src="{{ $soldItem->saleitem->image ?? 'noprofile.png' }}"
																																																				alt="{{ $soldItem->saleitem->name }}">
                                                                                                                                                                                                </div>

																																												</td>
																																												<td>{{ $soldItem->code }}</td>
																																												<td>{{ $soldItem['saleitem']->name }}</td>
                                                                                                                                                                                <td>{{ $soldItem['saleitem']->brand }}</td>
																																												<td>{{ $soldItem['saleitem']->size }}</td>																																												<td>{{ $soldItem['saleitem']->buying_price }}</td>
																																												<td>{{ $soldItem->selling_price }}</td>
																																												<td>{{ $soldItem['created_at'] }}</td>
																																												{{-- <td><a href="/client/sales/delete/{{ $soldItem['id'] }}"><i
																																																								class="fa fa-trash-o" aria-hidden="true"> Delete</i></a></td> --}}



																																								</tr>
																																				@endIf
																																@endforeach
																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
