@extends('Layouts.login')
@section('content')
    <div class="container">
            <div class="card mt-5 mx-auto">
             <div class="card-header">STK Transaction</div>
             <div class="card-body">
                 <form action="/payments/mpesapayments/stkpush" method="POST" >
                     @csrf
                     <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                         <label for="amount">Amount</label>
                         <input type="text" name="amount" class="form-control" id="amount">
                         <label for="amount">Account</label>
                         <input type="text" name="account" class="form-control" id="account">
                     </div>
                    <button class="btn btn-primary" type="submit" id="simulate">Simulate Payments</button>
                 </form>
          </div>
        </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>

@endsection
