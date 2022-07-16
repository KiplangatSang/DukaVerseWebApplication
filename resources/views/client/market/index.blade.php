@extends('layouts.app')
@section('content')
				<div>
								<div class="row">
												@if (isset($marketdata['requiredItems']))
																<div class="container-fluid bg-white price-input  p-5 " id="div_required_items">
																				<div class=" col-md col-xl-7 mx-auto d-flex justify-content-center ">
																								<div class="row">
																												<div class="col-md-12">
																																<div class="tile">
																																				<div class="tile-body">
																																								<div class="table-responsive">
																																												<form action="/client/requireditems/order"
																																																enctype="application/x-www-form-urlencoded" method="POST">
																																																@csrf

																																																<div class="row m-3">
																																																				<div class="col col-md-6 col-xl-6">
																																																								<div class="row">
																																																												<div class="animated-checkbox d-flex m-2">
																																																																<label>
																																																																				<input type="checkbox" id="cbcheckall"><span
																																																																								class="label-text"><strong id="checkall">Select
																																																																												all</strong></span>
																																																																</label>
																																																												</div>
																																																												<div class="text-success row m-2 mx-auto">
																																																																<h3 class="ml-2">Items</h3>
																																																																<h3 class="ml-2" id="items_selected">0</h3>
																																																												</div>
																																																												<div>
																																																																<button type="button" class="btn btn-info"
																																																																				id="btn_close_table">Add Items <i
																																																																								class="fa fa-cart-arrow-down"></i></button>
																																																												</div>
																																																								</div>
																																																				</div>
																																																				<div class="col col-md-6 col-xl-6">
																																																								<div class=" float-right">
																																																												<button class="btn btn-success" type="Submit" id="btn_order"
																																																																disabled>Order
																																																																Selected</button>
																																																								</div>

																																																				</div>
																																																</div>
																																																<div class="tile ">
																																																				<div class="tile-body">
																																																								<div class="table-responsive">
																																																												<table class="table table-hover table-bordered"
																																																																id="sampleTable">
																																																																<thead>
																																																																				<tr>
																																																																								<th>Item </th>
																																																																								<th>Item Name</th>
																																																																								<th>Brand</th>
																																																																								<th>Size</th>
																																																																								<th>Required Amount</th>
																																																																								<th>Cost per Item</th>
																																																																								<th>Order Status</th>
																																																																								<th>View</th>
																																																																				</tr>
																																																																</thead>
																																																																<tbody>
																																																																				@foreach ($marketdata['requiredItems'] as $stockitem)
																																																																								<tr>
																																																																												<td>
																																																																																<div>
																																																																																				<img class="icon d-flex w-75"
																																																																																								src="{{ $stockitem->items->image ?? 'noprofile.png' }}"
																																																																																								alt="{{ $stockitem->items->name }}">
																																																																																</div>
																																																																												</td>
																																																																												<td>
																																																																																{{ $stockitem->items->name }}
																																																																												</td>
																																																																												<td>
																																																																																{{ $stockitem->items->brand }}
																																																																												</td>
																																																																												<td>
																																																																																{{ $stockitem->items->size }}
																																																																												</td>
																																																																												<td>
																																																																																{{-- <div >
																																																																																				<input type="number"
																																																																																								class="form-control"
																																																																																								name="{{ $stockitem->id }}"
																																																																																								value="{{ $stockitem->required_amount ?? 0 }}">
																																																																																</div> --}}
																																																																																{{ $stockitem->required_amount ?? 0 }}
																																																																												</td>
																																																																												<td>
																																																																																{{ $stockitem->projected_cost }}
																																																																												</td>
																																																																												</td>
																																																																												<td>
																																																																																<div class="animated-checkbox">
																																																																																				<label>
																																																																																								<input type="checkbox"
																																																																																												id="cborder"
																																																																																												name="{{ $stockitem->items->name }}"
																																																																																												value="{{ $stockitem->id }}"><span
																																																																																												class="label-text"
																																																																																												onclick="onCheckboxChange()">Order</span>
																																																																																				</label>
																																																																																</div>
																																																																												</td>

																																																																												<td>

																																																																																<a
																																																																																				href="/market/delete/{{ $stockitem->items->id }}">
																																																																																				<strong><span
																																																																																												class="badge badge-danger p-2">Remove
																																																																																												<i class="fa fa-trash ">
																																																																																												</i>
																																																																																								</span></a></strong>
																																																																												</td>

																																																																								</tr>
																																																																				@endforeach
																																																																</tbody>
																																																												</table>
																																																								</div>
																																																				</div>
																																																</div>

																																												</form>
																																								</div>
																																				</div>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
												@endif
												@if (isset($marketdata['retailItem']))
																<div class="item col-md col-xl price-input bg-light p-5 ">
																				<div class="container-fluid d-flex justify-content-center ">
																								<div class="item col-md-5 col-xl-3 mx-auto p-3 border border-success">
																												<form action="/market/store" method="POST" enctype="application/x-www-form-urlencoded">
																																@csrf
																																<div class=" d-flex justify-content-center">
																																				<h3><strong>{{ $marketdata['retailItem']->name }}</strong></h3>

																																</div>
																																<div class="row">
																																				<div class="col">
																																								<p><Strong>{{ $marketdata['retailItem']->brand }}</Strong></p>
																																				</div>
																																				<div class="col">
																																								<div class="float-right ">
																																												@if ($marketdata['retailItem']->selling_price)
																																																<h5><span
																																																								class="badge badge-success p-2">{{ $marketdata['retailItem']->selling_price . ' Ksh' }}
																																																				</span>
																																																</h5>
																																												@endif
																																								</div>
																																				</div>
																																</div>
																																<img class="d-flex w-100 well" src="{{ $marketdata['retailItem']->image }}"
																																				alt=">{{ $marketdata['retailItem']->name }}">
																																<p>{{ $marketdata['retailItem']->description }}</p>

																																<h3>Enter amount</h3>
																																<input class="form-control" type="number" name="{{ $marketdata['retailItem']->id }}"
																																				id="{{ $marketdata['retailItem']->name }}" placeholder="Enter amount" required>
																																<div class="p-2 d-flex justify-content-center">
																																				<button type="submit" class="btn btn-primary">Submit</button>
																																</div>
																												</form>
																								</div>
																				</div>
																</div>
												@endif

								</div>
				</div>
				<div class="container-fluid">
								<div class="col d-flex justify-content-center">
												<div class="ml-2 p-3">
																<h1>Click on item to select</h1>
												</div>
												<div class="ml-2 p-3">
																@if (isset($marketdata['requiredItems']))
																				<button class="btn btn-dark" id="btn_view_selected"> View {{ count($marketdata['requiredItems']) }}
																								Selected Items <i class="fa fa-cart-arrow-down"></i></button>
																@endif
												</div>
								</div>
								<div class="col-md-12 mx-auto">
												<div class="columns mx-1">
																<section>
																				<div class="row">
																								<div class="col">
																												<div class="float-right">
																																<li class="app-search float-left">
																																				<input class="app-search__input" type="search" placeholder="Search" id="searchbox">
																																				<button class="app-search__button"><i class="fa fa-search"></i></button>
																																</li>
																												</div>
																								</div>
																				</div>
																</section>
																<section>
																				<div class="container">
																								<div class="row mx-auto p-2">
																												@foreach ($marketdata['items'] as $marketitem)
																																<div class="item well col-md-6 col-xl-3 pb-2 m-3">
																																				<a href="/market/show/{{ $marketitem->id }}">
																																								<div>
																																												<h3><strong>{{ $marketitem->name }}</strong></h3>
																																												<small>{{ $marketitem->brand }}</small>
																																												<img class="d-flex w-100 well" src="{{ $marketitem->image }}"
																																																alt=">{{ $marketitem->name }}">
																																												<p>{{ $marketitem->description }}</p>
																																												@if ($marketitem->selling_price)
																																																<h5><span
																																																								class="badge badge-success p-2">{{ $marketitem->selling_price . ' Ksh' }}
																																																				</span>
																																																</h5>
																																												@endif
																																								</div>
																																				</a>
																																</div>
																												@endforeach
																								</div>
																				</div>
																</section>
												</div>
								</div>
				</div>
				<script>
				    $(document).ready(function() {
				        $("#div_required_items").hide();
				    });
				    $("#searchbox").keyup(function() {
				        let txt = this.value;
				        $('.item').hide();
				        $(".item").each(function() {
				            console.log($(this).text().toUpperCase().indexOf(txt.toUpperCase()));
				            if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
				                $(this).show();
				            }
				        });
				    });
				</script>
				<script>
				    $("#btn_close_table").click(function() {
				        $("#div_required_items").hide();
				    });
				    $("#btn_view_selected").click(function() {
				        $("#div_required_items").show();
				    });

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
