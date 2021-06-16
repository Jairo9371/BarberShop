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

    <title>Ingreso Detalle Citas</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
     <form method="POST" action="{{url('/detallecitas')}}"><br>
    {{csrf_field()}}

  <label for="Cita" class="form-label">Cita</label><br>
  <select name= "id_cita"class="form-select" aria-label="Default select example">
  <option selected>Seleccione una Cita</option>
  
  @foreach($citas as $ci)
  <option value="{{$ci->id}}">{{$ci->nombre}}</option>
    @endforeach
</select><br><br>

<label for="id_tarifa" class="form-label">Tarifas</label><br>

  @foreach($tarifas as $ta)
  <div class="form-check form-check-inline">
  <input class="form-check-input" name="id_tarifa" type="checkbox" value="{{$ta->id}}" onclick="totalIt()"><br>
  <label class="form-check-label" for="{{$ta->id}}">{{$ta->tipo}}-->{{$ta->precio}}</label>
  </div>  
@endforeach
  <div class="mb-3"><br>

    <label for="subtotal" class="form-label">SubTotal</label><br>
    <input value="Q0.00" readonly="readonly" type="text" name="subtotal" />
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </div>
    <div class="col">
    </div>
  </div>
</div>
<script>

var dict = []; // create an empty array
function totalIt() {
  var javaScriptVar = <?php echo json_encode($tarifas); ?>;
  var input = document.getElementsByName("id_tarifa");
  var subtotal = 0;
  var dict = []; // create an empty array
  for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      console.log(javaScriptVar.data[i].precio);
      dict.push(javaScriptVar.data[i]);
      console.log("DIST");
      console.log(dict);
      subtotal = subtotal + parseInt(javaScriptVar.data[i].precio);
      
    }
  }
  document.getElementsByName("subtotal")[0].value = "Q" + subtotal;
}
</script>

  </body>
</html>