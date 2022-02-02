@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Employees</h1>
												<p>View Employee</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Employees </li>
												<li class="breadcrumb-item"><a href="#">Employee</a></li>
								</ul>
				</div>
				<div class="row">
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
								<div class="col ">
												<div class="tile col ">

																<div class="d-flex justify-content-center">

																				<h3 class="tile-title">{{ $empdata['emp']->empName }}</h3>
																</div>
																<div class="row">
																				<div class="app-sidebar__user col-md-4">
																								<div class="col-md-8">
																												<img class="app-sidebar__user-avatar d-flex w-25 ml-3"
																																src="/storage/RetailPictures/{{ $empdata['emp']->empProfile ?? 'noprofile.png' }}"
																																alt="User Image">
																								</div>


																				</div>
																				<div class="app-sidebar__user col-md-8">
																								<div class="tile-body row d-flex justify-content-center">

																												<a class="mr-3" href="/employee/updateEmployee/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-primary"> Update Employee
																																</button></a>
																												<a class="mr-3" href="#"><button class="btn btn-success "> Show  Sales
																																</button></a>

																												<a class="mr-3" href="#"><button class="btn btn-info "> Show  Salaries
																																</button></a>
																												<a class="mr-3" href="/employee/delete/{{ $empdata['emp']->id }}"><button class="btn btn-danger "> Delete Employee
																																</button></a>
																								</div>

																				</div>


																</div>

												</div>
												<div class="tile">
																<div class="d-flex justify-content-center">
																				<h3 class="tile-title">Personal Details</h3>
																</div>
																<div class="tile-body row p-3">
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Name</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empName }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Email</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empEmail }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Role</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empRole }}</h5>

																								</div>

																				</div>
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Phone Number</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empPhoneno }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">ID/Passport</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empNationalId }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Salary</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->salary }}</h5>

																								</div>

																				</div>


																</div>

																<hr>

																<div class="d-flex justify-content-center">
																				<h3 class="tile-title">Personal Details</h3>
																</div>
																<div class="tile-body row p-3">
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">NHIF</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empName }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">NSSF</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empEmail }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">KRA</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->empRole }}</h5>

																								</div>

																				</div>



																</div>
												</div>
								</div>
				</div>

@endsection
