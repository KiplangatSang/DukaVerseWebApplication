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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link  rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <title>Mpesa Application</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 pt-3">
                  <img src="/storage/likebtn.jpg" class=" w-100" >
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class = "pr-3">
                            <button><img src="/storage/likebtn.jpg" alt="like" height="10" width="20"><a href=""></button>
                            <img src="/storage/likebtn.jpg" alt="like" style="max-width:60px" class="rounded-circle w-100">
                        </div>

                     <div>
                      <div class="font-weight-bold d-flex"> <a href="/stk"><span class="text-dark">owner</span></a>

                     <button><img src="/storage/likebtn.jpg" alt="House" height="10" width="20"><a href=""></a></follow-button>
                      </div>
                     </div>
                    </div>

                   <p> <a href="/stk"><span class="text-dark"> Owner</span></a></p>
               </div>
        </div>
    </div>
</body>
</html>
