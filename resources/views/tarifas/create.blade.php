CREEMOS UNA NUEVA TARIFA

<form method="POST" action="{{url('/tarifas')}}"><br>
{{csrf_field()}}<!-- Nos sirver para validar que sean correctos los datos un formulario-->
    <label for="fname">Tipo:</label><br><br>
    <input type="text"id="tipo" name="tipo"><br><br>
    <label for="fname">Precio:</label><br><br>
    <input type="decimal"id="precio" name="precio"><br><br>
    <input class="form-control" type="submit" value="Guardar">

    </form>