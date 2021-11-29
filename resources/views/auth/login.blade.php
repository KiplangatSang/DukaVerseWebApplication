@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center">
        <div class="col"></div>
        <div class="col" >
            <p class="text-dark" id="name"></p>
            <p class="text-success" id="message"></p>
            <p class="text-danger" id="info"></p>
            <script>

                var text = "";
 document.getElementById("info").innerHTML=text;


document.addEventListener("DOMContentLoaded", function() {
    typeWriterName();
});


            var i = 0;
            let txt = "";
            var name = "Hi there !!";
            var message ="            Thanks for checking us out. From now on we will be at your service  we are committed to providing the best experience to our customers"+
            "We will always keep in touch with you\n"+
           " WELCOME !!";

           var info = "              Login or register to access your account";
            var speed = 100;
            var messagespeed = 50;
            var sleep = 100;

            function typeWriterName() {
              if (i < name.length) {
                document.getElementById("name").innerHTML += name.charAt(i);
                i++;
                setTimeout(typeWriterName, speed);
              }else if(i == name.length){
                typeWriterMessage();

              }
            }
            function typeWriterMessage() {
              if (i < message.length) {
                document.getElementById("message").innerHTML += message.charAt(i);
                i++;
                setTimeout(typeWriterMessage, messagespeed);
              }else if(i == message.length){
                typeWriterInfo();
              }
            }

            function typeWriterInfo() {
              if (i < info.length) {
                document.getElementById("info").innerHTML += info.charAt(i);
                i++;
                setTimeout(typeWriterInfo, speed);
              }
            }
            </script>

        </div>
        <div class="col">
            <div class="col">
                <div class="card bg-white">


                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row justify-content-center">
                                <label for="loginheader" class="col-md-4 col-form-label text-md-centre">{{ __('Login') }}</label>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
