@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i>Sales Transactions Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Sales Transactions</p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Sales Transactions</li>
												<li class="breadcrumb-item active"><a href="#">Sales Transactions Table</a></li>
								</ul>
				</div>
				<div class="row">
								<div class="col-md-6 col-lg">
												<div class="widget-small primary coloured-icon"><i class="icon fa fa-money "></i>
																<div class="info">
																				<h4>Total ksh</h4>

																				<p class="text-warning"><b>{{ $transactiondata['amount'] }} ksh</b></p>
																</div>
												</div>
								</div>
								<div class="col-md-6 col-lg">
												<div class="widget-small info coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
																<div class="info">
																				<h4>No of Transactions</h4>
																				<p class="text-warning"><b>{{ count($transactiondata['transactions']) }} </b></p>
																</div>
												</div>
								</div>



				</div>
				<div class="row">
								<div class="col-md-12">
												<div class="tile">
																<div class="tile-body">
																				<div class="table-responsive">
																								<table class="table table-hover table-bordered" id="sampleTable">
																												<thead>
																																<tr>
																																				<th>Trans Id</th>
																																				<th>Gateway</th>
																																				<th>Amount</th>
																																				<th>Cost</th>
																																				<th>Total</th>
																																				<th>Account</th>
																																				<th>Receiver Party</th>
																																				<th>Purpose</th>
																																				<th>Date Sold</th>
																																				<th>View</th>
																																</tr>
																												</thead>
																												<tbody>
																																@foreach ($transactiondata['transactions'] as $transaction)
																																				<tr>
																																								<td>
																																												{{ $transaction->trans_id }}
																																								</td>
																																								<td>
																																												{{ $transaction->gateway }}
																																								</td>
																																								<td>
																																												{{ $transaction->amount . ' ' . $transaction->currency }}
																																								</td>
																																								<td>
																																												{{ $transaction->cost . ' ' . $transaction->currency }}
																																								</td>
																																								<td>
																																												{{ $transaction->total_amount . ' ' . $transaction->currency }}
																																								</td>
																																								<td>
																																												{{ $transaction->party_A ?? 'N/A' }}
																																								</td>
																																								<td>
																																												{{ $transaction->party_B ?? 'N/A' }}
																																								</td>
																																								<td>
																																												{{ $transaction->purpose }}
																																								</td>
																																								<td>
																																												{{ $transaction->created_at }}</a>
																																								</td>
																																								<td><a href="/client/transactions/show/{{ $transaction->id }}"><i
																																																				class="fa fa-eye ">
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
