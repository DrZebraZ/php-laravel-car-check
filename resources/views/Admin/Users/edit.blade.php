<h1>Update User {{$user->id}}</h1>

<x-alert/>

<a href="{{route('user.index')}}">Home</a>
<a href="{{route('user.show', $user->id)}}">Voltar</a>
<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf()
    @method('PUT')
    @include('admin.users.partials.form',[
        'user'=>$user
    ])
</form>
<form action="{{ route('user.destroy', $user->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar!</button>
</form>

{{--
$table->string('name');
$table->string('email')->unique();
$table->integer('age');
$table->string('gender'); --}}
