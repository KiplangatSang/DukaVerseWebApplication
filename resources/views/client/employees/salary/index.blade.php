@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> {{ auth()->user()->name }} Salaries</h1>
												<p>Salaries</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Salaries</li>
												<li class="breadcrumb-item active"><a href="#">Salaries List</a></li>
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
																																				<th>Employee</th>
																																				<th>Amount</th>
																																				<th>Deductions</th>
																																				<th>Account</th>
																																				<th>Paid By</th>
																																				<th>Salary</th>
																																				<th>Comment</th>
																																				<th>Month</th>
																																				<th>Date</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($empdata as $salary)
																																				<tr>
																																								<td>{{ $salary->employees->emp_name }}</td>
																																								<td>{{ $salary->amount ?? 'N/A' }}</td>
																																								<td>{{ $salary->deductions ?? 'N/A' }}</td>
																																								<td>{{ $salary->account->account ?? 'N/A' }}</td>
																																								<td>{{ $salary->salaryPayer->username ?? 'N/A' }}</td>
																																								<td>{{ $salary->employees->emp_salary }}</td>
																																								<td>{{ $salary['comment'] }}</td>
																																								<td>{{ $salary['created_at']->format('M') . ' ' . $salary['created_at']->format('Y') }}
																																								</td>
																																								<td>{{ $salary['created_at'] }}</td>
																																								<td><a href="/client/employee/salary/show/{{ $salary->id }}"><i
																																																				class="fa fa-eye col">
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
