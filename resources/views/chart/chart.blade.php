<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/argon.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <title>Document</title> !-->
</head>

<body>
    <h1>User Chart</h1>
    <div style="width:75%;">
        {!! $chartjs->render() !!}
    </div>
</body>

</html>
