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

                                                                                    <div class="clearix"></div>
                                                                                    <div class="col-md-12">
                                                                                      <div class="tile">
                                                                                        <h3 class="tile-title">{{$RetailName}}</h3>
                                                                                        <div class="tile-body">
                                                                                          <form class="row">
                                                                                            <div class="form-group col-md-3">
                                                                                              <label class="control-label">{{$RetailName}}</label>
                                                                                              <input class="form-control" type="text" placeholder="Enter your name">
                                                                                            </div>
                                                                                            <div class="form-group col-md-3">
                                                                                              <label class="control-label">{{$RetailName}}</label>
                                                                                              <input class="form-control" type="text" placeholder="Enter your email">
                                                                                            </div>
                                                                                            <div class="form-group col-md-4 align-self-end">
                                                                                              <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>View</button>
                                                                                            </div>
                                                                                          </form>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>


																				</div>
																</div>
												</div>
								</div>
				</div>

@endsection
