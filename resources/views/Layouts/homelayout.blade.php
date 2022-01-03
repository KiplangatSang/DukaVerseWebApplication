<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<!-- CSRF Token -->
				<meta name="csrf-token" content="{{ csrf_token() }}">

				<title>{{ config('app.name', 'Storm5') }}</title>

				<!-- Scripts -->
				<script src="{{ asset('js/app.js') }}" defer></script>

				<!-- Fonts -->
				<link rel="dns-prefetch" href="//fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

				<!-- Styles -->
				<link rel="stylesheet" href="{{ asset('css/app.css') }}" />

				<!-- Fonts -->
				<link rel="dns-prefetch" href="//fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

				{{-- font awesome --}}
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


				<title>Mpesa Application</title>
				<nav class="navbar navbar-expand-lg navbar-light bg-white mx-auto px-15" style="background-color: #e7e9eb">
								<a class="navbar-brand" href="#">Home</a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
												aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
								</button>

								<div class="collapse navbar-collapse" id="navbarSupportedContent">
												<ul class="navbar-nav mr-auto">
																<li class="nav-item active">
																				<a class="nav-link" href="#">Retails <span class="sr-only">(current)</span></a>
																</li>
																<li class="nav-item">
																				<a class="nav-link" href="#">Link</a>
																</li>
																<li class="nav-item dropdown">
																				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
																								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																								Account
																				</a>
																				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
																								<a class="dropdown-item" href="#">Customers</a>
																								<a class="dropdown-item " href="#">Retails</a>
																								<div class="dropdown-divider"></div>
                                                                                                <a class="dropdown-item" href="#">Payments and Finance</a>
																								<a class="dropdown-item " href="#">Loans</a>
																								<div class="dropdown-divider"></div>
																								<a class="dropdown-item disabled" href="#">Settings</a>
																				</div>
																<li class="nav-item">
																				<a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Blog</a>
																</li>
								</div>



								<form class="form-inline my-2 my-lg-0">
												<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
												<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
								</form>
								</div>
				</nav>
</head>

<body style="background-color: #eff4f9">
				@yield('content')
</body>

<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
				<!-- Section: Social media -->
				<section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
								<!-- Left -->
								<div class="mx-auto me-5">
												<span>Get connected with us on social networks:</span>
								</div>
								<!-- Left -->

								<!-- Right -->
								<div>
												<a href="" class="text-white me-4">
																<i class="fa fa-facebook-f"></i>
												</a>
												<a href="" class="text-white me-4">
																<i class="fa fa-twitter"></i>
												</a>
												<a href="" class="text-white me-4">
																<i class="fa fa-google"></i>
												</a>
												<a href="" class="text-white me-4">
																<i class="fa fa-instagram"></i>
												</a>
												<a href="" class="text-white me-4">
																<i class="fa fa-linkedin"></i>
												</a>
												<a href="" class="text-white me-4">
																<i class="fa fa-github"></i>
												</a>
								</div>
								<!-- Right -->
				</section>
				<!-- Section: Social media -->

				<!-- Section: Links  -->
				<section class="">
								<div class="container text-center text-md-start mt-5">
												<!-- Grid row -->
												<div class="row mt-3">
																<!-- Grid column -->
																<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
																				<!-- Content -->
																				<h6 class="text-uppercase fw-bold">Storm5</h6>
																				<hr class="mb-4 mt-0 d-inline-block mx-auto"
																								style="width: 60px; background-color: #7c4dff; height: 2px" />
																				<p>
																								Storm5 is a company under Storms Group Of Companies specializing in E-Commerce.
																								We provide the best sservices in retail shop management and digital loans for our customers
																				</p>
																</div>
																<!-- Grid column -->

																<!-- Grid column -->
																<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
																				<!-- Links -->
																				<h6 class="text-uppercase fw-bold">Products</h6>
																				<hr class="mb-4 mt-0 d-inline-block mx-auto"
																								style="width: 60px; background-color: #7c4dff; height: 2px" />
																				<p>
																								<a href="#!" class="text-white">Registration</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Shop and Account</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">E-commerce and Concultancy</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Loans</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Investment</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Credits and Debits</a>
																				</p>

																</div>
																<!-- Grid column -->

																<!-- Grid column -->
																<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
																				<!-- Links -->
																				<h6 class="text-uppercase fw-bold">Useful links</h6>
																				<hr class="mb-4 mt-0 d-inline-block mx-auto"
																								style="width: 60px; background-color: #7c4dff; height: 2px" />
																				<p>
																								<a href="#!" class="text-white">Finance and Money</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Mobile Application</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Affiliate Banks</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Employee Registration</a>
																				</p>
																				<p>
																								<a href="#!" class="text-white">Help</a>
																				</p>
																				<p> <a href="#" class="text-white">Support</a></p>

																</div>
																<!-- Grid column -->

																<!-- Grid column -->
																<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
																				<!-- Links -->
																				<h6 class="text-uppercase fw-bold">Contact</h6>
																				<hr class="mb-4 mt-0 d-inline-block mx-auto"
																								style="width: 60px; background-color: #7c4dff; height: 2px" />
																				<p><i class="fa fa-map-marker mr-2"></i> Nairobi, Kenya</p>
																				<p> <a href="#" class="text-white"><i class="fa fa-envelope mr-2"></i></a>storm5@storms.com</p>
																				<p><i class="fa fa-phone mr-2"></i> +254 714 68 07 63</p>
																				<p><i class="fa fa-phone mr-2"></i> +254 736 74 81 81</p>

																</div>
																<!-- Grid column -->
												</div>
												<!-- Grid row -->
								</div>
				</section>
				<!-- Section: Links  -->

				<!-- Copyright -->
				<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
								© 2020 Copyright:
								<a class="text-white" href="https://mdbootstrap.com/">Storms.co.ke</a>

								<!-- Copyright -->
</footer>
<!-- Footer -->


</html>
