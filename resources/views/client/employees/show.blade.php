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

								<div class="col ">
												<div class="tile col ">

																<div class="d-flex justify-content-center">

																				<h3 class="tile-title">{{ $empdata['emp']->emp_name }}</h3>
																</div>
																<div class="row">
																				<div class="app-sidebar__user col-md-4">
																								<div class="col-md-8">
																												<img class="app-sidebar__user-avatar d-flex w-25 ml-3"
																																src="{{ $empdata['emp']->emp_profile ?? 'noprofile.png' }}" alt="Profile">
																								</div>
																				</div>
																				<div class="app-sidebar__user col-md-8">
																								<div class="tile-body row d-flex justify-content-center">

																												<a class="mr-3" href="/client/employee/edit/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-primary"> Update Employee
																																</button></a>
																												<a class="mr-3" href="/client/sales/employee/show/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-success "> Show Sales
																																</button></a>

																												<a class="mr-3" href="/client/employee/salaries/show/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-info "> Show Salaries
																																</button></a>
																												<a class="mr-3" href="/client/employee/salary/create/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-secondary"> Pay Employee
																																</button></a>
																												<a class="mr-3" href="/client/employee/delete/{{ $empdata['emp']->id }}"><button
																																				class="btn btn-danger "> Delete Employee
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
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_name }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Email</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_email }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Role</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_role }}</h5>

																								</div>

																				</div>
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Phone Number</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_phoneno }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">ID/Passport</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_ID }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Salary</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_salary }}</h5>

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
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_NHIF ?? 'N/A' }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">NSSF</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_NSSF ?? 'N/A' }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">KRA</h5>
																												<h5 class="dispalay-3 ">{{ $empdata['emp']->emp_KRA ?? 'N/A' }}</h5>

																								</div>

																				</div>



																</div>
												</div>
								</div>
				</div>
@endsection
