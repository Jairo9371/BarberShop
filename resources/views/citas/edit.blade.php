
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" >
      <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
      <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <title>Citas</title>
   

  </head>
  <body>

<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span>Menú</a>
		</div>

		<nav>
			<ul>
				<li><a href="/barber_shop"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="/barber_shop/public/clientes"><span class="icon-users"></span>Clientes</a></li>
				<li><a href="/barber_shop/public/barberos"><span class="icon-hipster"></span>Barberos</a></li>
				<li><a href="/barber_shop/public/horarios"><span class="icon-clock"></span>Horarios</a></li>
				<li><a href="/barber_shop/public/tarifas"><span class="icon-file-text"></span>Tarifas</a></li>
				<li><a href="/barber_shop/public/citas"><span class="icon-profile"></span>Citas</a></li>
				<li><a href="/barber_shop/public/ganancias"><span class="icon-coin-dollar"></span>Ganancias</a></li>

			</ul>
		</nav>
	</header>


    <div class="container">
  <div class="row">
    <div class="col-1">

    </div>
    <div class="col-10">
    <br>
    <a href="{{ url('/citas')}}" class="btn btn-danger btn-sm">Regresar</a>

    <br>
    <br>

     Datos de la Cita:
     
     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cliente</th>
      <th scope="col">Horario</th>
      <th scope="col">Barbero</th>
      <th scope="col">Total</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $datos_cita->id }}</th>
      <td>{{$datos_cita->fecha}}</td>
      <td>{{$datos_cita->nombre_cliente}}</td>
      <td>{{$datos_cita->hora}}</td>
      <td>{{$datos_cita->nombre_barbero}}</td>
      <td>{{$datos_cita->total}}</td>
    </tr>
  </tbody>
</table>

<!-- Button trigger modal --><br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Tarifas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tarifas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/detallecitas')}}">
          {{csrf_field()}}
            <input type="hidden" class="form-control" id="id_cita" name="id_cita" value="{{$datos_cita->id}}">
            <div class="mb-3">
              <label for="id_tarifa" class="form-label"></label>
                @foreach($tarifas as $ta)
                <div class="form-check">
                <input class="form-check-input" name="id_tarifa" id="id_tarifa" type="checkbox" value="{{$ta->id}}" onclick="totalIt()">
                <label class="form-check-label" for="{{$ta->id}}">{{$ta->tipo}}-->{{$ta->precio}}</label>
                </div>  
                @endforeach
                <div class="mb-3"><br>
                    <label for="subtotal" class="form-label">SubTotal</label><br>
                    <input value="0.00" readonly="" type="text" name="subtotal" />
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
         </form>
        <button  onclick="enviar_datos();" class="btn btn-primary">Agregar </button>

      </div>
    </div>
  </div>
</div>

    </div>
    <div class="col-1">
    </div>

  
  </div>
  <br>
  <br>
  <br>
  Detalle de Cita:
      <div class="container">
  <div class="row">
    <div class="col-1">

    </div>
  
     
      <table class="table"><br>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Tarifa</th>
      <th scope="col">Precio</th>
      <th scope="col">SubTotal</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
   @foreach($detalle_citas as $dec)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dec->nombre}}</td>
      <td>{{$dec->tipo}}</td>
      <td>{{$dec->precio}}</td>
      <td>{{$dec->subtotal}}</td>
      <td>
       <form method="POST" action="{{url('/detallecitas/'.$dec->id)}}">
     {{ csrf_field() }}
 {{ method_field('DELETE') }} 
 <input class="form-control" type="hidden" name="id_cita" value="{{$datos_cita->id}}">

      <button type="submit" onclick="return confirm('Desea Eliminar la Tarifa Seleccionada');"
      class="btn btn-danger btn-sm">Eliminar</botton>
      </form>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
   
 </div>
    <div class="col-1">
    </div>
    </div>

<script>

var diccionario = []; // create an empty array
function totalIt() {
  var javaScriptVar = <?php echo json_encode($tarifas); ?>;
  var input = document.getElementsByName("id_tarifa");
  var subtotal = 0;
  var dict = []; // create an empty array
  for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      subtotal = subtotal + parseInt(javaScriptVar.data[i].precio);


      dict.push({
        id:id_tarifa[0].value,
        id_cita:id_tarifa[i].value,
        id_tarifa:id_tarifa[i].value,
        subtotal:parseInt(javaScriptVar.data[i].precio),
      });
      
    }
  }
  diccionario=dict;
  console.log("Dict");
    console.log(dict);
    console.log("Diccionario");
    console.log(diccionario);
  document.getElementsByName("subtotal")[0].value = subtotal;
}

function enviar_datos(){

  console.log("ENVIANDO DATOS");

  $.ajax({
    type:'POST',
    url:'{{url('/detallecitas/')}}',
    data:{
      dic:diccionario 
    },
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    },
    success: function(Response){
      console.log(Response);
    }
  });
}
</script>




  </body>
</html>