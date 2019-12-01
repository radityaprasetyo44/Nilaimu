<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myLogin.css') }}">
    <title>Document</title>
</head>

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<body>

    <div class="wrapper" style="padding: 0 auto;">

        <div class="row" style="margin: 0 auto;">
            <div class="col-md-8" style="
                margin-top: 8%;
                width: 70vw; 
                height: 70vh;
                background-image:url('{{ asset('images/loginIlustration.svg') }}');
                background-repeat: no-repeat;
                background-position: center;
            ">
        </div>

        <div class="col" style="margin-left: -8%;">
        <img src="{{ asset('images/logoWithText.svg') }}" alt="" style="margin-top: 23%;width: 30vw;height: 20vh;margin-left: -22%">        
        <h1 style="font-size: 1.85rem; color: #424242;"><strong>Selamat Datang, Silahkan Masuk!</strong></h1>
        <br>
            <form action="/api/v1/auth/checklogin" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <label style="font-size: 1.2rem;color: grey" class="label-login">username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <br>
                <div class="form-group">
                    <label style="font-size: 1.2rem;color: grey" class="label-login">password</label>
                    <input type="password" class="form-control" id="myInput" name="password">
                </div>
                <script>
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
                </script>
                <br>
                <!-- <div style="display: flex; flex-direction: row">
                <div style="background-color: white;">
                <input type="checkbox" onclick="myFunction()" class="check"> 
                </div>
                <p style="
                    font-size: 1rem;
                    color: #91DAFE;
                    padding-left: 0.3rem;
                " onclick="myFunction()" >Lihat password</p>
                </div> -->
                <button type="submit" class="btn my-3 loginButton" style="
                    height: 5%;
                    width: 57.5%;
                    background-color: #3AC5FE;
                    color: white;
                    font-size: 1.5rem;
                    border-radius: 0.4rem;
                ">Masuk</button>
            </form>
        </div>

</div> 

</div>

</body>
</html>