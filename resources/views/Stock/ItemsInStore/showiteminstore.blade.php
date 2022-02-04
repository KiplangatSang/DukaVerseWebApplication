@extends('Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Stock Item</h1>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item active"><a href="#">Stock Table</a></li>
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
																																				<th>Required Status</th>
																																				<th>Delete</th>


																																</tr>
																												</thead>
																												<tbody>


																																@foreach ($stocksdata['allStocks'] as $stock)
																																				<tr>
																																								<td>
																																												<div class="col-sm-3">
																																																<img class="icon d-flex w-100"
																																																				src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																																				alt="{{ $stock['itemNameId'] }}">
																																												</div>
																																								</td>
																																								<td>{{ $stock['stockNameId'] }}</td>
																																								<td>{{ $stock['stockName'] }}</td>
																																								<td>{{ $stock['stockSize'] }}</td>
																																								<td>{{ $stock['stockAmount'] }}</td>

																																								<td>{{ $stock['price'] }}</td>
																																								<td>{{ $stock['created_at'] }}</td>

																																								@if (!$stock['isRequired'])
																																												<td><a href="/stock/Set-as-Required/{{ $stock['id'] }}"
																																																				class="btn btn-info"><i class="fa fa-trash-o" aria-hidden="true">
																																																								Mark as Required</i></a></td>
																																								@else
																																												<td><a href="/stock/set-as-Required/{{ $stock['id'] }}"><i
																																																								class="fa fa-trash-o" aria-hidden="true">This item is required</i></a></td>
																																								@endif

																																								<td><a href="/stock/delete/{{ $stock['id'] }}" class="btn btn-danger"><i
																																																				class="fa fa-trash-o" aria-hidden="true"> Delete</i></a></td>



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
