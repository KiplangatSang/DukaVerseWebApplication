@extends('layouts.app')
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
								<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
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

								</form>
				</div>

				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h5> Items In Store</h5>

																				<p class="text-warning"><b>{{ $stocksdata['stocksitems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5> Estimated Revenue</h5>
																				<p class="text-warning"><b>{{ $stocksdata['stocksrevenue'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Average Stock</h5>
																				<p class="text-warning"><b>{{ $stocksdata['stocksrevenue'] }}</b></p>
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
																																				<th>Item Id</th>
																																				<th>Item Name</th>
																																				<th>Item Description</th>
																																				<th>Item Amount</th>
																																				<th>Buying Price</th>
																																				<th>Date Sold</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($stocksdata['allStocks'] as $stockitem)
																																				<tr href="/sales-item/{{ $stockitem->id }}">
																																								<a href="/sales-item/{{ $stockitem->id }}">
																																												<td>
																																																{{ $stockitem->stockNameId }}
																																												</td>
																																												<td>
																																																{{ $stockitem->stockName }}
																																												</td>
																																												<td>
																																																{{ $stockitem->stockSize }}
																																												</td>
																																												<td>
																																																{{ $stockitem->stockAmount }}
																																												</td>
																																												<td>
																																																{{ $stockitem->price }}
																																												</td>
																																												<td><a href="/stock-item/{{ $stockitem->itemName }}">
																																																				{{ $stockitem->created_at }}</a>

																																												</td>
																																												<td><a href="/stock-item/{{ $stockitem->stockName }}"><i
																																																								class="fa fa-eye ">
																																																								View</i></a></td>
																																								</a>
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
