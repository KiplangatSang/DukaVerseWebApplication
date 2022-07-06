@extends('layouts.app')
@section('content')
				<div class="app-title">


								<div>
												<h1><i class="fa fa-th-list"></i> Loans History</h1>
												<p>List of Loans that have been requested</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Loans</li>
												<li class="breadcrumb-item active"><a href="#">Loan History</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-12">


												@if (count($loans) < 1)
																<div class="container-fluid alert alert-info mx-auto justify-content-center">
																				<h5 class="text-display-4 text-danger text-align-center ">You have no Loans History</h5>
																</div>
												@else
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
                                                                                                                                                                <th>Loan Discount</th>
                                                                                                                                                                <th>Paid Amount</th>
                                                                                                                                                                <th>Payment Status</th>
																																								<th>Assigned By</th>
																																								<th>Assigned at</th>
																																								<th>View Loan </th>
																																				</tr>

																																</thead>
																																<tbody>
																																				@foreach ($loans as $application)
																																								<tr>
																																												{{-- {{dd($loan)}} --}}


																																												<td>{{ $application->loan->loan_type }}</td>
																																												<td>{{ 'Ksh ' . $application->loan_amount }}</td>
																																												<td>{{ $application->loan_duration . ' Months' }}</td>
																																												<td>
																																																@if ($application->loan_status == '-1')
																																																				<h5><span class="badge badge-warning">Sent</span></h5>
																																																@elseIf ($application->loan_status == '0')
																																																				<h5><span class="badge badge-info">Accepted</span></h5>
																																																@elseIf ($application->loan_status == '1')
																																																				<h5><span class="badge badge-dark">Processed</span></h5>
																																																@elseIf ($application->loan_status == '-2')
																																																				<h5><span class="badge badge-danger">Rejected</span></h5>
																																																@elseIf ($application->loan_status == '2')
																																																				<h5><span class="badge badge-success">Disbursed</span></h5>
																																																@else
																																																				{{ $application->loan_status }}
																																																@endif
																																												</td>
                                                                                                                                                                                <td>{{ 'Ksh ' . $application->loan_discount }}</td>
                                                                                                                                                                                <td>{{ 'Ksh ' . $application->loan_repaid_amount }}</td>

																																												<td>
																																																@if (!$application->repayment_status)
                                                                                                                                                                                                {{-- <h5><span class="badge badge-danger">{{$application->repayment_status}}</span></h5> --}}
																																																				<h5><span class="badge badge-danger">Unpaid</span></h5>

																																																@elseIf ($application->repayment_status == true)
                                                                                                                                                                                                {{-- <h5><span class="badge badge-danger">{{$application->repayment_status}}</span></h5> --}}
																																																				<h5><span class="badge badge-success">Paid</span></h5>
																																																@else
                                                                                                                                                                                                <h5><span class="badge badge-info">Unknown</span></h5>
																																																@endif
																																												</td>
																																												<td>{{ $application->loan_assigned_at }}</td>
																																												<td>{{ $application->loan_assigned_by }}</td>
																																												<td><a  {{-- /client/loans/applied/show//{{ $application->id }} --}}
																																																				href="/client/loans/applied/show/{{ $application->id }}"><i
																																																								class="fa fa-eye col">
																																																								View</i></a></td>


																																												@can('view-loan', $loans)
																																												@endcan

																																								</tr>
																																				@endforeach

																																</tbody>
																												</table>
																								</div>
																				</div>
																</div>
												@endif

								</div>
				</div>
@endsection
