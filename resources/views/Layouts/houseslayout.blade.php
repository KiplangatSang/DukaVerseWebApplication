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

    <title>{{ config('app.name', 'Storm4') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link  rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <title>Mpesa Application</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-white mx-auto px-15"  style="background-color: #e7e9eb">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Book A House</a>
                <a class="dropdown-item disabled" href="#">Book</a>
                <a class="dropdown-item" href="#">Selections</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item disabled" href="#">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item disabled" href="#">Settings</a>
              </div>
            </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
</head>
<body style="background-color: #eff4f9">
    @yield('content')
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDr39kd9qTF87nP59vLytmJTKE-HM8raw8",
        authDomain: "953266534737-26u6ds799p74875p3nb5akmemj1vadpc.apps.googleusercontent.com",
        projectId: "hs-microfinance",
        storageBucket: "gs://hs-microfinance.appspot.com"
        messagingSenderId: "953266534737",
        appId: "1:953266534737:android:72c66fb0f901c768717b70"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

function initFirebaseMessagingRegistration() {
    messaging.requestPermission().then(function () {
        return messaging.getToken()
    }).then(function(token) {

        axios.post("{{ route('fcmToken') }}",{
            _method:"PATCH",
            token
        }).then(({data})=>{
            console.log(data)
        }).catch(({response:{data}})=>{
            console.error(data)
        })

    }).catch(function (err) {
        console.log(`Token Error :: ${err}`);
    });
}

initFirebaseMessagingRegistration();


    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script>

</html>
