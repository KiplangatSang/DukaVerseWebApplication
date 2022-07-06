<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>DukaVerse</title>
				<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">

				{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
				<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
				{{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> --}}
				<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
				<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

				{{-- jquery --}}
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body class="is-boxed has-animations">
				<div class="body-wrap">
								<main>
												<section class="wrapper">

																<!--sliding div -->
																<div class="slideshow-container  slider-div">
																				<div class="mySlides fade">
																								<div class="box box-1">
																												<div class="numbertext">
																																<div>
																																				<h3><strong>DukaVerse</strong></h3>
																																				<p><strong>Kazi Safi Faida Zaidi</strong></p>
																																				<div>
																																								@if (Route::has('login'))
																																												<div class="top-right links m-2">
																																																@auth
																																																				<a class="button button-primary" href="{{ url('/home') }}">Home</a>
																																																@else
																																																				<div class="row">
																																																								<div class="p-2 m-2">
																																																												<a class="button" href="{{ route('login') }}">Login</a>

																																																												@if (Route::has('register'))
																																																																<a class="button button-primary"
																																																																				href="{{ route('register') }}">SignUp
																																																																</a>
																																																												@endif
																																																								</div>
																																																				</div>
																																																@endauth
																																												</div>
																																								@endif
																																				</div>
																																</div>

																												</div>

																								</div>
																								<div class="box box-2">
																												<div id="slideshow">
																																<div class="slider-div">
																																				<div class="d-flex justify-content-center">
																																								<p>Control your Business</p>
																																				</div>
																																				<img class="slider-img" src="dist/images/DukaVerse/analyze.jpg">

																																</div>
																																<div class="slider-div">
																																				<div class="d-flex justify-content-center">
																																								Get the Best Market Data Analytics
																																				</div>
																																				<img class="slider-img" src="dist/images/DukaVerse/graphs.jpg">
																																</div>
																																<div>
																																				<div class="d-flex justify-content-center">
																																								Manage Your Finance Better to Grow
																																				</div>
																																				<img class="slider-img " src="dist/images/DukaVerse/invest.jpg">
																																</div>
																																<div>
																																				<div class="d-flex justify-content-center">
                                                                                                                                                    Access Funds to see your Business
																																								Grow</div>
																																				<img class="slider-img" src="dist/images/DukaVerse/loans.jpg">
																																</div>
																												</div>
																												<br>
																								</div>
																				</div>
																</div>
																<br>
				</div>
				</section>

				<section class="features section ">
								<div class="container">
												<div class="features-inner section-inner has-bottom-divider">
																<div class="features-wrap">
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner ">
																												<div class="feature-icon">
																																<img src="dist/images/DukaVerse/data_extraction.svg" alt="Feature 01">
																												</div>
																												<h4 class="feature-title mt-24 ">Plan Your Business</h4>
																												<p class="text-sm mb-0">Planning is an Integral part of bussiness.
																																We help you to take this to a whole new level.
																												</p>
																								</div>
																				</div>
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner">
																												<div class="feature-icon">
																																<img src="dist/images/DukaVerse/designer.svg" alt="Be Inspired">
																												</div>
																												<h4 class="feature-title mt-24">Get The Best Tools</h4>
																												<p class="text-sm mb-0">Get Access to the best software and hardware tools to Manage your
																																business.
																																These tools are well suited to your business.
																												</p>
																								</div>
																				</div>
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner">
																												<div class="feature-icon">
																																<img src="dist/images/DukaVerse/personal_finance.svg" alt="Get Elevated">
																												</div>
																												<h4 class="feature-title mt-24">Manage Your Finances</h4>
																												<p class="text-sm mb-0">Take controll of your finances by managing the in-flow and
																																expenditure of your finances.
																																We will help you do this.</p>
																								</div>
																				</div>
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner">
																												<div class="feature-icon">
																																<img src="dist/images/DukaVerse/transfer_money.svg" alt="Ask, Seek, Find">
																												</div>
																												<h4 class="feature-title mt-24">Access Funds Easily</h4>
																												<p class="text-sm mb-0">Access funding Easily. The packages are customised to suit your
																																business.
																																All the packages are Easy,Fast,Convinient to access. Just Apply!
																												</p>
																								</div>
																				</div>
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner">
																												<div class="feature-icon">
																																<img src="dist/images/DukaVerse/work.svg" alt="Inspire">
																												</div>
																												<h4 class="feature-title mt-24">Connect with your Customers</h4>
																												<p class="text-sm mb-0">Build a trusted relationship with your customers through good
																																service delivery and regular updates
																												</p>
																								</div>
																				</div>
																				<div class="feature text-center is-revealing">
																								<div class="feature-inner">
																												<div class="feature-icon">
																																<img src="dist/images/analytics.svg" alt="Be Productive">
																												</div>
																												<h4 class="feature-title mt-24"><i class="fa-solid fa-hashtag">Grow Your Business</i>
																												</h4>
																												<p class="text-sm mb-0">
																																Watch your business grow as we partner with you in this journey.
																																The bold steps in the business world, we will be right by your side,
																																Let's do it!
																												</p>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</section>

				<section class="cta section">
								<div class="container">
												<div class="cta-inner section-inner">
																<h3 class="section-title mt-0">got a query?</h3>
																<div class="cta-cta">
																				<a class="button button-primary button-wide-mobile" href="#">Get in
																								touch</a>
																</div>
												</div>
								</div>
				</section>
				</main>

				<footer class="site-footer">
								<div class="container">
												<div class="site-footer-inner">
																<div class="brand footer-brand">
																				<a href="#">
																								{{-- <img class="header-logo-image" src="dist/images/logo.svg" alt="Logo"> --}}
																				</a>
																</div>
																<ul class="footer-links list-reset">
																				<li>
																								<a href="#">Contact</a>
																				</li>
																				<li>
																								<a href="#">About us</a>
																				</li>
																				<li>
																								<a href="#">FAQ's</a>
																				</li>
																				<li>
																								<a href="#">Support</a>
																				</li>
																</ul>
																<ul class="footer-social-links list-reset">
																				<li>
																								<a href="#">
																												<span class="screen-reader-text">Facebook</span>
																												<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
																																<path
																																				d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
																																				fill="#0270D7" />
																												</svg>
																								</a>
																				</li>
																				<li>
																								<a href="#">
																												<span class="screen-reader-text">Twitter</span>
																												<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
																																<path
																																				d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
																																				fill="#0270D7" />
																												</svg>
																								</a>
																				</li>
																				<li>
																								<a href="#">
																												<span class="screen-reader-text">Google</span>
																												<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
																																<path
																																				d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
																																				fill="#0270D7" />
																												</svg>
																								</a>
																				</li>
																</ul>
																<div class="footer-copyright">&copy; 2022 DukaVerse, all rights reserved</div>
												</div>
								</div>
				</footer>
				</div>

				<script>
				    $("#slideshow > div:gt(0)").hide();

				    setInterval(function() {
				        $('#slideshow > div:first')
				            .fadeOut(1000)
				            .next()
				            .fadeIn(1000)
				            .end()
				            .appendTo('#slideshow');
				    }, 3000);
				</script>



				<script>
				    let slideIndex = 1;
				    showSlides(slideIndex);

				    function plusSlides(n) {
				        showSlides(slideIndex += n);
				    }

				    function currentSlide(n) {
				        showSlides(slideIndex = n);

				    }

				    function showSlides(n) {
				        let i;
				        let slides = document.getElementsByClassName("mySlides");
				        let dots = document.getElementsByClassName("dot");
				        if (n > slides.length) {
				            slideIndex = 1
				        }
				        if (n < 1) {
				            slideIndex = slides.length
				        }
				        for (i = 0; i < slides.length; i++) {
				            slides[i].style.display = "none";
				        }
				        for (i = 0; i < dots.length; i++) {
				            dots[i].className = dots[i].className.replace(" active", "");
				        }
				        slides[slideIndex - 1].style.display = "block";
				        dots[slideIndex - 1].className += " active";


				    }
				</script>


				<script src="dist/js/main.min.js"></script>

</body>

</html>
