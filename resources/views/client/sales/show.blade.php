@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Sold Items</h1>
												<p>Sold items from your shop</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
								</ul>
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
																																				<th>Item Size</th>
																																				<th>Brand</th>
																																				<th>Buying Price</th>
																																				<th>Selling Price</th>
																																				<th>Sold By</th>
																																				<th>Date Sold</th>
																																				<th>Delete</th>


																																</tr>
																												</thead>
																												<tbody>


																																@foreach ($salesdata['allSales'] as $sale)
																																				<tr>
																																								<td>

																																												<img class="icon d-flex w-100"
																																																src="{{ $sale['item']->image ?? 'noprofile.png' }}"
																																																alt="{{ $sale['item']->name }}">

																																								</td>
																																								<td>{{ $sale->code }}</td>
																																								<td>{{ $sale['item']->name }}</td>
																																								<td>{{ $sale['item']->size }}</td>
																																								<td>{{ $sale['item']->brand }}</td>
																																								<td>{{ $sale['item']->buying_price }}</td>
																																								<td>{{ $sale->selling_price }}</td>
																																								<td>{{ $sale->employees()->first()->emp_name ?? "N/A"}}</td>
																																								<td>{{ $sale['created_at'] }}</td>
																																								<td><a href="/client/sales/delete/{{ $sale['id'] }}"><i class="fa fa-trash-o"
																																																				aria-hidden="true"> Delete</i></a></td>



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
