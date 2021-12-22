@extends('layouts.app')
@section('content')
    <div class="app-title">
      <div>
        <h1><i class="fa fa-pie-chart"></i> Charts</h1>
        <p>Various type of charts for your project</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">charts</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Line Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Bar Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Radar Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="radarChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Polar Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="polarChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Pie Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Doughnut Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="doughnutChartDemo"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection
