<h1>EDIT CHECK</h1>
{{$check->scheduled}}

<?php

    $datetimeString = $check->scheduled;
    $formattedDateTime = date('Y-m-d\TH:i', strtotime($datetimeString));
?>

<a href="{{route("user.index")}}">Home</a>
<a href="{{route("checks.index", $check->car_id)}}">Voltar</a>
<form action="{{ route('checks.update', $check->id)}}" method="POST">
    @csrf()
    @method('PUT')
    <input id="data" type="datetime-local" name="scheduled" placeholder="{{$formattedDateTime}}" required value={{$formattedDateTime}}>
    @include('admin.checks.partials.form')
</form>
