
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
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>}
  <link rel="stylesheet" href="{{asset('/css/estilos.css')}}">
 <link rel="stylesheet" href="{{asset('/css/fonts.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
    <title>Listado de Gastos</title>
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
				<li><a href="/barber_shop/public/ganancias"><span class="icon-enter"></span>Ganancias</a></li>

			</ul>
		</nav>
	</header>




<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  @foreach($gastos as $gas)<!--nombre de la variable mas un alias-->
    <tr>
      <th scope="row">{{$gas->id}}</th>
      <td>{{$gas->fecha}}</td>
      <td>{{$gas->producto}}</td>
      <td>{{$gas->cantidad}}</td>
      <td>{{$gas->precio}}</td>
      <td>{{$gas->total}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
<br>
<br>

<!--show Paginate in the view-->
{{$gastos->links()}}

<a href="{{ url('/ganancias')}}" class="btn btn-danger btn-sm">Atras</a>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearGasto">
  Crear Nuevo Gasto
</button>

<!-- Modal -->
<div class="modal fade" id="crearGasto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gastos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
<form method="POST" action="{{url('/gastos')}}"><br>
{{csrf_field()}}
    <label for="fname">Fecha:</label><br><br>
    <input type="date"id="fecha" name="fecha"><br><br>
    <label for="lname">Producto:</label><br><br>
    <input type="text"id="producto" name="producto"><br><br>
    <label for="lname">Cantidad:</label><br><br>
    <input  type="number" id="cantidad" name="cantidad"><br><br>
    <label for="lname">Precio:</label><br><br>
    <input onchange="Colocartotal();" type="number"step="any" id="precio" name="precio"><br><br>
    <label for="lname">Total:</label><br><br>
    <input readonly type="number"step="any" id="total" name="total"><br>
    <br>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Gastos</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </footer>
<script>

function Colocartotal(){
var total = 0;
var precio = document.getElementsByName("precio");
var cantidad = document.getElementsByName("cantidad");
console.log("COLOCAR TOTAL");
console.log(precio[0].value);
console.log(cantidad[0].value);
document.getElementsByName("total")[0].value = precio[0].value * cantidad[0].value;

}

</script>
  </body>
</html>