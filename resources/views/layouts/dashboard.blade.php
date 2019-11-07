<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/myDashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap JS-->

    <title>Document</title>
</head>

<body>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <div style="
        display: grid;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    ">

        <div class="row" style="
            background-color: white;
            width: 100%;
            height: 100%;
            padding-left: 2%;
        ">

            <h1>Halo</h1>
            <label for=""><a href="login">Raditya</a></label>
            <!-- <select name="" id="">
            <label for=""><a href="login">Raditya</a></label>
            <option value="">Raditya</option>
            <option value="" href="login">ada</option>
            </select>  -->

        </div>

        <div class="row" style="
            width: 100%;
            height: 100%;  
        ">

            <div class="col-sm-2" style="
                background-color: rgb(252, 252, 252);
                width: 100%;
                height: 100%;
            ">
                <nav style="
                    padding-top: 4%;
                    position: fixed;
                ">
                    <ul style="
                    list-style: none;
                    font-size: 1.5rem;
                    padding: 0;
                ">
                        <li class="my-li"><a href="/login" class="my-link">Nilaiku</a></li>
                        <li class="my-li"><a href="#" class="my-link">Nilai Kelas</a></li>
                        <li class="my-li"><a href="#" class="my-link">Pengaturan</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col" style="
                background-color: rgb(242, 242, 242);
                width: 100%;
                height: 100%;
            ">
                <a href="/excel/export" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                <a href="/excel/import_excel" class="btn btn-primary my-3" target="_blank">IMPORT EXCEL</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td style="width: 5vw">No</td>
                            <td>Nama</td>
                            <td>Nis</td>
                            <td style="width: 5vw">K1</td>
                            <td style="width: 5vw">K2</td>
                            <td style="width: 5vw">K3</td>
                            <td style="width: 5vw">K4</td>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($siswa as $s)
                        <tr style="color: black">
                            <td>{{ $i++ }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->K1 }}</td>
                            <td>{{ $s->K2 }}</td>
                            <td>{{ $s->K3 }}</td>
                            <td>{{ $s->K4 }}</td>
                        </tr>
                        @endforeach
                        <div class="container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Chart Demo</div>

                                            <div class="panel-body">
                                                {!! $chart->html() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Charts::scripts() !!}
                            {!! $chart->script() !!}
                        </div>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>
