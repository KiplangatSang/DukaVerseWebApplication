@extends('layouts.app')
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
																																				<th>Buying Price</th>
																																				<th>Selling Price</th>
																																				<th>Date Entered</th>
																																				<th>Required Status</th>
																																				<th>Delete</th>


																																</tr>
																												</thead>
																												<tbody>


																																@foreach ($stocksdata['allStocks'] as $stock)
																																				<tr>
																																								<td>

																																												<img class="icon d-flex w-50"
																																																src="{{ $stock->stockImage ?? 'noprofile.png' }}"
																																																alt="{{ $stock['stockName'] }}">

																																								</td>
																																								<td>{{ $stock['stockNameId'] }}</td>
																																								<td>{{ $stock['stockName']." ".$stock->brand }}</td>
																																								<td>{{ $stock['stockSize'] }}</td>
																																								<td>{{ $stock['stockAmount'] }}</td>
																																								<td>{{ $stock['buying_price'] }}</td>
																																								<td>{{ $stock['selling_price'] }}</td>
																																								<td>{{ $stock['created_at'] }}</td>

																																								@if (!$stock['isRequired'])
																																												<td><a href="/stock/Set-as-Required/{{ $stock['id'] }}"
																																																				class="btn btn-info">
																																																				Mark as Required</a></td>
																																								@else
																																												<td>Required</td>
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
