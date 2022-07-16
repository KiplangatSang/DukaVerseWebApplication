@extends('supplier.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Stock Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Stock entered between </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item active"><a href="#">Stock Items- Table</a></li>
								</ul>
				</div>

				<div class="d-flex justify-content-center m-2">
								{{-- <form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
												id="sales_date_form">
												@csrf
												<div class="col">
																<div class="tile-body">
																				<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate" type="text"
																								placeholder="Select Date" autocomplete="new-startDate">
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

								</form> --}}
				</div>

				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h5> Items In Store</h5>
																				<p class="text-warning"><b>{{ $stockdata['stockitems'] }} items</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5>Stock Expense </h5>
																				<p class="text-warning"><b>{{ $stockdata['stockexpense'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Estimated Sales</h5>
																				<p class="text-warning"><b>{{ $stockdata['stockexpectedSales'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Estimated Revenue</h5>
																				<p class="text-warning"><b>{{ $stockdata['stockrevenue'] }} ksh</b></p>
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
																																				<th>Item</th>
																																				<th>Name</th>
																																				<th>Brand</th>
																																				<th>Size</th>
																																				<th>Amount</th>
																																				<th>Buying Price</th>
																																				<th>Selling Price</th>
																																				<th>Description</th>
																																				<th>Regulation</th>
																																				<th>Update</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>

																																@foreach ($stockdata['allStock'] as $stockitem)
																																				<tr>

																																								<td>
																																												<img class="icon d-flex w-100"
																																																src="{{ $stockitem->image ?? 'noprofile.png' }}"
																																																alt="{{ $stockitem['name'] }}">

																																								</td>
																																								<td>
																																												{{ $stockitem->name }}
																																								</td>
																																								<td>
																																												{{ $stockitem->brand }}
																																								</td>
																																								<td>
																																												{{ $stockitem->size }}
																																								</td>
																																								<td>
																																												{{ count($stockitem->stocks) }}
																																								</td>

																																								<td>
																																												{{ $stockitem->buying_price }}
																																								</td>
																																								<td>
																																												{{ $stockitem->selling_price }}
																																								</td>
																																								<td>{{ $stockitem->description ?? 'N/A' }}</td>
																																								<td>{{ $stockitem->regulation ?? 'N/A' }}</td>
																																								{{-- @if (!$stockitem->is_required)
																																												<td><a href="/client/stock/item/update/required/{{ $stockitem['id'] }}">
																																																				<h5><span class="badge badge-warning">Mark required</span></h5>
																																																</a></td>
																																								@elseIf($stockitem->is_required)
																																												<td>
																																																<h5><span class="badge badge-danger">Required</span></h5>
																																												</td>
																																								@endif --}}
																																								<td><a class="text-info" href="/supplier/stock/edit/{{ $stockitem->id }}"><i
																																																				class="fa fa-pencil-square">
																																																				Update</i></a></td>

																																								@if (count($stockitem->stocks) > 0)
																																												<td><a href="/supplier/stock/show/{{ $stockitem->id }}"><i class="fa fa-eye ">
																																																								View</i></a></td>
																																								@else
																																												<td><a class="text-danger" href="/client/stock/show/{{ $stockitem->id }}"><i
																																																								class="fa fa-shopping-basket ">
																																																								Order</i></a></td>
																																								@endif



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
