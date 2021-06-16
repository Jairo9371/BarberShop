QUIERO CREAR UN NUEVO HORARIO

<form method="POST" action="{{ url('/horarios')}}"><br>
{{ csrf_field() }}
    <label for="fname">Hora:</label><br><br>
    <input type="time"id="hora" name="hora"><br><br>
    <input class="form-control" type="submit" value="Guardar">

    </form>