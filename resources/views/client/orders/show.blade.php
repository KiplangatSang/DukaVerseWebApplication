@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Orders Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Orders </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Orders</li>
												<li class="breadcrumb-item active"><a href="#">Orders Table</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-lg-3">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-basket fa-3x"></i>
																<div class="info">
																				<h5> Order ID</h5>

																				<p class="text-warning"><small>{{ $ordersdata['orders']->orderId }}</small></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5>Orderd Items</h5>
																				<p class="text-warning"><b>{{ $ordersdata['ordersitems'] }} </b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5> Estimated Cost</h5>
																				<p class="text-warning"><b>{{ $ordersdata['orders']->projected_cost }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Payment Status</h5>
																				<p class="text-warning"><b>{{ $ordersdata['orders']->payment_status }}</b></p>
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
																																				<th>Order Id</th>
																																				<th>Item Name</th>
																																				<th>Item Brand</th>
                                                                                                                                                <th>Item Desc</th>
																																				<th>Item Amount</th>
																																				<th>Brand</th>
																																				<th>Date Entered</th>

																																</tr>
																												</thead>
																												<tbody>

																																@foreach ($ordersdata['orders']['ordered_items'] as $item)
																																				<tr>
																																								<td>
																																												{{ $ordersdata['orders']->orderId }}
																																								</td>

																																								<td>
																																												{{ $item->item  }}
																																								</td>

																																								<td>
																																												{{ $item->brand  ?? "NA" }}
																																								</td>
																																								<td>
																																												{{ $item->size  ?? "NA" }}
																																								</td>
																																								<td>
																																												{{ $item->amount  ?? "NA" }}
																																								</td>
																																								<td>
																																												{{ $item->cost ?? "NA"  }}
																																								</td>
																																								<td>
																																												{{ $ordersdata['orders']->created_at }}
																																								</td>



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
