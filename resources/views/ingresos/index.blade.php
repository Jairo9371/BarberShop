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
  <script src="{{asset('fonts/icomoon.ttf')}}"></script>
  <script src="{{asset('fonts/icomoon.woff')}}"></script>
    <title>Listado de Ingresos</title>
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
				<li><a href="/barber_shop/public/ingresos"><span class="icon-enter"></span>Ingresos</a></li>
				<li><a href="/barber_shop/public/egresos"><span class="icon-exit"></span>Egresos</a></li>
			</ul>
		</nav>



     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cliente</th>
      <th scope="col">Total</th>

      <th scope="col">Acciones</th>

    
    </tr>
  </thead>
  <tbody>
   @foreach($ingresos as $ing)
    <tr>
      <th scope="row">{{$ing->id}}</th>
      <td>{{$ing->fecha}}</td>
      <td>{{$ing->nombre_cliente}}</td>
      <td>{{$ing->total}}</td>
      <td>
      <form method="POST" action="{{url('/ingresos/'.$ing->id)}}">
      {{csrf_field()}}
      {{method_field('DELETE')}}
     
      <button type="submit" onclick="return confirm('Desea Eliminar el Cliente Seleccionado');"
      class="btn btn-danger btn-sm">Eliminar</button>
       </form><br>

      </td>   
    </tr>
      @endforeach
    </tbody>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearIngreso">
  Crear Nuevo Ingreso
</button>

<!-- Modal -->
<div class="modal fade" id="crearIngreso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
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

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Ingreso</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </footer>

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