<h1>Update Car {{$cars->id}}</h1>
<x-alert/>
<a href="{{route('user.index')}}">Home</a>
<a href="{{route('user.show', $cars->user_id)}}">Voltar</a>
<form action="{{ route('cars.update', $cars->id) }}" method="POST">
    @csrf()
    @method('PUT')
    @include('admin.cars.partials.form',[
        'cars'=>$cars,
        'user_id'=>$cars->user_id,
    ])
</form>
<form action="{{ route('cars.destroy', $cars->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar Carro!</button>
</form>
