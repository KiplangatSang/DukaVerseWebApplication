@extends('Layouts.homelayout')


@section('content')

				<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0d628a">
								<a class="navbar-brand text-white ml-3" href="/jobapplication">Retailer</a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
												aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNavDropdown">
												<ul class="navbar-nav">
																<li class="nav-item active ml-3">
																				<a class="navbar-brand text-white" href="#">Supplier <span class="sr-only">(current)</span></a>
																</li>

																<li class="nav-item active ml-3">
																				<a class="navbar-brand text-white" href="#">Customers <span class="sr-only">(current)</span></a>
																</li>

																<li class="nav-item active ml-3">
																				<a class="navbar-brand text-white" href="/blog">Blog</a>
																</li>
												</ul>
								</div>
				</nav>

				<div class="container-fluid">





								<div class="row bg-image justify-content-center"
												style="
																																																																																																																																																																																																																																								background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
																																																																																																																																																																																																																																								height: 100vh;
																																																																																																																																																																																																																																">
												<div class="col-6 col-md-4 mt-5  ml-5">

																<div class="jumbotron justify-content-center bg-white ">
																				<h4 class="display-6 ml-4">Be a Member</h4>
																				<p class="lead ">
																								<a class="btn btn-primary btn-lg offset-5 ml-5 " style="background-color: #b83cfa" href="/register"
																												role="button">Register</a>
																				</p>
																</div>

												</div>


												<div class="col-6 col-md-4 mt-5 ml-5">
																<div class="jumbotron justify-content-center bg-white">

																				<form class="form-formcontrol">
																								<div class="col">
                                                                                                    <h4 class="display-6 ml-4">Access your Account</h4>
                                                                                                    <p class="lead ">
                                                                                                                    <a class="btn btn-primary btn-lg offset-5 ml-5 " style="background-color: #b83cfa" href="/login"
                                                                                                                                    role="button">Sign In</a>
                                                                                                    </p>
																								</div>

																				</form>

																</div>
												</div>
								</div>




								<div class="container m-5">
												<div class="row justify-content-center">
																<h1 class="display-5 text-danger"> Work with us to see your shop or retail grow
																</h1>
												</div>

								</div>

								<div class="container mx-auto row">
												<div class="col">
																<img src="/LegacyImages/interns.jpg" style="height:430px;width:550px;border-right:1px solid #3333 "
																				class="p-3 ">
												</div>
												<div class=" col mt-4 ml-5">
																<div class="row">
																				<div class="card  bg-white">
																								<div class="row mx-auto p-3">
																												<div class="col-sm-10">
																																<h3 class="display-5 text-success">Get your Dream Job </h3>
																																<h5>Get Hired as an Intern at your dreamcompany </h4>
																																				<h5>You are a step closer to arriving at your dream come true workplace </h4>
																												</div>
																												<div class="col-sm-2 mt-5">
																																<a class="mt-5" href=""><i class="fa fa-arrow-circle-right "
																																								style="height: 30px"></i></a>
																												</div>
																								</div>
																				</div>
																</div>
																<div class="row">
																				<div class="card  bg-white mt-3">
																								<div class="row mx-auto p-3">
																												<div class="col-sm-10">
																																<h3 class="display-5 text-success"> Get the Best team to Hire</h3>
																																<h5>Just post your Job vaccancy and job description and let us do the work of advertising
																																				the job </h4>
																																				<h5>You will have the best applying for the job position</h4>
																												</div>
																												<div class="col-sm-2 mt-5">
																																<a class="mt-5" href=""><i class="fa fa-long-arrow-right"></i></a>
																												</div>
																								</div>
																				</div>
																</div>
												</div>

								</div>
								<div class="row mt-5">
												<div class="well mx-auto p-3">
																<p>Whether you need to find top talent, your next great job opportunity .</p>

																<p>Or a consulting solution for managing
																				your business and resourcing challenges, we can help</p><br><br>

												</div>

								</div>

								<div class="row mx-auto">
												<div class="col">
																<div class="card" style="width: 18rem;">
																				<img class="card-img-top" src="/LegacyImages/connection.jpg" alt="Card image cap">
																				<div class="card-body">
																								<p class="card-text">Did you know? Majority of Companies today get their Working force through
																												online platforms?</p>
																								<p class="card-text">Share the experience with us to get the best work force in the Market</p>

																				</div>
																</div>
												</div>
												<div class="col">

																<div class="card" style="width: 18rem;">
																				<img class="card-img-top" src="/LegacyImages/gradguate.jpg" alt="Card image cap">
																				<div class="card-body">
																								<p class="card-text">Majority of our Applicants are gradguates in various fields. </p>
																								<p class="card-text"> Are You a gradguate? Just apply and be among many who successfully
																												acquire a job. </p>
																				</div>
																</div>
												</div>
												<div class="col">
																<div class="card" style="width: 18rem;">
																				<img class="card-img-top" src="/LegacyImages/world.jpg" alt="Card image cap">
																				<div class="card-body">
																								<p class="card-text">The internet has revolutionized the world. </p>
																								<p class="card-text">With more people working from home, make sure you land your dream remote
																												job </p>
																								<p class="card-text">Are you looking for a remote job? Look no further. </p>

																				</div>
																</div>
												</div>
								</div>
								<div class="container mx-auto mt-3">
												<div class="row mx-auto ml-3">
																<div class="col ml-5">
																				<div class="card" style="width: 18rem;">
																								<img class="card-img-top" src="/LegacyImages/bench.jpg" alt="Card image cap">
																								<div class="card-body">

																												<p class="card-text">It is easier to sort the best jobs in town at the comfort of your home
																												</p>
																												<p class="card-text">It is even easier to apply</p>

																								</div>
																				</div>
																</div>
																<div class="col-6">
																				<div class="card" style="width: 18rem;">
																								<img class="card-img-top" src="/LegacyImages/work.jpg" alt="Card image cap">
																								<div class="card-body">
																												<p class="card-text">Study shows it is quicker and more efficient to land a good group
																																online</p>
																												<p class="card-text">Work among the best by applying through HireIntern</p>


																								</div>
																				</div>
																</div>
												</div>
								</div>
				</div>



@endsection
