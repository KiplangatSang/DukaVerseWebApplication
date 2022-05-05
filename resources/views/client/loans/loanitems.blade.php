@extends('layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Loans</h1>
												<p>Loans available for you</p>
								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Loans</li>
												<li class="breadcrumb-item active"><a href="#">Loans View</a></li>
								</ul>
				</div>
				<div class="row">
								@include('messages.inc')

								<div class="col-md-12">

												@if (count($loans) < 1)
																<div class="container-fluid alert alert-success">
																				<h3 class="text-display-4 text-info">No available Loans</h3>

																				<a href="/home" class="button btn btn-secondary">Back to Dashbord</a>
																</div>
												@endif
												@foreach ($loans as $loan)
																<div class="tile-body">
																				<div class="clearix"></div>
																				<div class="col-md-12">

																								<form method="GET" action="/request-loan/" id="loanForm">

																												@csrf

																												<div class="tile ">
																																<h3 class="tile-title">{{ $loan->loan_type }} </h3>
																																<div class="tile-body row">
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Loan Type</strong></label>
																																								<img class="app-sidebar__user-avatar d-flex w-25"
																																												src="/storage/RetailPictures/{{ $data['retailimage']->retailPicture ?? 'noprofile.png' }}"
																																												alt="{{ $loan->loan_type }}">

																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Amount</strong> </label>
																																								<h5 class="text-display-6 text-danger">Ksh {{ $loan->min_loan_range }} to <br>
																																												Ksh {{ $loan->max_loan_range }}</h3>
																																				</div>
																																				<div class="form-group col-md-3">
																																								<label class="control-label"><strong>Loan Description</strong></label>
																																								<h6 class="text-display-6 text-info">{{ $loan->loan_description }}</h3>
																																												<h6 class="text-display-6 text-danger">Applicable after 6 months of actively
																																																using Storm5.</h3>

																																				</div>
																																				<div class="form-group col-md-3 align-self-end">

																																								<a class="btn btn-info" href="#" id="loanAmountAlert"
																																												onclick="submitform(@json($loan->id),@json($loan->min_loan_range),@json($loan->max_loan_range))">Apply
																																												Now</a>


																																				</div>
																																</div>
																												</div>

																								</form>
																				</div>
																</div>
												@endforeach
								</div>
								<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>
								<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrap-notify.min.js') }}"></script>
								<script type="text/javascript" src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>

								<script type="text/javascript">
								    function submitform(loan_id, min_loan_range, max_loan_range) {
								        swal({
								            title: "Loan Request",
								            text: "You are about to request a loan,\n Enter amount you want to request.",
								            type: "input",
								            inputPlaceholder: 'Enter Loan amount here',
								            showCancelButton: true,
								            confirmButtonText: "Confirm, Submit!",
								            cancelButtonText: "No, Cancel !",
								            closeOnConfirm: false,
								            closeOnCancel: false,

								        }, function(isConfirm) {
								            if (isConfirm) {

								                let inputValue = isConfirm;


								                if (parseInt(inputValue)) {
								                    //var x = document.getElementById("loanForm").selectedIndex;
								                    var form_route = loan_id + "/" + inputValue;
								                    if (form_route !== "") {
								                        if (parseInt(inputValue) >= parseInt(min_loan_range) && parseInt(inputValue) <=
								                            parseInt(max_loan_range)) {
								                            var form_action = document.getElementById("loanForm").action;
								                            document.getElementById("loanForm").action = form_action + form_route;
								                            document.getElementById("loanForm").submit();
								                            // console.log(document.getElementById("loanForm").action);
								                            swal("Success!",
								                                "Your Loan request has been sent. \n  Await its Processing within 24 hrs",
								                                "success");
								                        } else {
								                            swal("The input should be between ksh " + min_loan_range + " and ksh " +
								                                max_loan_range,
								                                " Request Canceled", "error");

								                        }
								                    }


								                } else {
								                    swal("The input should be a number ", "Request Canceled  :)", "error");

								                }



								            } else {
								                swal("Cancelled", "Request Canceled  :)", "error");
								            }
								        });
								    }
								</script>
				@endsection
