<h1>Create check for car {{$car_id}}</h1>

<x-alert/>

<a href="{{route("user.index")}}">Home</a>
<a href="{{route("checks.index", $car_id)}}">Voltar</a>
<form action="{{ route('checks.store')}}" method="POST">
    @csrf()
    <input id="data" type="datetime-local" name="scheduled" placeholder="Data" required value={{$check->scheduled ?? old('scheduled')}}>
    @include('admin.checks.partials.form')
</form>


