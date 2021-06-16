
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
<form method="POST" action="{{url('/gastos')}}"><br>
{{csrf_field()}}
    <label for="fname">Fecha:</label><br><br>
    <input type="date"id="fecha" name="fecha"><br><br>
    <label for="lname">Producto:</label><br><br>
    <input type="text"id="producto" name="producto"><br><br>
    <label for="lname">Cantidad:</label><br><br>
    <input type="number" id="cantidad" name="cantidad"><br><br>
    <label for="lname">Precio:</label><br><br>
    <input type="number"step="any" id="precio" name="precio"><br><br>
    <label for="lname">Total:</label><br><br>
    <input type="number"step="any" id="total" name="total"><br>
    <br>
    <input class="form-control" type="submit" value="Guardar">

    </form>
    </center>
 