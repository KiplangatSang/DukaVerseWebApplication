@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Suppliers Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Suppliers entered between </p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Stock</li>
												<li class="breadcrumb-item active"><a href="#">Stock Items- Table</a></li>
								</ul>
				</div>


				<div class="d-flex justify-content-center m-3">
								<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
												id="sales_date_form">
												@csrf
												<div class="col">
																<div class="tile-body">
																				<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate" id="startDate"
																								type="text" placeholder="Select Date" autocomplete="off">
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
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Supply ID</th>
																																				<th>Supplier Name</th>
																																				<th>Items</th>
																																				<th>Pay Status</th>
																																				<th>Paid Amount</th>
																																				<th>Pay Remaining</th>
																																				<th>Date Entered</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($suppliesdata['supplies'] as $supplier)
																																				<tr>
																																								<td>
																																												{{ $supplies->supply_id }}
																																								</td>

																																								<td>
																																												{{ $supplies->supply_id }}

																																								</td>
																																								<td>
																																												{{ $supplies->supplier_name }}
																																								</td>
																																								<td>
																																												{{ $supplier->supply_items }}
																																								</td>
																																								<td>
																																												{{ $supplier->pay_status }}
																																								</td>
																																								<td>
																																												{{ $supplier->paid_amount }}
																																								</td>
																																								<td>
																																												{{ $supplier->payment_balance }}
																																								</td>

																																								<td>
																																												{{ $supplier->created_at }}
																																								</td>
																																								<td><a href="/supplies/suppliers/show/{{ $supplier->id }}"><i
																																																				class="fa fa-eye ">
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
