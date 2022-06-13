@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i> Add an Item You Sold</h1>
												<p>Sold Items Registration</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item"><a href="#">Add Sold Item</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col">

												<div class="tile row">
																<div class="col-md col-xl">
																				<div class="tile-body">
																								<div class="table-responsive">
																												<table class="table table-hover table-bordered" id="sampleTable">
																																<thead>
																																				<tr>
																																								<th>Item </th>
																																								<th>Item Name</th>
																																								<th>Size/Type</th>
																																								<th>Price</th>
																																								<th>View</th>
																																				</tr>
																																</thead>
																																<tbody>
																																				@foreach ($stockdata['allStock'] as $stock)
																																								<tr>

																																												<td>
																																																<div class="col-sm-6">
																																																				<img class="icon d-flex w-100"
																																																								src="{{ $stock['itemImage'] ?? 'noprofile.png' }}"
																																																								alt="{{ $stock['stockName'] }}">
																																																</div>

																																												</td>
																																												<td>
																																																{{ $stock->stockName . ' ' . $stock->brand }}
																																												</td>
																																												<td>
																																																{{ $stock->stockSize }}
																																												</td>

																																												<td>
																																																{{ $stock->price }}
																																												</td>

																																												<td>
                                                                                                                                                                                    <div class="animated-checkbox">
                                                                                                                                                                                        <label>
                                                                                                                                                                                                        <input type="checkbox" id="cborder"
                                                                                                                                                                                                                        name="{{ $stock['stockName'] }}"
                                                                                                                                                                                                                        value="{{ $stock['id'] }}"><span
                                                                                                                                                                                                                        class="label-text">Sell</span>
                                                                                                                                                                                        </label>
                                                                                                                                                                        </div>
                                                                                                                                                                                    {{-- <a href="/client/sales/show/{{ $stock->id }}"><i class="fa fa-eye ">
																																																								View</i></a> --}}

                                                                                                                                                                                                                            </td>

																																								</tr>
																																				@endforeach
																																</tbody>
																												</table>
																								</div>
																				</div>
																</div>
																<div class="col-md col-xl">
																				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/client/sales/store">
																								@csrf
																								<h3 class="tile-title">Sales Items</h3>
																								<div class="tile-body">
																												<div class="form-group row">
																																<label class="control-label col-md-3">Item Name</label>
																																<div class="col-md-8">
																																				<input class="form-control  @error('itemName') is-invalid @enderror" id="itemName"
																																								name="itemName" type="text" placeholder="Enter sold item's name">

																																				@error('itemName')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Amount</label>
																																<div class="col-md-8">
																																				<input class="form-control col-md-8  @error('itemAmount') is-invalid @enderror"
																																								id="itemAmount" name="itemAmount" type="number" placeholder="Enter amount sold">

																																				@error('itemAmount')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Price</label>
																																<div class="col-md-8">
																																				<input class="form-control col-md-8  @error('price') is-invalid @enderror" id="price"
																																								name="price" type="number" placeholder="Enter the price per item">

																																				@error('price')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>
																												<div class="form-group row">
																																<label class="control-label col-md-3">Description</label>
																																<div class="col-md-8">
																																				<input class="form-control   @error('description') is-invalid @enderror"
																																								id="description" name="description" type="text" placeholder="Describe the item">

																																				@error('description')
																																								<span class="invalid-feedback" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror

																																</div>
																												</div>


																								</div>
																								<div class="tile-footer">
																												<div class="row">
																																<div class="col-md-8 col-md-offset-3">
																																				<button class="btn btn-primary" type="submit"><i
																																												class="fa fa-fw fa-lg fa-check-circle"></i>Sell</button>

																																</div>
																												</div>
																								</div>
																				</form>
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

				<script>
				    function getBluetooth() {
				        navigator.bluetooth.requestDevice({
				                acceptAllDevices: true,
				                optionalServices: ['battery_service'] // Required to access service later.
				            })
				            .then(device => {
				                /* … */
				            })
				            .catch(error => {
				                console.error(error);
				            });
				    }

				    function getBluetooth1() {
				        navigator.bluetooth.requestDevice({
				                filters: [{
				                    services: ['health_thermometer']
				                }]
				            })
				            .then(device => device.gatt.connect())
				            .then(server => server.getPrimaryService('health_thermometer'))
				            .then(service => service.getCharacteristic('measurement_interval'))
				            .then(characteristic => characteristic.getDescriptor('gatt.characteristic_user_description'))
				            .then(descriptor => descriptor.readValue())
				            .then(value => {
				                const decoder = new TextDecoder('utf-8');
				                console.log(`User Description: ${decoder.decode(value)}`);
				            })
				            .catch(error => {
				                console.error(error);
				            });
				    }
				</script>
@endsection
