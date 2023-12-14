<textarea id="exterior" placeholder="Exterior a ser feito" rows="4" cols="30" name="exterior">{{$check->exterior ?? old('exterior')}}</textarea>
<textarea id="interior" placeholder="Interior a ser feito" rows="4" cols="30" name="interior">{{$check->interior ?? old('interior')}}</textarea>
<textarea id="mechanical" placeholder="Mecânica a ser feito" rows="4" cols="30" name="mechanical">{{$check->mechanical ?? old('mechanical')}}</textarea>
<textarea id="electrical" placeholder="Elétrica a ser feito" rows="4" cols="30" name="electrical">{{$check->electrical ?? old('electrical')}}</textarea>
<input id="oil" type="text" placeholder="Óleo" name="oil" value="{{$check->oil ?? old('oil')}}">
<input id="tires" type="text" placeholder="Pneus" name="tires" value="{{$check->tires ?? old('tires')}}">
<input type="hidden" placeholder="{{$car_id ?? $check->car_id}}" name="car_id" value="{{$check->car_id ?? $car_id}}">
<button type="submit">Enviar!</button>
