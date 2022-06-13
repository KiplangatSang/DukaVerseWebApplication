@extends('layouts.login')
@section('content')
				<section class="material-half-bg">
								<div class="cover"></div>
				</section>
				<section class="login-content ">
								<div class="logo ">
												<h1><strong>DukaVerse</strong></h1>
								</div>
								<div class="col-md-8 col-xl-7 mx-auto">

												<form class="form-horizontal" id="regForm" action="/client/retail/register/store" method="POST">
																@csrf
																<h3>Lets register your retail.</h3>
																<br>
																<!-- One "tab" for each step in the form: -->
																<div class="tab">
																				<label class="control-label">What is the name of your shop?</label>
																				<div>
																								<input class="form-control  @error('retail_name') is-invalid @enderror" type="text"
																												placeholder="Enter the name of your shop" name="retail_name" value="{{ old('retailName') }}"
																												autocomplete="retail_name" required>
																								@error('retail_name')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror

																				</div>
																				<br>

																</div>
																<div class="tab ">

																				<h3 class="control-label">Which Goods do you deal in?</h3>
																				<p id="retailGoodsLabel">Click on input field to select the type of goods you sell.</p>
																				<div>

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
																				</div> <br>
																</div>
																<div class="tab">
																				<div>
																								<h3 class="text-display-4">Retail Location</h3>
																				</div>

																				<div class="form-group row">
																								<label class="control-label col-md-3">County</label>
																								<div class="col-md-8">
																												<input class="form-control @error('retail_county') is-invalid @enderror" type="text"
																																placeholder="Enter the county " name="retail_county" value="{{ old('retailCounty') }}"
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
																																value="{{ old('retail_constituency') }}" autocomplete="retail_constituency" required>

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
																																value="{{ old('retail_town') }}" autocomplete="retail_town" required>

																												@error('retail_town')
																																<span class="invalid-feedback" role="alert">
																																				<strong>{{ $message }}</strong>
																																</span>
																												@enderror

																								</div>
																				</div>
																				<hr>

																</div>
																<div class="tab">
																				<div class="form-group">
																								<label class="control-label col-md-3">Do you have employees</label>

																								<div class="col-md">
																												<input type="radio" class="checkbox @error('retailPicture') is-invalid @enderror"
																																name="retail_emp_no" value="0" id="radNoEmployees" onclick="disableEmpInput()"> No I
																												do
																												not have
																												employees
																								</div>
																								<div class="col-md">
																												<input type="radio" class="checkbox @error('retailPicture') is-invalid @enderror"
																																name="retail_emp_no" value="true" id="radEmployees" onclick="enableEmpInput()"> Yes I have
																												Employees
																								</div>

																								<br>
																								<div class="form-group row">
																												<label class="control-label col-md-3" @disabled(true)>How many Employees?</label>
																												<div class="col-md-8">
																																<input class="form-control @error('retail_emp_no') is-invalid @enderror"
																																				type="text" placeholder="Enter the number of employees" name="retail_emp_no"
																																				id="inputEmp" value="{{ old('retail_emp_no') }}"
																																				autocomplete="{{ old('retail_emp_no') }}" disabled>

																																@error('retail_emp_no')
																																				<span class="invalid-feedback" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror

																												</div>
																								</div>
																				</div>
																</div>
																<div style="overflow:auto;">
																				<div style="float:right;">
																								<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary">Previous</button>
																								<button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-secondary">Next</button>
																				</div>
																</div>
																<!-- Circles which indicates the steps of the form: -->
																<div style="text-align:center;margin-top:40px;">
																				<span class="step"></span>
																				<span class="step"></span>
																				<span class="step"></span>
																				<span class="step"></span>
																</div>
												</form>

								</div>

				</section>
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
				    function disableEmpInput() {
				        var inputEmp = document.getElementById("inputEmp");
				        inputEmp.disabled = true;
				    }

				    function enableEmpInput() {
				        var inputEmp = document.getElementById("inputEmp");
				        inputEmp.disabled = false;
				    }

				    var currentTab = 0; // Current tab is set to be the first tab (0)
				    showTab(currentTab); // Display the current tab

				    function showTab(n) {
				        // This function will display the specified tab of the form...
				        var x = document.getElementsByClassName("tab");
				        x[n].style.display = "block";
				        //... and fix the Previous/Next buttons:
				        if (n == 0) {
				            document.getElementById("prevBtn").style.display = "none";
				        } else {
				            document.getElementById("prevBtn").style.display = "inline";
				        }
				        if (n == (x.length - 1)) {
				            document.getElementById("nextBtn").innerHTML = "Submit";
				        } else {
				            document.getElementById("nextBtn").innerHTML = "Next";
				        }
				        //... and run a function that will display the correct step indicator:
				        fixStepIndicator(n)
				    }

				    function nextPrev(n) {
				        // This function will figure out which tab to display
				        var x = document.getElementsByClassName("tab");
				        // Exit the function if any field in the current tab is invalid:
				        if (n == 1 && !validateForm()) return false;

				        // Hide the current tab:
				        x[currentTab].style.display = "none";
				        // Increase or decrease the current tab by 1:
				        currentTab = currentTab + n;
				        // if you have reached the end of the form...
				        if (currentTab >= x.length) {
				            // ... the form gets submitted:

				            document.getElementById("regForm").submit();

				            return false;
				        }
				        // Otherwise, display the correct tab:
				        showTab(currentTab);
				    }

				    function validateForm() {
				        var x, y, i, z, valid = true;
				        x = document.getElementsByClassName("tab");
				        y = x[currentTab].getElementsByTagName("input");
				        z = x[currentTab].getElementsByTagName("select");
				        // A loop that checks every input field in the current tab:
				        for (i = 0; i < y.length; i++) {
				            // If a field is empty...
				            if (z.length == 1) {

				                if (z[0].value == "") {
				                    var retailGoodsLabel = document.getElementById("retailGoodsLabel");
				                    retailGoodsLabel.innerHTML = " This field is required"
				                    retailGoodsLabel.style.color = "red";
				                    valid = false;
				                }

				            } else if (y[i].value == "") {
				                //check if disabled
				                if (y[i].disabled == true) {
				                    valid = true;
				                } else {
				                    // add an "invalid" class to the field:
				                    y[i].className += " invalid";
				                    // and set the current valid status to false
				                    valid = false;
				                }

				            }
				        }
				        // If the valid status is true, mark the step as finished and valid:
				        if (valid) {
				            document.getElementsByClassName("step")[currentTab].className += " finish";
				        }
				        return valid
				    }

				    function fixStepIndicator(n) {
				        // This function removes the "active" class of all steps...
				        var i, x = document.getElementsByClassName("step");
				        for (i = 0; i < x.length; i++) {
				            x[i].className = x[i].className.replace(" active", "");
				        }
				        //... and adds the "active" class on the current step:
				        x[n].className += " active";
				    }
				</script>
@endsection
