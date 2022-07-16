@extends('supplier.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Orders Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Orders entered between </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Orders</li>
												<li class="breadcrumb-item active"><a href="#">Orders Items- Table</a></li>
								</ul>
				</div>
				<div class="d-flex justify-content-center m-3">
								<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
												id="sales_date_form">
												@csrf
												<div class="col">
																<div class="tile-body">
																				<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate" type="text"
																								placeholder="Select Date" autocomplete="off" id="startDate">
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
																								placeholder="Select Date" name="endDate" autocomplete="off">
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
																				<h5> Orders</h5>
																				<p class="text-warning"><b>{{ $ordersdata['ordersitems'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h5> Orders Cost</h5>
																				<p class="text-warning"><b>{{ $ordersdata['ordersCost'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Pending Orders</h5>
																				<p class="text-warning"><b>{{ $ordersdata['ordersPending'] }}</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg-3">
												<div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar-times-o fa-3x"></i>
																<div class="info">
																				<h5>Received Orders</h5>

																				<p class="text-warning">
																								<b>{{ $ordersdata['receivedOrders'] }}</b>
																				</p>

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
																																				<th>Item Amount</th>
																																				<th>Projected Cost</th>
																																				<th>Actual Cost</th>
																																				<th>Order Status</th>
																																				<th>Payment Status</th>
																																				<th>Delivery Status</th>
																																				<th>Date Entered</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($ordersdata['allOrders']['orders'] as $order)
																																				<tr>
																																								<td>
																																												{{ $order->orderId }}
																																								</td>
																																								<td>
																																												{{ $order->items_count }}
																																								</td>
																																								<td>
																																												{{ $order->projected_cost }}
																																								</td>
																																								<td>
																																												{{ $order->actual_cost ?? 'N/A' }}
																																								</td>
																																								<td>
																																												@if ($order->order_status == '-1')
																																																<h5><span class="badge badge-warning">Sent</span></h5>
																																												@elseIf ($order->order_status == '0')
																																																<h5><span class="badge badge-info">Accepted</span></h5>
																																												@elseIf ($order->order_status == '1')
																																																<h5><span class="badge badge-success">Processed</span></h5>
																																												@elseIf ($order->order_status == '-2')
																																																<h5><span class="badge badge-danger">Rejected</span></h5>
																																												@endif
																																								</td>
																																								<td>
																																												@if ($order->payment_status)
																																																<h5><span class="badge badge-success">Paid</span></h5>
																																												@else
																																																<h5><a href="/retails/show"><span class="badge badge-info">Not
																																																												Paid</span></a></h5>
																																												@endif
																																								</td>
																																								<td>
																																												@if ($order->delivery_status)
																																																<h5><span class="badge badge-success">Delivered</span></h5>
																																												@else
																																																<h5><a href="/retails/show"><span class="badge badge-warning">Pending
																																																								</span></a></h5>
																																												@endif
																																								</td>

																																								<td>
																																												{{ $order->created_at }}
																																								</td>
																																								<td><a href="/client/orders/show/{{ $order->id }}"><i class="fa fa-eye ">
																																																				View</i></a></td>


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
