
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

<form method="POST" action="{{ url('clientes/'.$cliente->id) }}">  
    @csrf
    {{method_field('PUT')}}

    <label for="fname">Nombre:</label><br><br>
    <input type="text"id="nombre" name="nombre" value="{{$cliente->nombre}}"><br><br>
    <label for="lname">Dirección:</label><br><br>
    <input type="text"id="direccion" name="direccion" value="{{$cliente->direccion}}"><br><br>
    <label for="lname">Telefono:</label><br><br>
    <input type="number" id="telefono" name="telefono" value="{{$cliente->telefono}}"><br>  
    <br>

    <input class="form-control" type="submit" value="Actualizar">

    </form>