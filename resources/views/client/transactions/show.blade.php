@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Transactions Table</h1>
												<div class="row">
																<div class="col">
																				<p class="p-2">Transactions Item</p>

																</div>

												</div>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Transactions</li>
												<li class="breadcrumb-item active"><a href="#">Transactions Table</a></li>
								</ul>
				</div>

				<div class="row">
								<div class="col-md-12 d-flex justify-content-center">
												<div class="col-md-6 col-xl-4 item bg-light p-4  mx-3 ">
																<div class="tile-title">
                                                                    <div class="d-flex justify-content-center">
																				<h4>
																							<Strong>Trans Id :{{ $transactiondata['transaction']->trans_id }}</Strong>
                                                                                </h4>
                                                                    </div>
																</div>
																<div class="tile-body ">
																				<div class="d-flex justify-content-center">
																								<p>
																												Gateway :{{ $transactiondata['transaction']->gateway }}
																								</p>
																				</div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Amount
																								:{{ $transactiondata['transaction']->amount . ' ' . $transactiondata['transaction']->currency }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Cost
																								:{{ $transactiondata['transaction']->cost . ' ' . $transactiondata['transaction']->currency }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Total
																								:{{ $transactiondata['transaction']->total_amount . ' ' . $transactiondata['transaction']->currency }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Account :{{ $transactiondata['transaction']->party_A ?? 'N/A' }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Receiver Party :{{ $transactiondata['transaction']->party_B ?? 'N/A' }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Purpose :{{ $transactiondata['transaction']->purpose }}
																				</p>
                                                                            </div>
                                                                                <div class="d-flex justify-content-center">
																				<p>
																								Date :{{ $transactiondata['transaction']->created_at }}</a>
																				</p>
                                                                                </div>
																</div>
												</div>
								</div>
				</div>
@endsection
