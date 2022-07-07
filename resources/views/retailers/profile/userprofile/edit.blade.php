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
																				<div class="m-2"> <a href="/home" class="text-info "
																												onclick="openForm()"><Strong>Home</Strong></a>
																				</div>
																				<img class="app-sidebar__user-avatar d-flex w-100 well"
																								src="{{ $profile->profile_image }}" alt="User Image">
																				<div class="mt-4"> <a href="#" class="btn btn-primary" onclick="openForm()">Change Profile</a>
																				</div>
																</div>
																<div class="col-md-4 col-xl-5 mt-2">

																				<h3>Username: {{ $profile['user']->username }}</h3>
																				<h2>Shops: {{ count($profile['user']->retails()->get()) }}</h2>
																				<p class="text-success"><strong>Complete: {{ $profile->profile_complete }} %</strong> </p>

																</div>

																<div class="chat-popup m-3 " id="profileSection">
																				<div class="mx-2">

																								<div class="tile-title-w-btn">
																												<h3 class="title">Upload the Profile here</h3>

																								</div>
																								<div class="tile-body">
																												<p></p>
																												<h6>Drop or Click on the box</h6>
																												<div>
																																<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																																				action="/client/userprofile/profile/update/profile_picture/{{ $profile->id }}">
																																				@csrf
																																				<div class="dz-message">Drop files here or click to
																																								upload<br><small class="text-info">Just drop the picture here.</small>
																																				</div>
																																</form>
																												</div>
																								</div>

																				</div>
																				<div class="d-flex justify-content-center m-2">
																								<button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>
																				</div>
																</div>
												</div>
								</div>
								<div class="col-md-8 col-xl-7 mx-auto">
												<form class="form-horizontal" id="regForm" action="/client/userprofile/profile/update/{{ $profile->id }}"
																method="POST">
																@csrf
																<h3>User data.</h3>
																<br>
																<!-- One "tab" for each step in the form: -->
																<label class="control-label">Enter your full name</label>
																<div>
																				<input class="form-control  @error('full_name') is-invalid @enderror" type="text"
																								placeholder="Enter your name " name="full_name" value="{{ $profile->full_name }}"
																								autocomplete="full_name" required>
																				@error('full_name')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<br>
                                                                <label class="control-label">Enter your full name</label>
																<div>
																				<input class="form-control  @error('alternate_phone_no') is-invalid @enderror" type="text"
																								placeholder="Enter your other Phone number " name="alternate_phone_no" value="{{ $profile->alternate_phone_no }}"
																								autocomplete="alternate_phone_no" required>
																				@error('alternate_phone_no')
																								<span class="invalid-feedback" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<br>
																<div>
																				<h3 class="text-display-4">User Address</h3>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">Country</label>
																				<div class="col-md-8">
																								<input class="form-control @error('country') is-invalid @enderror" type="text"
																												placeholder="Enter the country " name="country" value="{{ $profile->country }}"
																												autocomplete="country" required>

																								@error('country')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">County</label>
																				<div class="col-md-8">
																								<input class="form-control @error('county') is-invalid @enderror" type="text"
																												placeholder="Enter the county " name="county" value="{{ $profile->county }}"
																												autocomplete="county" required>

																								@error('county')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>





																<div class="form-group row">
																				<label class="control-label col-md-3">Sub-county</label>
																				<div class="col-md-8">
																								<input class="form-control @error('sub_county') is-invalid @enderror" type="text"
																												placeholder="Enter your sub-county " name="sub_county" value="{{ $profile->sub_county }}"
																												autocomplete="sub_county" required>

																								@error('sub_county')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>
																<div class="form-group row">
																				<label class="control-label col-md-3">Town</label>
																				<div class="col-md-8">
																								<input class="form-control @error('town') is-invalid @enderror " type="text"
																												placeholder="Enter your town  " name="town" value="{{ $profile->town }}" autocomplete="town"
																												required>

																								@error('town')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group row">
																				<label class="control-label col-md-3">Street</label>
																				<div class="col-md-8">
																								<input class="form-control @error('street') is-invalid @enderror " type="text"
																												placeholder="Enter your Street" name="street" value="{{ $profile->street }}"
																												autocomplete="{{ old('street') }}" required>

																								@error('street')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<div class="form-group row">
																				<label class="control-label col-md-3">Address</label>
																				<div class="col-md-8">
																								<input class="form-control @error('address') is-invalid @enderror " type="text"
																												placeholder="Enter your address" name="address" value="{{ $profile->address }}"
																												autocomplete="{{ old('address') }}" required>

																								@error('address')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																</div>

																<hr>

																<div class="d-flex justify-content-center ">
																				<button type="submit" class="btn btn-secondary ">Sumbit</button>
																</div>
												</form>

								</div>
								<div class="col-md-8 col-xl-7 form-horizontal mx-auto" id="regForm">
												<h1>National Id/Passport upload</h1>
												<div class="col-md col-xl">
																<div class="mx-3">
																				<div class="tile-title-w-btn">
																								<h4 class="title">Upload Your national id or passport</h4>
																				</div>
																				<div class="tile-body">
																								<p></p>
																								<h4>Click or drop on the box area</h4>
																								<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																												action="/client/userprofile/profile/national_id/{{ $profile->id }}">
																												@csrf
																												<div class="dz-message">Drop files here or click to
																																upload<br><small class="text-info">Just drop the picture here.</small>
																												</div>
																								</form>
																				</div>
																</div>
																<br>
																<hr>
																<br>
																<div class="mx-3">
																				<div class="tile-title-w-btn">
																								<h4 class="title">Upload other relevant Identification documents</h4>
																				</div>
																				<div class="tile-body">
																								<p></p>
																								<h4>Click or drop</h4>
																								<form class="text-center dropzone" method="POST" enctype="multipart/form-data"
																												action="/client/userprofile/profile/relevant-documents/{{ $profile->id }}"
																												name="Other Documents">
																												@csrf
																												<div class="dz-message">Drop files here or click to
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
								</script>
								<script>
								    function openForm() {
								        document.getElementById("profileSection").style.display = "block";
								    }

								    function closeForm() {
								        document.getElementById("profileSection").style.display = "none";
								    }
								</script>
				</section>
@endsection
