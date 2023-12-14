<h1>Detalhes do Carro {{$car->id}} e Checagens: </h1>

<a href="{{route('user.index')}}">Home</a>

<ul>
    <li>Modelo: {{$car->name}}</li>
    <li>Marca: {{$car->brand}}</li>
    <li>Ano: {{$car->year}}</li>
    <li><a href="{{route('cars.edit', $car->id)}}">Editar</a></li>
</ul>

<a href="{{route('checks.create', $car->id)}}">Adicionar Checagem!</a>
<table>
    <thead>
        <th>Data</th>
        <th>Exterior</th>
        <th>Interior</th>
        <th>Mecânica</th>
        <th>Elétrica</th>
        <th>Óleo</th>
        <th>Pneus</th>
    </thead>
    <tbody>
        @foreach ($checks->items() as $check)
            <tr>
                <td>{{ $check->scheduled }}</td>
                <td>{{ $check->exterior }}</td>
                <td>{{ $check->interior }}</td>
                <td>{{ $check->mechanical }}</td>
                <td>{{ $check->electrical }}</td>
                <td>{{ $check->oil }}</td>
                <td>{{ $check->tires }}</td>
                <td>
                    <a href="{{route('checks.edit', $check->id)}}">Editar</a>
                </td>
                <td>
                    <form action="{{ route('checks.destroy', $check->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar!</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$checks" :appends="$filters"/>
