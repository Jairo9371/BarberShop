
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

<!-- Formulario para el Modelo de Barbero-->

<form method="POST" action="{{ url('barberos/'.$barbero->id) }}">  
    @csrf
    {{method_field('PUT')}}

    <label for="fname">Nombre:</label><br><br>
    <input type="text"id="nombre" name="nombre" value="{{$barbero->nombre}}"><br><br>
    <label for="lname">Telefono:</label><br><br>
    <input type="number" id="telefono" name="telefono" value="{{$barbero->telefono}}"><br>
    <br>
    <input class="form-control" type="submit" value="Guardar">

    </form>
 