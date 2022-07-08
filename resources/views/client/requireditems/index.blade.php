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

																				<p class="text-warning"><b>{{ $stocksdata['requireditems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-money fa-3x"></i>
																<div class="info">
																				<h5> Estimated Cost</h5>
																				<p class="text-warning"><b>{{ $stocksdata['requireditemscost'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Ordered Items</h5>
																				<p class="text-warning"><b>{{ $stocksdata['ordereditems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Items to Order</h5>
																				<p class="text-warning"><b>{{ $stocksdata['pendingitems'] }}</b></p>
																</div>
												</div>
								</div>

				</div>
				<div class="row">
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<form action="/client/requireditems/order" enctype="application/x-www-form-urlencoded"
																												method="POST">
																												@csrf

																												<div class="row m-3">
																																<div class="col col-md-6 col-xl-6">
																																				<div class="row">
																																								<div class="animated-checkbox d-flex m-2">
																																												<label>
																																																<input type="checkbox" id="cbcheckall"><span class="label-text"><strong
																																																								id="checkall">Select all</strong></span>
																																												</label>
																																								</div>
																																								<div class="text-success row m-2 mx-auto">
																																												<h3 class="ml-2">Items</h3>
																																												<h3 class="ml-2" id="items_selected">0</h3>
																																								</div>
																																				</div>
																																</div>
																																<div class="col col-md-6 col-xl-6">
																																				<div class=" float-right">
																																								<button class="btn btn-danger" type="Submit" id="btn_order" disabled>Order
																																												Selected</button>

																																				</div>

																																</div>
																												</div>
																												<table class="table table-hover table-bordered" id="sampleTable">
																																<thead>
																																				<tr>
																																								<th>Item </th>
																																								<th>Item Name</th>
																																								<th>Brand</th>
																																								<th>Size</th>
																																								<th>Required Amount</th>
																																								<th>Ordered Amount</th>
																																								<th>Cost per Item</th>
																																								<th>Entered By</th>
																																								<th>Date Entered</th>
																																								<th>Order</th>
																																								<th>Order Status</th>
																																								<th>View</th>
																																				</tr>
																																</thead>
																																<tbody id="items_body">
																																				@foreach ($stocksdata['allStocks']['Stocks'] as $stockitem)
																																								<tr href="/sales-item/{{ $stockitem->id }}">
																																												<a href="/sales-item/{{ $stockitem->id }}">
																																																<td>
																																																				<div class="col-sm col-xl">
																																																								<img class="icon d-flex w-100"
																																																												src="{{ $stockitem->item->image  ?? 'noprofile.png' }}"
																																																												alt="{{ $stockitem['name'] }}">
																																																				</div>
																																																</td>
																																																<td>
																																																				{{ $stockitem->item->name }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->item->brand }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->item->size }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->required_amount ?? 0 }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->ordered_amount ?? 0 }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->projected_cost }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->employees()->first()->emp_name ?? 'N/A' }}
																																																</td>
																																																<td>
																																																				{{ $stockitem->created_at }}

																																																</td>
																																																<td>
																																																				@if (!$stockitem->is_ordered)
																																																								<h5><span class="badge badge-danger">Not Ordered</span></h5>
																																																				@elseIf ($stockitem->is_ordered)
																																																								<h5><span class="badge badge-success">Ordered</span></h5>
																																																				@else
																																																								<h5><span class="badge badge-warning">N\A</span></h5>
																																																				@endif
																																																</td>
																																																</td>
																																																<td>
																																																				<div class="animated-checkbox">
																																																								<label>
																																																												<input type="checkbox" id="cborder"
																																																																name="{{ $stockitem->item->name }}"
																																																																value="{{ $stockitem->id }}"><span class="label-text"
																																																																onclick="onCheckboxChange()">Order</span>
																																																								</label>
																																																				</div>
																																																</td>
																																																<td><a href="/client/stock/show/{{ $stockitem->item->id }}"><i
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
				    $("#cbcheckall").click(function() {
				        check;
				        if (document.getElementById("checkall").innerHTML == "Select all") {
				            document.getElementById("btn_order").disabled = false;
				            $('input[type="checkbox"]').each(function() {
				                this.checked = true;

				            });
				            document.getElementById("checkall").innerHTML = "UnSelect all";


				        } else {
				            var checked = this.checked;
				            $('input[type="checkbox"]').each(function() {
				                this.checked = checked;
				            });
				            document.getElementById("checkall").innerHTML = "Select all";
				            document.getElementById("btn_order").disabled = true;
				        }
				    });
				</script>
				<script>
				    var check = 0;
				    var itemsId = document.getElementById("items_selected");
				    $('input[type="checkbox"]').click(function() {
				        check = $('input[type="checkbox"]:checked').length;
				        // alert(check);
				        if (check <= 0) {
				            document.getElementById("btn_order").disabled = true;
				            itemsId.innerHTML = check;
				        } else if (check > 0) {
				            document.getElementById("btn_order").disabled = false;
				            itemsId.innerHTML = check;
				        }
				    });

				    // return check;
				</script>
@endsection
