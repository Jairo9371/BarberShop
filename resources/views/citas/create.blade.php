
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" >
      <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

    <title>Ingreso de Citas</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
     <form method="POST" action="{{url('/citas')}}"><br>
    {{csrf_field()}}
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha">
  </div>
  <label for="Cliente" class="form-label">Cliente</label><br>
  <select name= "id_cliente"class="form-select" aria-label="Default select example">
  <option selected>Seleccione un cliente</option>
  
  @foreach($clientes as $clic)
  <option value="{{$clic->id}}">{{$clic->nombre}}</option>
    @endforeach
</select><br>
<label for="Horario" class="form-label">Horario</label><br>
<select name= "id_horario" class="form-select" aria-label="Default select example">
  <option selected>Seleccione un horario</option>
  
  @foreach($horarios as $hor)
  <option value="{{$hor->id}}">{{$hor->hora}}</option>
    @endforeach
</select><br>

<label for="Barbero" class="form-label">Barbero</label><br>
<select name= "id_barbero"class="form-select" aria-label="Default select example">
  <option selected>Seleccione un Barbero</option>
  
  @foreach($barberos as $b) 
  <option value="{{$b->id}}">{{$b->nombre}}</option>
  @endforeach
</select><br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>

  </body>
</html>