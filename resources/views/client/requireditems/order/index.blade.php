@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Required Item</h1>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item active"><a href="#">Required Table</a></li>
								</ul>
				</div>

				<div class="row">
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<form action="/client/orders/store" enctype="application/x-www-form-urlencoded" method="POST">
																												@csrf

																												<div class="row m-3">


																																<div class=" col-sm-3">
																																				<button class="btn btn-danger" type="Submit">Confirm Order</button>

																																</div>


																												</div>


																												<table class="table table-hover table-bordered" id="sampleTable">
																																<thead>
																																				<tr>
																																								<th>Item </th>
																																								<th>Item Name</th>
																																								<th> Brand</th>
																																								<th>Item Size</th>
																																								<th>Item Amount</th>
																																								<th>Delete</th>
																																				</tr>
																																</thead>
																																<tbody>
																																				@foreach ($stocksdata['allStocks'] as $stock)
																																								<tr>
																																												<td>
																																																<div class="col-sm-6">
																																																				<img class="icon d-flex w-100"
																																																								src="{{ $stock->item->image ?? 'noprofile.png' }}"
																																																								alt="{{ $stock->item->name }}">
																																																</div>
																																												</td>
																																												<td>{{ $stock->item->name }}</td>
																																												<td>{{ $stock->item->brand }}</td>
																																												<td>{{ $stock->item->size }}</td>
																																												<td>
                                                                                                                                                                                    <div>
                                                                                                                                                                                    <input class="form-control" name="{{ $stock->id }}" value="{{ $stock->required_amount }}">
                                                                                                                                                                                </div>
																																												</td>
																																												<td><a href="/requireditems/editRequiredItems/{{ $stock['id'] }}"><i
																																																								class="fa fa-trash-o" aria-hidden="true"> Delete</i></a></td>



																																								</tr>
																																				@endforeach


																																</tbody>
																												</table>
																								</form>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
