@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> {{ auth()->user()->name }} Employees</h1>
												<p>List of Employees</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Employees</li>
												<li class="breadcrumb-item active"><a href="#">Employee List</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-12">
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
																																@foreach ($empdata['emplist'] as $emp)
																																				<tr>
																																								<td>{{ $emp['emp_name'] }}</td>
																																								<td>{{ $emp['emp_email'] }}</td>
																																								<td>{{ $emp['emp_ID'] }}</td>
																																								<td>{{ $emp['emp_role'] }}</td>
																																								<td>{{ $emp['created_at'] }}</td>
																																								<td>{{ $emp['emp_salary'] }}</td>
																																								<td><a href="/client/employee/show/{{ $emp->id }}"><i class="fa fa-eye col">
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
