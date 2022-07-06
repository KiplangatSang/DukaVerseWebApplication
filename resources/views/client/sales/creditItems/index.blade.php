@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Sales Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Sales Paid between </p>
																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
								</ul>
				</div>

				{{-- <div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-sales fa-3x"></i>
																<div class="info">
																				<h4>Total Items Sold</h4>

																				<p class="text-warning"><b>{{ $salesdata['salesitems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
																<div class="info">
																				<h4>Total Revenue</h4>
																				<p class="text-warning"><b>{{ $salesdata['salesrevenue'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
																<div class="info">
																				<h4>Sales Per Day</h4>
																				<p class="text-warning"><b>{{ $salesdata['salesrevenue'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
																<div class="info">
																				<h4>Growth</h4>
																				<p class="text-warning"><b>{{ $salesdata['salesrevenue'] }}%</b></p>
																</div>
												</div>
								</div>
				</div> --}}
				<div class="row">
								<div class="mx-auto m-2">
												<form class="row form formcontrol" method="POST" action="/sales-by-date">
																@csrf
																<div class="col">
																				<div class="tile-body">
																								<input class="form-control  @error('startDate') is-invalid @enderror" id="startDate" type="text"
																												placeholder="Select Date" name="startDate">
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
																												placeholder="Select Date" name="endDate">
																								@error('endDate')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																</div>
																<div class="col">
																				<div class="tile-body">
																								<button class="btn btnsecondary bg-success text-light" type="submit">View</button>
																				</div>
																</div>
												</form>
								</div>
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Trans ID</th>
																																				<th>Item Name</th>
																																				<th> Brand</th>
																																				<th> Size</th>
																																				<th>Price</th>
																																				<th>Date Sold</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>

																																@foreach ($salesdata['allSales'] as $saleitem)
																																				@foreach ($saleitem->sales as $sale)
																																								<tr href="/sales-item/{{ $saleitem->id }}">
																																												<td>
																																																{{ $saleitem->transaction_id }}
																																												</td>
																																												<td>
																																																{{ $sale->items()->first()->name }}
																																												</td>
																																												<td>
																																																{{ $sale->items()->first()->brand }}
																																												</td>
																																												<td>
																																																{{  $sale->items()->first()->size }}
																																												</td>
																																												<td>
																																																{{ $sale->selling_price }}
																																												</td>
																																												<td><a href="/sales-item/{{ $saleitem->id }}">
																																																				{{ $saleitem->created_at }}</a>

																																												</td>
																																												<td><a href="/sales-item/{{ $saleitem->id }}"><i
																																																								class="fa fa-eye col"></i></a></td>

																																								</tr>
																																				@endforeach
																																@endforeach
																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
