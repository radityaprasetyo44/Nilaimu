<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card-header">
            <center><h4>Excel With malasngoding.com</h4></center>    
        </div>

        <div class="card-body">
            <a href="/excel/export" class="btn btn-success my-3" target="_blank">Export</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nis</th>
                        <th>Alamat</th>
                    </tr>
                </thead>

                <tbody>
                    @php $i = 1 @endphp
                    @foreach($siswa as $s)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</body>
</html>