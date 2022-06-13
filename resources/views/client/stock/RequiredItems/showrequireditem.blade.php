@extends('Layouts.app')
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
								@if (session()->has('message'))
												<div class="container-fluid alert alert-danger">
																{{ session()->get('message') }}
												</div>
								@endif

								@if (session()->has('success'))
												<div class="container-fluid alert alert-success">
																{{ session()->get('success') }}
												</div>
								@endif
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
																																								<th>Item </th>
																																								<th>Item Name</th>
																																								<th>Item Size</th>
																																								<th>Item Amount</th>
																																								<th>Price</th>
																																								<th>Order</th>
																																								<th>Delete</th>


																																				</tr>
																																</thead>
																																<tbody>




																																				@foreach ($stocksdata['allStocks'] as $stock)
																																								<tr>
																																												<td>
																																																<div class="col-sm-3">
																																																				<img class="icon d-flex w-100"
																																																								src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																																								alt="{{ $stock['itemNameId'] }}">
																																																</div>
																																												</td>
																																												<td>{{ $stock['stockName'] }}</td>
																																												<td>{{ $stock['stockSize'] }}</td>
																																												<td>{{ $stock['stockAmount'] }}</td>

																																												<td>{{ $stock['price'] }}</td>
																																												@if (!$stock['isRequired'])
																																																<td><a href="/stock/Set-as-Required/{{ $stock['id'] }}"
																																																								class="btn btn-info"><i class="fa fa-trash-o" aria-hidden="true">
																																																												Mark as Required</i></a></td>
																																												@else
																																																<td>
																																																				<div class="animated-checkbox">
																																																								<label>
																																																												<input type="checkbox" id="cborder"
																																																																name="{{ $stock['stockName'] }}"
																																																																value="{{ $stock['id'] }}"><span
																																																																class="label-text">Order</span>
																																																								</label>
																																																				</div>
																																																</td>
																																												@endif

																																												<td><a href="/stock/delete/{{ $stock['id'] }}"><i class="fa fa-trash-o"
																																																								aria-hidden="true"> Delete</i></a></td>



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

				            document.getElementById("cborder").checked = true;
				            document.getElementById("cbcheckall").checked = true;
				            document.getElementById("checkall").innerHTML = "UnSelect all";
				        } else {
				            uncheck();
				        }



				    }

				    function uncheck() {
				        document.getElementById("cborder").checked = false;
				        document.getElementById("cbcheckall").checked = false;

				        document.getElementById("checkall").innerHTML = "Select all";
				    }
				</script>
@endsection
