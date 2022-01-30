@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Data Table</h1>
												<p>Table to display analytical data effectively</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Tables</li>
												<li class="breadcrumb-item active"><a href="#">Data Table</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-12">
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
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>

																																<tr>
																																				<th>Name</th>
																																				<th>Email</th>
																																				<th>National ID</th>
																																				<th>Role</th>
																																				<th>Date Employed</th>
																																				<th>Salary</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($empdata['emplist'] as $data)
																																				<tr>
																																								<td>{{ $data['empName'] }}</td>
																																								<td>{{ $data['empEmail'] }}</td>
																																								<td>{{ $data['empNationalId'] }}</td>
																																								<td>{{ $data['empRole'] }}</td>
																																								<td>{{ $data['dateEmployed'] }}</td>
																																								<td>{{ $data['salary'] }}</td>
																																								<td><a href="/employee/viewEmployee/{{ $data->id }}"><i class="fa fa-eye col">
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
