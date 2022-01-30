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
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                                    <th>Loan Type</th>
                                    <th>Loan Range</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Description</th>
                                @can('view-loan', $loan)
                                <th>Repayment Status</th>
                                <th>Active Loan Users</th>
                                <th>Active Loan Repayments</th>
                                <th>Passive Loan Users</th>
                                <th>Passive Loan Repayments</th>
                                @endcan

                    </tr>

    </thead>
    <tbody>
                    <tr>


                                    <td>{{$loan['Loan Type']}}</td>
                                    <td>{{$loan['Loan Range']}}</td>
                                    <td>{{$loan['Loan Amount']}}</td>
                                    <td>{{$loan['Loan Description']}}</td>
                                @can('view-loan', $loan)
                                <td>{{$loan['Repayment Status']}}</td>
                                <td>{{$loan['Active Loan Users']}}</td>
                                <td>{{$loan['Active Loan Repayments']}}</td>
                                <td>{{$loan['Passive Loan Users']}}</td>
                                <td>{{$loan['Passive Loan Repayments']}}</td>

                                @endcan
                    </tr>
    </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
