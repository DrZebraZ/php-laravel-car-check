<h1>Listagem do Carro</h1>
<a href="{{route('check.create')}}">Novo Horário</a>
<table>
    <thead>
        <th>Agendado-Dia</th>
        <th>Exterior</th>
        <th>Interior</th>
        <th>Mecanica</th>
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
                    <a href="{{route('check.show', $check->id)}}">Ver</a>
                    <a href="{{route('check.edit', $check->id)}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$checks" :appends="$filters"/>
