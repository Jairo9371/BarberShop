CREEMOS UNA NUEVA TARIFA

<form method="POST" action="{{url('/tarifas/'.$tarifa->id)}}"><br>
  
  
  @csrf
    {{method_field('PUT')}}


    <label for="fname">Tipo:</label><br><br>
    <input type="text"id="tipo" name="tipo" value= "{{$tarifa->tipo}}"><br><br>
    <label for="fname">Precio:</label><br><br>
    <input type="decimal"id="precio" name="precio" value= "{{$tarifa->precio}}"><br><br>
    <input class="form-control" type="submit" value="Guardar">

    </form>