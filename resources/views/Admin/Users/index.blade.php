<h1>Listagem de Usuários</h1>
<a href="{{route('user.create')}}">Novo Usuário</a>
<table>
    <thead>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Gênero</th>
    </thead>
    <tbody>
        @foreach ($users->items() as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->gender }}</td>
                {{-- <td>{{ getUserGender($user->gender) }}</td> --}}
                <td>
                    <a href="{{route('user.show', $user->id)}}">Ver</a>
                    <a href="{{route('user.edit', $user->id)}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-pagination :paginator="$users" :appends="$filters"/>


{{--
$table->string('name');
$table->string('email')->unique();
$table->integer('age');
$table->string('gender'); --}}
