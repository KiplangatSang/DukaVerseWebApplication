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
																																				<th>Loan Range</th>
																																				<th>Loan Amount</th>
																																				<th>Loan Description</th>
																																				@can('view-loan', $loans)
																																								<th>Repayment Status</th>
																																								<th>Active Loan Users</th>
																																								<th>Active Loan Repayments</th>
																																								<th>Passive Loan Users</th>
																																								<th>Passive Loan Repayments</th>
																																				@endcan

																																</tr>

																												</thead>
																												<tbody>
																																@foreach ($loans as $loan)
                                                                                                                                <tr>
                                                                                                                                    <td>{{ $loan['loan_type'] }}</td>
                                                                                                                                    <td>{{ 'ksh' . $loan['min_loan_range'] . 'ksh' . $loan['max_loan_range'] }}</td>

                                                                                                                                    <td>{{ $loans['loan_description'] }}</td>
                                                                                                                                    @can('view-loan', $loans)
                                                                                                                                                    <td>{{ $loan['repayment_status'] }}</td>
                                                                                                                                                    <td>{{ $loan['active_loan_users'] }}</td>
                                                                                                                                                    <td>{{ $loan['active_loan_repayments'] }}</td>
                                                                                                                                                    <td>{{ $loan['passive_loan_users'] }}</td>
                                                                                                                                                    <td>{{ $loan['passive_loan_repayments'] }}</td>

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

