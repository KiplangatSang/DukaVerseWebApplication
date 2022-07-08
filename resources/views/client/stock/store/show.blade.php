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

				<div class="row ">
								<div class="col col-md col-xl tile m-1 ">
												{{-- {{dd( $stocksdata['allStocks']['item']->name)}} --}}
												<div class=" col col-md-6 d-flex justify-content-center">
                                                    <img class="icon d-flex w-50"
																				src="{{ $stocksdata['allStocks']->image ?? 'noprofile.png' }}"
																				alt="{{ $stocksdata['allStocks']->name }}"></div>

												<h4 >{{ $stocksdata['allStocks']->name }}</h4>
								</div>
								<div class="col col-md col-xl tile  m-1 ">
									<div class="d-flex justify-content-center">
										<h5>Description</h5>
									</div>
									<div class="d-flex justify-content-center">
										<p class="text-info">{{ $stocksdata['allStocks']->description }}</p>
									</div>
								</div>
								<div class="col col-md col-xl tile m-1 ">
									<div class="d-flex justify-content-center">
									<h5>Regulation</h5>
									</div>
									<div class="d-flex justify-content-center">
												<p class="text-warning">{{ $stocksdata['allStocks']->regulation }}</p>
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
																																				<th>Item Id</th>
																																				<th>Brand</th>
																																				<th>Size</th>
																																				<th>Buying Price</th>
																																				<th>Selling Price</th>
																																				<th>Date Entered</th>
																																				<th>Edit</th>
																																				<th>Delete</th>


																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($stocksdata['allStocks']->stocks as $stock)

																																								<tr>
																																												<td>{{ $stock->code }}</td>
																																												<td>{{ $stocksdata['allStocks']->brand }}</td>
																																												<td>{{ $stocksdata['allStocks']->size }}</td>
																																												<td>{{ $stocksdata['allStocks']->buying_price }}</td>
																																												<td>{{ $stocksdata['allStocks']->selling_price }}</td>
																																												<td>{{ $stock->created_at }}</td>
																																												<td><a href="/client/stock/item/edit/{{ $stock['id'] }}"
																																																				class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true">
																																																								Edit</i></a></td>
																																												<td><a href="/client/stock/item/delete/{{ $stock['id'] }}" class="btn btn-danger"><i
																																																								class="fa fa-trash-o" aria-hidden="true"> Delete</i></a></td>
																																								</tr>
                                                                                                                                                                @if ($stock->item)	@endif
																																@endforeach
																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
