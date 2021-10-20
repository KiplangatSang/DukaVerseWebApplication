<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Mpesa Application</title>
</head>
<body>
    <div class="container">
            <div class="card mt-5 mx-auto">
             <div class="card-header">STK Transaction</div>
             <div class="card-body">
                 <form action="">
                     @csrf
                     <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                         <label for="amount">Amount</label>
                         <input type="text" name="amount" class="form-control" id="amount">
                         <label for="amount">Account</label>
                         <input type="text" name="account" class="form-control" id="account">
                     </div>
                    <button class="btn btn-primary" id="simulate">Simulate Payments</button>
                 </form>
          </div>
        </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
