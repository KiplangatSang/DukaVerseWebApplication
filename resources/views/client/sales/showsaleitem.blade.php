@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Data Table</h1>
												<p>Table to display analytical data effectively</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
								</ul>
				</div>

				<div class="row">
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
																																				<th>Item Amount</th>
																																				<th>Price</th>
																																				<th>Date Sold</th>
																																				<th>Delete</th>


																																</tr>
																												</thead>
																												<tbody>


																																@foreach ($salesdata['allSales'] as $sale)
																																				<tr>
																																								<td>
																																												<div class="col-sm-3">
																																																<img class="icon d-flex w-100"
																																																				src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																																				alt="{{ $sale['itemNameId'] }}">
																																												</div>
																																								</td>
																																								<td>{{ $sale['itemNameId'] }}</td>
																																								<td>{{ $sale['itemName'] }}</td>
																																								<td>{{ $sale['itemSize'] }}</td>
																																								<td>{{ $sale['itemAmount'] }}</td>

																																								<td>{{ $sale['price'] }}</td>
																																								<td>{{ $sale['created_at'] }}</td>
																																								<td><a href="/sales/delete/{{ $sale['id'] }}"><i class="fa fa-trash-o"
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
