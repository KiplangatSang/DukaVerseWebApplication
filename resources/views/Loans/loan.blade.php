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
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Loan Type</th>
																																				<th>Loan Amount</th>
																																				<th>Loan Duration</th>
																																				<th>Loan Status</th>
																																				<th>Assigned By</th>
																																				<th>Assigned at</th>
																																				<th>View Loan </th>

																																				@can('view-loan', $loans)
																																				@endcan

																																</tr>

																												</thead>
																												<tbody>
																																@foreach ($loans as $loan)
																																				<tr>


																																								<td>{{ $loan->loan_type }}</td>
																																								<td>{{ 'Ksh ' . $loan->loan_amount }}</td>
																																								<td>{{ $loan->loan_duration . ' Days' }}</td>
																																								<td>{{ $loan->loan_status }}</td>
																																								<td>{{ $loan->loan_assigned_at }}</td>
																																								<td>{{ $loan->loan_assigned_by }}</td>
																																								<td><a href="/sales-item/{{$loan->id}}"><i class="fa fa-eye col"> View</i></a></td>


																																								@can('view-loan', $loans)
																																								@endcan

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
