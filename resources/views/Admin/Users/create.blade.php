<h1>Create new User</h1>

<x-alert/>

<form action="{{ route('user.store') }}" method="POST">
    @csrf()
    @include('admin.users.partials.form')
</form>


{{--
$table->string('name');
$table->string('email')->unique();
$table->integer('age');
$table->string('gender'); --}}
