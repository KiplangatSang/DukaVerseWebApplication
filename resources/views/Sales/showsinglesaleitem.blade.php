@extends('layouts.app')
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Table</h1>
      <p>Table to display analytical data effectively</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Sales</li>
      <li class="breadcrumb-item active"><a href="#">Sales Table</a></li>
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
                  <th>Item Id</th>
                  <th>Item Name</th>
                  <th>Item Size</th>
                  <th>Item Amount</th>
                  <th>Price</th>
                  <th>Date Sold</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                {{dd($allSales)}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
