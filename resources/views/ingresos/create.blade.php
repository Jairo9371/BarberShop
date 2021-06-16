
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
     <form method="POST" action="{{url('/ingresos')}}"><br>
    {{csrf_field()}}
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha">
  </div>
  <label for="id_cita" class="form-label">Cliente</label><br>
  <select onchange="ColocarTotal();" id="id_cita" name= "id_cita" class="form-select" aria-label="Default select example">
  <option selected>Seleccione un Cliente</option>
  
  @foreach($citas as $cli)
  <option value="{{$cli->id}}">{{$cli->nombre}}--{{$cli->total}}</option>
    @endforeach
</select><br><br>

<label for="total" class="form-label">Total</label>
    <input readonly type="decimal" step="any" class="form-control" id="total" name="total"><br>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>

<script>
function ColocarTotal() {
var citas = <?php echo json_encode($citas); ?>;
var id_cita = document.getElementsByName("id_cita");

var select = document.getElementById("id_cita");
var clienteSeleccionado = select.options[select.selectedIndex].text;
console.log("CLIENTE SELECCIONADO");
console.log(clienteSeleccionado);
    for (var i = 0; i < citas.data.length; i++) {
        console.log("CLIENTE");
        console.log(i);
        
        console.log(citas.data[i].nombre);
        if (citas.data[i].nombre.trim() === clienteSeleccionado.trim()) {
            console.log("TOTAL");
            console.log(citas.data[i].total);
            document.getElementsByName("total")[0].value = citas.data[i].total;
        }
    }
}
</script>
   
  </body>
</html>