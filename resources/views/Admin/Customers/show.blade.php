@extends('Admin.Layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-edit"></i>Storm5 Customers</h1>
												<p>View Customer</p>
								</div>
								<ul class="app-breadcrumb breadcrumb">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Customers </li>
												<li class="breadcrumb-item"><a href="#">Customer</a></li>
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

																				<h3 class="tile-title">{{ $customerdata['customer']->name }}</h3>
																</div>
																<div class="row">
																				<div class="app-sidebar__user col-md-4">
																								<div class="col-md-8">
																												<img class="app-sidebar__user-avatar d-flex w-25 ml-3"
																																src="/storage/RetailPictures/{{ $customerdata['customer']->empProfile ?? 'noprofile.png' }}"
																																alt="User Image">
																								</div>


																				</div>
																				<div class="app-sidebar__user col-md-8">
																								<div class="tile-body row d-flex justify-content-center">

																												<a class="mr-3" href="/customers/edit/{{$customerdata['customer']->id}}"><button
																																				class="btn btn-primary"> Update Customer
																																</button></a>
																												<a class="mr-3" href="/customers/credit/index/{{$customerdata['customer']->id}}"><button class="btn btn-success "> Show Customer Credit
																																</button></a>

																												<a class="mr-3" href="#"><button class="btn btn-info "> Notify Customer
																																</button></a>
																												<a class="mr-3" href="/customers/delete/{{ $customerdata['customer']->id }}"><button class="btn btn-danger "> Delete Customer
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
																												<h5 class="dispalay-3 ">{{ $customerdata['customer']->name }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Email</h5>
																												<h5 class="dispalay-3 ">{{ $customerdata['customer']->email }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">ID Number</h5>
																												<h5 class="dispalay-3 ">{{ $customerdata['customer']->id_number }}</h5>

																								</div>

																				</div>
																				<div class="col">
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Phone Number</h5>
																												<h5 class="dispalay-3 ">{{ $customerdata['customer']->phone_number }}</h5>

																								</div>
																								<div class="row">
																												<h5 class="dispalay-4 text-muted mr-3">Address</h5>
																												<h5 class="dispalay-3 ">{{ $customerdata['customer']->address }}</h5>

																								</div>
																				</div>


																</div>

																<hr>



												</div>
								</div>
				</div>

@endsection
