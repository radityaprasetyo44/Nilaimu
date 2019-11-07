@extends('chart.chart')

@section('content')
<h1>Users Graphs</h1>

<div style="width: 50%">
    {!! $usersChart->container() !!}
</div>
@endsection