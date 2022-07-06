@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h3><strong>DukaVerse</strong></h3>
								</div>
								<div class=" col-md-8 col-xl-7 m-1" id="regForm">
												@include('inc.messages')
												<div class="row m-3 p-1">
																<div class="col-md-4 col-xl-5">
																				<div class="m-2"> <a href="/home" class="text-info " onclick="openForm()"><Strong>Home</Strong></a>
																				</div>
																				<img class="app-sidebar__user-avatar d-flex w-100 well"
																								src="/storage/RetailPictures/{{ $retail->retail_profile ?? 'noprofile.png' }}" alt="User Image">
																				<div class="mt-4"> <a class="btn btn-primary" onclick="openForm()">Change Profile</a>
																				</div>
																</div>
																<div class="col-md-4 col-xl-5 mt-2">
																				<h2>Shop: {{ $retail->retail_name }}</h2>
																				<h3>Owner: {{ $retail->retailable()->first()->username }}</h3>
																				<p class="text-success"><strong>Complete: {{ $retail->profile_complete }} %</strong> </p>

																</div>

																<div class="chat-popup m-3 " id="profileSection">
																				<div class="mx-2">

																								<div class="tile-title-w-btn">
																												<h3 class="title">Upload the picture here</h3>

																								</div>
																								<div class="tile-body">
																												<p></p>
																												<h6>Drop or Click on the box</h6>
																												<div>
																																<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																																				action="/client/retails/profile/update">
																																				@csrf
																																				<div class="dz-message">Drop files here or click to
																																								upload<br><small class="text-info">Just drop the picture here.</small>
																																				</div>
																																</form>
																												</div>
																								</div>

																				</div>
																				<div class="d-flex justify-content-center m-2">

																								<a href="#" type="button" class="btn btn-danger" onclick="closeForm()">Close</a>
																				</div>
																</div>
												</div>
								</div>
								<div class="col-md-8 col-xl-7 mx-auto">
												<form class="form-horizontal" id="regForm" action="/client/retails/profile/update/{{ $retail->id }}"
																method="POST">
																@csrf
																<h3>Retail Registration data.</h3>
																<br>
																<!-- One "tab" for each step in the form: -->
																<label class="control-label">What is the name of your shop?</label>
																<div>
																				<input class="form-control  @error('retail_name') is-invalid @enderror" type="text"
																								placeholder="Enter the name of your shop" name="retail_name" value="{{ $retail->retail_name }}"
																								autocomplete="retail_name" required>
																				@error('retail_name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>
																<br>
																<h3 class="control-label">The Goods do you deal in?</h3>
																<div>
																				{{-- {{ dd($retail->retail_goods)}} --}}
																				@if ($retail->retail_goods)
																								@foreach ($retail->retail_goods as $item)
																												<input type="text" value="{{ $item }}" disabled>
																								@endforeach
																				@endif
																</div>
																<br>
																<div>
																				<h5 class="text-info">Click on textbox to add items</h5>
																				<select class="form-control " type="text" name="retail_goods[]" multiple="true"
																								id="multipleSelectForm" style="width: 80%;">
																								<optgroup class="form-control" label="Select The goods you sell">
																												<option class="form-control" value="Shoes">Shoes</option>
																												<option class="form-control" value="Clothes">Clothes</option>
																												<option class="form-control" value="Food">Food</option>
																								</optgroup>
																				</select>
																				@error('retail_goods')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror
																</div>
																<br>
																<div>
																				<h3 class="text-display-4">Retail Location</h3>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">County</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retail_county') is-invalid @enderror" type="text"
																												placeholder="Enter the county " name="retail_county" value="{{ $retail->retail_county }}"
																												autocomplete="retail_county" required>

																								@error('retail_county')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group row">
																				<label class="control-label col-md-3">Constituency</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retail_constituency') is-invalid @enderror" type="text"
																												placeholder="Enter the constituency your shop is located" name="retail_constituency"
																												value="{{ $retail->retail_constituency }}" autocomplete="retail_constituency" required>

																								@error('retail_constituency')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">Town</label>
																				<div class="col-md-8">
																								<input class="form-control @error('retail_town') is-invalid @enderror " type="text"
																												placeholder="Enter the town your shop is located" name="retail_town"
																												value="{{ $retail->retail_town }}" autocomplete="retail_town" required>

																								@error('retail_town')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<div class="form-group">
																				<label class="control-label col-md-3">Employees</label>

																				<br>
																				<div class="form-group row">
																								<label class="control-label col-md-3" @disabled(true)>How many Employees?</label>
																								<div class="col-md-8">
																												<input class="form-control @error('retail_emp_no') is-invalid @enderror" type="text"
																																placeholder="Enter the number of employees" name="retail_emp_no" id="inputEmp"
																																value="{{ $retail->retail_emp_no }}" autocomplete="{{ old('retail_emp_no') }}">

																												@error('retail_emp_no')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>
																				</div>
																</div>
																<hr>

																<div class="d-flex justify-content-center ">
																				<button type="submit" class="btn btn-secondary ">Submit</button>
																</div>
												</form>

								</div>

								{{-- payment preferences --}}
								<div class="col-md-8 col-xl-7 mx-auto">
												<form class="form-horizontal" id="regForm"
																action="/client/retails/profile/payentpreference/update/{{ $retail->id }}" method="POST">
																@csrf
																<div class="bg-dark text-light p-3">
																				<h3>Payment Preferences</h3>
																			@if ($retail->paymentpreference)
                                                                            @if ($retail->paymentpreference == 'mpesapaybill')
                                                                            <p>Mpesa Paybill </p>
                                                                            <p>Paybill: {{ $retail->account_details->paybill }}</p>
                                                                            <p>Account No:{{ $retail->account_details->account_number }}</p>
                                                            @elseif($retail->paymentpreference == 'mpesatill')
                                                                            <p>Mpesa Till Buy Goods and Services</p>
                                                                            <p>Till : {{ $retail->account_details->till_number }}</p>
                                                                            <p>Store Number: {{ $retail->account_details->till_store }}</p>
                                                            @else
                                                                            <p>Dukaverse Account</p>

                                                                          <p>Account:  {{ $retail->accounts()->first()->account }}</p>
                                                                           <p> Account Ref: {{$retail->accounts()->first()->account_ref }}</p>

                                                            @endif

                                                                            @else
                                                                            <p>No Payment Preference Set</p>

                                                                            @endif

																</div>


																<br>
																<div>
																				<div class="form-group">
																								<label class="control-label col-md-3">Choose your payment Preference</label>

																								<hr>
																								<div class="mx-auto d-flex justify-content-center">
																												<label class="control-label col-md-3">Default</label>
																								</div>

																								<div class="col-md">
																												<input type="radio" class="checkbox @error('dukaverse') is-invalid @enderror"
																																name="paymentpreference" value="dukaverse" id="raddukaverse" checked>
																												DukaVerse

																								</div>
																								<hr>
																								<div class="mx-auto d-flex justify-content-center">
																												<label class="control-label col-md-3"><strong> Mpesa Paybill</strong></label>
																								</div>
																								<div class="col-md">
																												<input type="radio" class="checkbox @error('paybill') is-invalid @enderror"
																																name="paymentpreference" value="mpesapaybill" id="radpaybill">
																												Paybill

																								</div>
																								<br>
																								<div class="form-group row">
																												<label class="control-label col-md-3" @disabled(true)>Paybill Number</label>
																												<div class="col-md-8">
																																<input class="form-control @error('paybill') is-invalid @enderror" type="text"
																																				placeholder="Enter Paybill number" name="paybill" id="inputpaybill"
																																				value="{{ old('paybill') }}" autocomplete="{{ old('paybill') }}" disabled>
																																@error('paybill')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3" @disabled(true)>Account Number</label>
																												<div class="col-md-8">
																																<input class="form-control @error('account_number') is-invalid @enderror" type="text"
																																				placeholder="Enter the account number" name="account_number" id="inputpaybillaccount"
																																				value="{{ old('account_number') }}" autocomplete="{{ old('account_number') }}"
																																				disabled>
																																@error('account_number')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<hr>
																								<br>
																								<div class="mx-auto d-flex justify-content-center">
																												<label class="control-label col-md-3"><strong>MPesa Till Number</strong></label>
																								</div>
																								<div class="col-md">
																												<input type="radio" class="checkbox @error('tillnumber') is-invalid @enderror"
																																name="paymentpreference" value="mpesatill" id="radtillnumber"
																																onclick="enableEmpInput()">
																												Till
																												No. Buy Goods
																								</div>
																								<br>

																								<div class="form-group row">
																												<label class="control-label col-md-3" @disabled(true)>Till Number</label>
																												<div class="col-md-8">
																																<input class="form-control @error('till_number') is-invalid @enderror" type="text"
																																				placeholder="Enter the till number" name="till_number" id="inputtillnumber"
																																				value="{{ old('till_number') }}" autocomplete="{{ old('till_number') }}"
																																				disabled>

																																@error('till_number')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																								<div class="form-group row">
																												<label class="control-label col-md-3">Store Number</label>
																												<div class="col-md-8">
																																<input class="form-control @error('till_store') is-invalid @enderror" type="text"
																																				placeholder="Enter the Store Number " name="till_store" id="inputtill_store"
																																				autocomplete="{{ old('till_store') }}" disabled>

																																@error('till_store')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																				</div>
																</div>
																<hr>
																<div class="d-flex justify-content-center ">
																				<button type="submit" class="btn btn-secondary ">Submit</button>
																</div>
												</form>

								</div>
								<div class="col-md-8 col-xl-7 form-horizontal mx-auto" id="regForm">
												<h1>Business documents upload</h1>
												<div class="col-md col-xl">
																<div class="mx-3">
																				<div class="tile-title-w-btn">
																								<h4 class="title">Upload Retail business permit</h4>
																				</div>
																				<div class="tile-body">
																								<p></p>
																								<h4>Click or drop on the box area</h4>
																								<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																												action="/client/retails/profile/retail-documents" name="retailPicture">
																												@csrf
																												<div class="dz-message" name="retailPicture">Drop files here or click to
																																upload<br><small class="text-info">Just drop the picture here.</small>
																												</div>
																								</form>
																				</div>
																</div>

																<div class="mx-3">
																				<div class="tile-title-w-btn">
																								<h4 class="title">Upload other relevant documents</h4>
																				</div>
																				<div class="tile-body">
																								<p></p>
																								<h4>Click or drop</h4>
																								<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																												action="/client/retails/profile/relevant-documents" name="retailPicture">
																												@csrf
																												<div class="dz-message" name="retailPicture">Drop files here or click to
																																upload<br><small class="text-info">Just drop the picture here.</small>
																												</div>
																								</form>
																				</div>
																</div>
												</div>
								</div>

								<script type="text/javascript">
								    $('#sl').on('click', function() {
								        $('#tl').loadingBtn();
								        $('#tb').loadingBtn({
								            text: "Signing In"
								        });
								    });

								    $('#el').on('click', function() {
								        $('#tl').loadingBtnComplete();
								        $('#tb').loadingBtnComplete({
								            html: "Sign In"
								        });
								    });


								    $('#multipleSelectForm').select2();

								    //payment section toggle enabled input boxes
								    $('#raddukaverse').on('click', function() {
								        // alert("raddukaverse")
								        $("#inputpaybill").prop('disabled', true);
								        $("#inputpaybillaccount").prop('disabled', true);
								        $("#inputtillnumber").prop('disabled', true);
								        $("#inputtill_store").prop('disabled', true);
								    });

								    // paybill
								    //enable paybill inputs
								    //disable till inputs
								    $('#radpaybill').on('click', function() {
								        $("#inputpaybill").prop('disabled', false);
								        $("#inputpaybillaccount").prop('disabled', false);
								        $("#inputtillnumber").prop('disabled', true);
								        $("#inputtill_store").prop('disabled', true);
								    });

								    //till number
								    $('#radtillnumber').on('click', function() {
								        $("#inputpaybill").prop('disabled', true);
								        $("#inputpaybillaccount").prop('disabled', true);
								        $("#inputtillnumber").prop('disabled', false);
								        $("#inputtill_store").prop('disabled', false);
								    });
								</script>
								<script>
								    function openForm() {
								        document.getElementById("profileSection").style.display = "block";
								    }

								    function closeForm() {
								        document.getElementById("profileSection").style.display = "none";
								        window.reload;
								    }
								</script>
				</section>
@endsection
