@extends('layouts.app')
@section('content')
				<div class="app-title">

								<div>
												<h1><i class="fa fa-th-list"></i> Required Items Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Required Items entered between </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Required Items</li>
												<li class="breadcrumb-item active"><a href="#">Required Items Table</a></li>
								</ul>
				</div>
				<div class="d-flex justify-content-center m-3">
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
																				<h5> Required Items</h5>

																				<p class="text-warning"><b>{{ $stocksdata['stocksitems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-money fa-3x"></i>
																<div class="info">
																				<h5> Estimated Cost</h5>
																				<p class="text-warning"><b>{{ $stocksdata['stocksrevenue'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Ordered Items</h5>
																				<p class="text-warning"><b>{{ $stocksdata['stocksrevenue'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Items to Order</h5>
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
																								<form action="/requireditems/order" enctype="application/x-www-form-urlencoded" method="POST">
																												@csrf

																												<div class="row m-3">
																																<div class="animated-checkbox d-flex m-2">
																																				<label>
																																								<input type="checkbox" id="cbcheckall" onclick="check()"><span
																																												class="label-text"><strong id="checkall">Select all</strong></span>
																																				</label>
																																</div>

																																<div class=" col-sm-3">
																																				<button class="btn btn-danger" type="Submit">Order Selected</button>

																																</div>


																												</div>

																												<table class="table table-hover table-bordered" id="sampleTable">
																																<thead>
																																				<tr>
																																								<th>Item Id</th>
																																								<th>Item Name</th>
																																								<th>Item Description</th>
																																								<th>Item Amount</th>
																																								<th>Buying Price</th>
																																								<th>Date Sold</th>
																																								<th>Order</th>
																																								<th>View</th>
																																				</tr>
																																</thead>
																																<tbody>
																																				@foreach ($stocksdata['allStocks']['Stocks'] as $stockitem)
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

																																																@if (!$stockitem['isRequired'])
																																																				<td><a href="/stock/Set-as-Required/{{ $stockitem['id'] }}"
																																																												class="btn btn-info"><i class="fa fa-trash-o"
																																																																aria-hidden="true">
																																																																Mark as Required</i></a></td>
																																																@else
																																																				<td>
																																																								<div class="animated-checkbox">
																																																												<label>
																																																																<input type="checkbox" id="cborder"
																																																																				name="{{ $stockitem->stockName }}"
																																																																				value="{{ $stockitem->id }}"><span
																																																																				class="label-text">Order</span>
																																																												</label>
																																																								</div>
																																																				</td>
																																																@endif
																																																<td><a
																																																								href="/requireditem/requireditem-item/{{ $stockitem->stockName }}"><i
																																																												class="fa fa-eye ">
																																																												View</i></a></td>
																																												</a>
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
				<script>
				    function check() {
				        if (document.getElementById("checkall").innerHTML == "Select all") {

				            $('input[type="checkbox"]').each(function() {
				                this.checked = true;
				            });
				            document.getElementById("checkall").innerHTML = "UnSelect all";

				        } else {
				            uncheck();
				        }



				    }

				    function uncheck() {
				        var checked = this.checked;
				        $('input[type="checkbox"]').each(function() {
				            this.checked = checked;
				        });
				        document.getElementById("checkall").innerHTML = "Select all";
				    }
				</script>
@endsection
