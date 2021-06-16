
<!-- Sirve para cambiar el formato en el Navegador-->
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
    margin: 0;
}
input[type=number]{
    -moz-appearance:textfield;
}</style>
<center>
<form method="POST" action="{{url('/pagos')}}"><br>
{{csrf_field()}}
    <label for="fname">Fecha:</label><br><br>
    <input type="date"id="fecha" name="fecha"><br><br>
    <label for="lname">Descripción:</label><br><br>
    <input type="text"id="descripcion" name="descripcion"><br><br>
    <label for="lname">Total:</label><br><br>
    <input type="number"step="any" id="total" name="total"><br>
    <br>
    <input class="form-control" type="submit" value="Guardar">

    </form>
    </center>
 