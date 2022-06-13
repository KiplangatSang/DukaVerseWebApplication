@extends('layouts.login')
@section('content')
				<div class="container-fluid p-3">
								<div class="app-title d-flex justify-content-center">
												<div class="mx-auto">
																<h6 class="display-4"><i class="fa-3 fa fa-dashboard"></i>
																				{{ session('retail')->retailName ?? env('APP_NAME') }}</h1>

												</div>
								</div>
								<div class="row">
												<div class="col-md-8 ">
																<div class="tile">
																				<div class="d-flex justify-content-center m-1">
																								Transaction Id <small>
																												<p id="trans_id" class="ml-4"></p>
																								</small>
																				</div>
																				<div class="row">
																								<div class="col-md-8">
																												<input class="form-control" type="text" placeholder="Enter Item Code " autofocus
																																autocomplete="additional-name" oninput="getItem(this.value)" id="itemCodeInput">
																								</div>

																								<li class="app-search float-right">
																												<input class="app-search__input " type="search" placeholder="Search" id="txt1"
																																onkeyup="showHint(this.value)">
																												<button class="app-search__button" onclick="showHint('')"><i
																																				class="fa fa-search"></i></button>
																								</li>

																								<div class="col-md-3">
																												<div class="row">
																																<h4 id="txtHint"></h4>
																																<img class="w-25 well" src="" id="imgHint">
																												</div>
																								</div>

																				</div>

																				<div class="">
																								<div class="tile-body">
																												<div class="table-responsive">
																																<table class="table table-hover table-bordered" id="sampleTable">
																																				<thead>
																																								<tr>

																																												<th>Item Name</th>
																																												<th>Item Description</th>
																																												<th>Item Amount</th>
																																												<th>Price</th>
																																												<th>Remove</th>
																																												<th>View</th>
																																								</tr>
																																				</thead>
																																				<tbody>

																																								<tr>
																																								</tr>

																																				</tbody>
																																</table>
																												</div>
																								</div>

																								<div class="row">
																												<div class="col col-md ">
																																<a href="">
																																				<div class="tile m-1 bg-info">
																																								<div class="col d-flex justify-content-center">
																																												<h3 class="tile-title text-light"> Status</h3>
																																								</div>

																																								<div class="col d-flex justify-content-center text-danger">
																																												<h3 id="textStatus">Inactive</h3>
																																								</div>
																																				</div>
																																</a>
																												</div>
																												<div class="col col-md">
																																<div class="tile m-1">
																																				<div class="col d-flex justify-content-center">
																																								<h3 class="tile-title text-dark">Items</h3>
																																				</div>
																																				<div class="col d-flex justify-content-center">
																																								<h3 class=" text-dark" id="textCountItems">3</h3>
																																				</div>
																																</div>
																												</div>
																												<div class="col col-md">
																																<a href="">
																																				<div class="tile m-1 bg-warning ">
																																								<div class="col d-flex justify-content-center">
																																												<h3 class="tile-title text-dark">Payment</h3>
																																								</div>
																																								<div class="col d-flex justify-content-center">
																																												<h3 class="text-dark" id="paymentStatus">Not Paid</h3>
																																								</div>

																																				</div>
																																</a>
																												</div>
																								</div>
																				</div>

																</div>
												</div>
												<div class="col-md-4">
																<div class="tile">
																				<div>
																								<div class="row">
																												<div class="tile m-2 ">
																																<div class="text-warning d-flex justify-content-center">
																																				<h3 class="tile-title">Total</h3>
																																</div>
																																<div class="row d-flex justify-content-center">
																																				<h3 class="tile-title" id="expense">0</h3>
																																				<h4 class="p-2"> ksh</h4>
																																</div>
																												</div>
																												<div class="tile m-2">
																																<div class="text-warning d-flex justify-content-center">
																																				<h3 class="tile-title">Paid</h3>
																																</div>
																																<div class="row d-flex justify-content-center">
																																				<h3 class="tile-title " id="paid">0</h3>
																																				<h4 class="p-2"> ksh</h4>
																																</div>

																												</div>


																								</div>
																								<div class="tile m-2 p-2 ">
																												<div class="text-warning d-flex justify-content-center">
																																<h3 class="tile-title">Balance</h3>
																												</div>
																												<div class="row d-flex justify-content-center">
																																<h3 class="tile-title" id="balance">0</h3>
																																<h4 class="p-2"> ksh</h4>
																												</div>
																								</div>
																				</div>
																				<div class="container-fluid">
																								<div class="chat-popup" id="paymentSection">
																												<form action="/action_page.php" class="form-container">
																																<div class="mx-2">
																																				<h1>Cash</h1>
																																				<input class="form-control" type="text" placeholder="Enter amount paid "
																																								autocomplete="additional-name" id="inputCash" onclick="disableInput('inputCash')">
																																				<h1>Mpesa</h1>
																																				<input class="form-control" type="text" placeholder="Enter phone Number "
																																								autocomplete="additional-name" id="inputMpesa" onclick="disableInput('inputMpesa')">
																																				<h1>Card</h1>
																																				<input class="form-control" type="text" placeholder="Enter Item Code "
																																								autocomplete="additional-name" id="inputCard" onclick="disableInput('inputCard')">
																																</div>
																																<button type="button" class="btn btn-primary mt-2" onclick="submitPayment()">Send</button>
																																<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
																												</form>
																								</div>
																								<a href="#paymentSection" onclick="openForm()">
																												<div class="tile m-1 bg-success d-flex justify-content-center">
																																<h3 class="tile-title text-dark">Pay</h3>

																												</div>
																								</a>


																				</div>
																				<div class="row mx-auto d-flex justify-content-center">

																								<a onclick="closeTransaction()">
																												<div class="tile m-1 bg-danger">
																																<h3 class="tile-title text-dark">Clear</h3>
																												</div>
																								</a>

																								<a href="#" onclick="holdTransaction()">
																												<div class="tile m-1 bg-info">
																																<h3 class="tile-title text-dark">Hold</h3>
																												</div>
																								</a>
																				</div>
																</div>
												</div>
								</div>
								<hr>
								<br>
								<div class="tile">
												<div class="col clearfix">
																<div class="float-left ">
																				<h1 class="tile-title m-2 float-right">Transaction on hold</h1>


																</div>
																<div class="float-right">
																				<a href="#" @preventDefault onclick="getTransactionsOnHold()" class="btn float-right"><i
																												class="fa fa-refresh" aria-hidden="true"></i>Refresh</a>
																</div>
												</div>

												<div class="tile-body">
																<div class="table-responsive">
																				<table class="table table-hover table-bordered" id="tableHoldItems">
																								<thead>
																												<tr>
																																<th>Tran ID</th>
																																<th>Price</th>
																																<th>Pay Status</th>
																																<th>Items</th>
																																<th>Balance</th>
																																<th>Open</th>

																												</tr>
																								</thead>
																								<tbody>
																								</tbody>
																				</table>
																</div>
												</div>

												<div class="row">
																<div class="col col-md ">
																				<div class="tile m-1">
																								<button class="btn btn-primary" id="btnCloseHoldItems">Close All</button>
																				</div>
																</div>
																<div class="col col-md">
																				<div class="tile m-1">
																								<div class="col d-flex justify-content-center">

																												<h3 class="tile-title text-dark" id="txtHoldItems">0 Items</h3>
																								</div>

																				</div>
																</div>
												</div>
								</div>
				</div>
				<script>
				    //payment section
				    function openForm() {
				        document.getElementById("paymentSection").style.display = "block";
				        document.getElementById("inputCash").focus();
				    }

				    function closeForm() {
				        document.getElementById("paymentSection").style.display = "none";
				        disableInput("");
				    }


				    //payment submition
				    function submitPayment() {
				        var cashInputId, mpesaInputId, cardInputId, expenseEmountId, expense;
				        expenseEmountId = document.getElementById("expense");
				        expense = expenseEmountId.innerHTML;

				        cashInputId = document.getElementById("inputCash");
				        mpesaInputId = document.getElementById("inputMpesa");
				        cardInputId = document.getElementById("inputCard");

				        if (cashInputId.value != "") {
				            paidAmountId = document.getElementById("paid");
				            paidAmountId.innerHTML = cashInputId.value;
				            calculateBalance();
				            closeForm();
				        } else if (mpesaInputId.value != "") {
				            number = mpesaInputId.value;
				            mpesaPayment(number, expense)

				        } else if (cardInputId.value != "") {

				        }

				    }

				    //disables other inputs when one payment method is chosen
				    function disableInput(id) {



				        cashInputId = document.getElementById("inputCash");
				        mpesaInputId = document.getElementById("inputMpesa");
				        cardInputId = document.getElementById("inputCard");

				        cashInputId.disabled = false;
				        mpesaInputId.disabled = false;
				        cardInputId.disabled = false;

				        if (id == "inputCash") {
				            mpesaInputId.value = "";
				            cardInputId.value = "";
				            mpesaInputId.disabled = true;
				            cardInputId.disabled = true;


				        } else if (id == "inputMpesa") {
				            cashInputId.value = "";
				            cardInputId.value = "";
				            cashInputId.disabled = true;
				            cardInputId.disabled = true;

				        } else if (id == "inputCard") {
				            mpesaInputId.value = "";
				            cashInputId.value = "";
				            mpesaInputId.disabled = true;
				            cashInputId.disabled = true;

				        }


				    }


				    //send mpesa paymentRequest
				    function mpesaPayment(number, amount) {
				        if (amount.length == 0 || number.length == 0) {
				            alert("Input correct number and amount");
				            return;
				        }
				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {
				            console.log("response" + this.responseText);
				            var result = JSON.parse(this.responseText);
				            document.getElementById("txtHint").innerHTML = result.status;
				        }
				        xhttp.open("GET", "/client/sales/makePayment/" + number + "/" + amount);
				        xhttp.send();
				    }

				    //show item hints
				    function showHint(str) {
				        if (str.length == 0) {
				            document.getElementById("txtHint").innerHTML = "";
				            document.getElementById("imgHint").src = "";
				            return;
				        }
				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {
				            console.log(this.responseText);
				            var result = JSON.parse(this.responseText);
				            document.getElementById("txtHint").innerHTML = result.item;
				            document.getElementById("imgHint").src = result.image;

				        }
				        xhttp.open("GET", "/client/sales/get-promt-items/" + str);
				        xhttp.send();
				    }

				    function getItem(str) {
				        if (str.length == 0) {
				            document.getElementById("txtHint").innerHTML = "";
				            document.getElementById("imgHint").src = "";
				            return;
				        }
				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {
				            //console.log(this.responseText);
				            var result = JSON.parse(this.responseText);
				            var table = $('#sampleTable'),
				                newRow = '<tr><td>' + result.stockName + '</td><td>' + result.stockSize + '</td><td>' +
				                1 + '</td><td>' + result.selling_price +
				                '</td><td><a class="btn btn-primary" href="/stock-item/' + result.id +
				                '">Remove</a></td><td><a href="/stock-item/' + result.id +
				                '"><i class="fa fa-eye ">View</i></a></td></tr>';
				            table.find('tbody').append(newRow);
				            document.getElementById("itemCodeInput").value = "";
				            document.getElementById("trans_id").innerHTML = result.transaction_id
				            setSalesStatusItems();
				            updateExpense(result.selling_price);
				            calculateBalance();

				        }
				        xhttp.open("GET", "/client/sales/get-sale-item/" + str);
				        xhttp.send();
				    }

				    const tableObject = document.getElementById('sampleTable');
				    const rowCount = tableObject.childElementCount - 2;
				    //var rowCount =tableObject.rows.length;
				    document.getElementById("textCountItems").innerHTML = rowCount;

				    function setSalesStatusItems() {
				        var rowCount = document.getElementById('sampleTable').rows.length;
				        if (rowCount > 1) {
				            document.getElementById("textStatus").innerHTML = "Active";
				            document.getElementById("textStatus").style.color = "green";
				        } else {
				            document.getElementById("textStatus").innerHTML = "Inactive";
				            document.getElementById("textStatus").style.color = "red";

				        }
				        document.getElementById("textCountItems").innerHTML = rowCount - 2;

				        return true;
				    }

				    function calculateBalance() {
				        var balance, expenseAmount, paidAmount, balanceAmount = 0;


				        expenseAmount = document.getElementById("expense").innerHTML;
				        paidAmount = document.getElementById("paid").innerHTML;

				        if (paidAmount > 0) {
				            balanceAmount = paidAmount - expenseAmount;
				        }
				        balance = document.getElementById("balance");
				        balance.innerHTML = balanceAmount;

				        paymentStatusId = document.getElementById("paymentStatus");
				        paymentStatusId.innerHTML = "Not Paid";
				        if (balanceAmount > 0) {
				            paymentStatusId.innerHTML = "Paid";
				        }
				    }

				    function clearBalanceSection() {

				        document.getElementById("expense").innerHTML = 0;
				        document.getElementById("paid").innerHTML = 0;
				        document.getElementById("balance").innerHTML = 0;
				    }

				    function updateExpense(amount) {
				        var expense, expenseAmount;
				        expense = document.getElementById("expense");
				        expenseAmount = parseInt(expense.innerHTML);
				        expenseAmount = expenseAmount + parseInt(amount);
				        expense.innerHTML = expenseAmount;
				    }

				    // transactions on hold
				    //get all transactions on hold
				    function getTransactionsOnHold() {

				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {
				            clearHoldTable();
				            var hello = "hello";

				            var result = JSON.parse(this.responseText);



				            for (var i = 0; i < result.length; i++) {
				                var clickAction = "resetItemsOnHold('" + result[i].transaction_id + "')";
				                var payStatus = "Not Paid";
				                if (result[i].pay_status) {
				                    payStatus = "paid";
				                }
				                var table = $('#tableHoldItems'),
				                    newRow = '<tr><td>' + result[i].transaction_id + '</td><td>' + result[i].price +
				                    '</td><td>' +
				                    payStatus + '</td><td>' +
				                    result[i].transaction_items.length + '</td><td>' + result[i].balance +
				                    '</td><td><a class="btn btn-primary" ' +
				                    '" onClick="' + clickAction + '">Open</a></td><td></tr>';
				                table.find('tbody').append(newRow);


				                var rowCount = document.getElementById('tableHoldItems').rows.length - 2;

				                var itemsCount = rowCount + " Items";

				                document.getElementById("txtHoldItems").innerHTML = itemsCount;


				                // console.log(this. result[i].transaction_items.length);
				            }

				            //

				        }
				        xhttp.open("GET", "/client/sales/transactions/hold/retrieve");
				        xhttp.send();
				    }


				    //hold transaction
				    function holdTransaction() {
				        // var rowCount = document.getElementById('sampleTable').rows.length;
				        // if (rowCount > 1)
				        //     return;
				        var id, paid, balance, expense;
				        id = document.getElementById("trans_id").innerHTML;
				        paid = document.getElementById("paid").innerHTML;
				        expense = document.getElementById("expense").innerHTML;
				        balanceId = document.getElementById("balance");
				        balance = balanceId.innerHTML;
				        console.log('id ' + id + " amount " + paid + "balance " + balance)

				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {
				            console.log(this.responseText);
				            clearTable();
				            getTransactionsOnHold();
				            // alert(this.responseText);
				            // var result = JSON.parse(this.responseText);

				        }
				        xhttp.open("get", "/client/sales/transactions/hold/store/" + id + "/" + expense + "/" + paid);
				        xhttp.setRequestHeader("Accept", "application/json");
				        xhttp.setRequestHeader("Content-Type", "application/json");
				        xhttp.send();
				    }

				    function clearTable() {
				        //clear table
				        var table = document.getElementById("sampleTable");
				        var tableHeaderRowCount = 1;
				        var rowCount = table.rows.length;
				        for (var i = tableHeaderRowCount; i < rowCount; i++) {
				            table.deleteRow(tableHeaderRowCount);
				        }

				        //clear transaction id
				        var trans_id = document.getElementById("trans_id");
				        trans_id.innerHTML = "";

				        //clear balance section
				        clearBalanceSection();

				        //clear table bottom status items
				        document.getElementById("textStatus").innerHTML = "Inactive";
				        document.getElementById("textStatus").style.color = "red";
				        document.getElementById("textCountItems").innerHTML = 0;

				    }

				    function clearHoldTable() {
				        //clear table
				        var table = document.getElementById("tableHoldItems");
				        var tableHeaderRowCount = 1;
				        var rowCount = table.rows.length;
				        for (var i = tableHeaderRowCount; i < rowCount; i++) {
				            table.deleteRow(tableHeaderRowCount);
				        }
				        var itemsCount = 0 + " Items";
				        document.getElementById("txtHoldItems").innerHTML = itemsCount;


				    }

				    function resetItemsOnHold(str) {
				        //alert(str);
				        clearTable();
				        //+'"'+result[i].transaction_id+'"'+
				        if (str.length == 0) {
				            document.getElementById("txtHint").innerHTML = "";
				            document.getElementById("imgHint").src = "";
				            return;
				        }
				        const xhttp = new XMLHttpRequest();
				        xhttp.onload = function() {

				            document.getElementById("expense").innerHTML = 0;
				            var result = JSON.parse(this.responseText);
				            var resultItems = result.items
				            console.log(result.items);
				            for (var i = 0; i < resultItems.length; i++) {
				                var table = $('#sampleTable'),
				                    newRow = '<tr><td>' + resultItems[i].stockName + '</td><td>' + resultItems[i].stockSize +
				                    '</td><td>' +
				                    1 + '</td><td>' + resultItems[i].selling_price +
				                    '</td><td><a class="btn btn-primary" href="/stock-item/' + resultItems[i].id +
				                    '">Remove</a></td><td><a href="/stock-item/' + resultItems[i].id +
				                    '"><i class="fa fa-eye ">View</i></a></td></tr>';
				                table.find('tbody').append(newRow);
				                document.getElementById("itemCodeInput").value = "";
				                document.getElementById("trans_id").innerHTML = result.transaction_id
				                updateExpense(resultItems[i].selling_price);
				            }
				            document.getElementById("paid").innerHTML = result.paid_amount;
				            setSalesStatusItems();
				            calculateBalance();

				        }
				        xhttp.open("GET", "/client/sales/transactions/hold/retrieve/" + str);
				        xhttp.send();
				    }
				</script>
@endsection
