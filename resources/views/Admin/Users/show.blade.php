<h1>Detalhes do Usuário: {{$user->id}}</h1>
{{-- {{dd($cars)}} --}}
<a href="{{route('user.index')}}">Home</a>

<ul>
    <li>Nome: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Idade: {{$user->age}}</li>
    <li>Gênero: {{$user->gender}}</li>
    <li><a href="{{route('user.edit', $user->id)}}">Editar</a></li>
</ul>

<table>
    <thead>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Ano</th>
    </thead>
    <tbody>
        @foreach ($cars->items() as $car)
            <tr>
                <td>{{$car->brand}}</td>
                <td>{{$car->name}}</td>
                <td>{{$car->year}}</td>
                <td><a href="{{route('checks.index',$car->id)}}">Ver</a></td>
                <td><a href="{{route('cars.edit',$car->id)}}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$cars" :appends="$user->id"/>
<a href="{{route('cars.create', $user->id)}}">Adicionar Veículo</a>

<form action="{{ route('user.destroy', $user->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar Usuário!</button>
</form>
