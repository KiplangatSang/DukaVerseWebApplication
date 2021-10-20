<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link  rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8 mx-auto" >
               <div class="card">
                   <div class="card-header pd-5" style="box-align: center" >
                    Obtain Access Token
                   </div>
                   <div class="card-body mt-3" >
                       <h3 id="accesstoken">  </h3>
                       <button id="btngetaccesstoken" class="btn btn-primary"> Request Access Token</button>
                   </div>
               </div>
            <div class="card mt-5">
                <div class="card-header">Register URLs</div>
                <div class="card-body">
                    <button class="btn btn-primary" id="registerUrls">Register URLs</button>
             </div>
            </div>
            <div class="card mt-5">
             <div class="card-header">Simulate Transaction</div>
             <div class="card-body">
                 <form action="">
                     @csrf
                     <div class="form-group">
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
    <script>
 document.getElementById("btngetaccesstoken").addEventListener("click", (event) =>{
    event.preventDefault()
    alert("Clicked");
    axios.post("get-token", {})
    .then((response) =>{
        console.log(response.data)
    })
    .catch((error) =>{console.log(error);})
})
    </script>
</body>
</html>
