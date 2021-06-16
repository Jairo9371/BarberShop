
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

    <title>Ingresos</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
     <form method="POST" action="{{url('/egresos')}}"><br>
    {{csrf_field()}}

  <div class="mb-3"><br>
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha">
  </div>
  <label for="id_gasto" class="form-label">Total de Gastos</label><br>
  <select name= "id_gasto"class="form-select" aria-label="Default select example">
  <option selected>Seleccione un Total</option>
  
  @foreach($gasto as $gas)
  <option value="{{$gas->id}}">{{$gas->total}}</option>
    @endforeach
</select><br>
  <label for="id_pago" class="form-label">Total de Pagos</label><br>
  <select name= "id_pago"class="form-select" aria-label="Default select example">
  <option selected>Seleccione un Total</option>
  
  @foreach($pago as $pag)
  <option value="{{$pag->id}}">{{$pag->total}}</option>
    @endforeach
</select><br>
  <label for="id_barbero" class="form-label">Barbero</label><br>
  <select name= "id_barbero"class="form-select" aria-label="Default select example">
  <option selected>Seleccione un Barbero</option>
  
  @foreach($barbero as $bar)
  <option value="{{$bar->id}}">{{$bar->nombre}}</option>
    @endforeach
</select><br>
  <div class="mb-3"><br>
    <label for="total" class="form-label">Total</label>
    <input type="number" step="any" class="form-control" id="total" name="total">
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>

  </body>
</html>