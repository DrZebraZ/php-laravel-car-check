<input type="text" placeholder="Modelo" name="name" value="{{$cars->name ?? old('name')}}">
<input type="text" placeholder="Marca" name="brand" value="{{$cars->brand ?? old('brand')}}">
<input type="number" placeHolder="Ano" name="year" value="{{$cars->year ?? old('year')}}">
<input type="hidden" placeholder="{{$user_id}}" name="user_id" value="{{$cars->user_id ?? $user_id}}">
<button type="submit">Enviar!</button>
