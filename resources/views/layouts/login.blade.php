<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/myLogin.css">
    <title>Document</title>
</head>
<body>

    <div class="wrapper" style="padding: 0 auto;">

        <div class="row" style="margin: 0 auto;">
            <div class="col-md-8" style="
                width: 90vw; 
                height: 100vh;
                background-image:url('{{ asset('images/fortnite.jpg') }}');
                background-repeat: no-repeat;
                background-position: center;
            ">
        </div>

        <div class="col">
        <h1 style="margin-top: 53%; font-size: 1.85rem"><strong>Selamat Datang, Silahkan Masuk!</strong></h1>
        <br>
            <form action="dashboard" method="post">
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
                <div style="display: flex; flex-direction: row">
                <input type="checkbox" onclick="myFunction()" class="check"> 
                <p style="
                    font-size: 1rem;
                    color: grey;
                    padding-left: 0.3rem;
                " onclick="myFunction()" >Lihat password</p>
                </div>
                <!-- <input type="submit" class="btn my-3" target="_self" style="
                    height: 5%;
                    width: 74.5%;
                    background-color: black;
                    color: white;
                    font-size: 1.5rem;
                    border-radius: 0.4rem;"
                    name="" id="" value="Masuk"> -->
                <a href="dashboard" class="btn my-3" target="_self" style="
                    height: 5%;
                    width: 74.5%;
                    background-color: black;
                    color: white;
                    font-size: 1.5rem;
                    border-radius: 0.4rem;
                ">
                Masuk</a>
            </form>
        </div>

</div> 

</div>

</body>
</html>