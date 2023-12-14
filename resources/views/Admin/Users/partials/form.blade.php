<input type="text" placeholder="Nome" name="name" value="{{$user->name ?? old('name')}}">
<input type="text" placeholder="Email" name="email" value="{{$user->email ?? old('email')}}">
<input type="number" placeHolder="Idade" name="age" value="{{$user->age ?? old('age')}}">
<input type="text" placeholder="Genero" name="gender" value="{{$user->gender ?? old('gender')}}">
<button type="submit">Enviar!</button>
