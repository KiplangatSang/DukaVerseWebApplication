@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Sales Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">All Sales done between </p>

																</div>
												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales</li>
												<li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
								</ul>
				</div>
				<div class="d-flex justify-content-center m-3">

								<form class="row form formcontrol" method="GET" action="/sales/sales-by-date" enctype="multipart/form-data"
												id="sales_date_form">
												@csrf
												<h6 class="mt-2">Sales Between</h6>
												<div class="col">
																<div class="tile-body">
																				<input class="form-control  @error('startDate') is-invalid @enderror" name="startDate" type="text"
																								placeholder="Start Date" autocomplete="off" id="startDate">
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
																								placeholder="End Date" name="endDate" autocomplete="off">
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
																																				<th>Emp Id </th>
																																				<th>Emp Name</th>
																																				<th>Email</th>
																																				<th>Phone Number</th>
																																				<th>User Name</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($salesdata['employees'] as $emp)
																																				@if (count($emp->sales) > 0)
																																								<tr>
																																												<td>
																																																{{ $emp->id }}
																																												</td>

																																												<td>
																																																{{ $emp->emp_name }}
																																												</td>
																																												<td>
																																																{{ $emp->emp_email }}
																																												</td>
																																												<td>
																																																{{ $emp->emp_phoneno }}
																																												</td>
																																												<td>
																																																{{ $emp->user_name }}
																																												</td>

																																												<td>
																																																@if (count($emp->sales()->get()) > 1)
																																																				<a class="btn btn-info"
																																																								href="/client/sales/employee/show/{{ $emp->id }}"><i
																																																												class="fa fa-eye ">
																																																												View</i></a>
																																																@else
																																																				<strong>No Sales</strong>
																																																@endif


																																												</td>

																																								</tr>
																																				@endif
																																@endforeach
																												</tbody>
																								</table>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection
