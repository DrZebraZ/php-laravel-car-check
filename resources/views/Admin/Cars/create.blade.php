<h1>Create new Car for User {{$user_id}}</h1>

<x-alert/>

<form action="{{ route('cars.store') }}" method="POST">
    @csrf()
    @include('admin.cars.partials.form')
</form>
