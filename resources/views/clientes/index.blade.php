
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
      <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
    <title>Listado de Clientes</title>
  </head>
  <body>
<!--Creation the Menu-->

<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span>Menú</a>
		</div>

		<nav>
			<ul>
				<li><a href="/barber_shop/public/inicio"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="/barber_shop/public/clientes"><span class="icon-users"></span>Clientes</a></li>
				<li><a href="/barber_shop/public/barberos"><span class="icon-hipster"></span>Barberos</a></li>
				<li><a href="/barber_shop/public/horarios"><span class="icon-clock"></span>Horarios</a></li>
				<li><a href="/barber_shop/public/tarifas"><span class="icon-file-text"></span>Tarifas</a></li>
				<li><a href="/barber_shop/public/citas"><span class="icon-profile"></span>Citas</a></li>
				<li><a href="/barber_shop/public/ganancias"><span class="icon-coin-dollar"></span>Ganancias</a></li>
        <li>
          <form id="Logout" method="POST" action="{{url('logout')}}">
            {{csrf_field()}}
            <a href="javascript:{}" 
             onclick="document.getElementById('Logout').submit();">Cerrar Sesión</a>
            </form>
        </li>
			</ul>
		</nav>
	</header>
<!--Creation the Search -->
<div class = "row">
  <div class = "col -md-5">

    <form action = "{{url('/clientes')}}" method="GET" class = "d-flex">
      <input class="form-control" type="search" placeholder="Buscar por nombre" 
      name="nombre" arial-label="search">
    
      <button class = "btn btn-outline-success" type = "submit" >Buscar</button>
    </form>    
  </div>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clientes as $clic)<!--nombre de la variable mas un alias-->
    <tr>
      <th scope="row">{{$clic->id}}</th>
      <td>{{$clic->nombre}}</td>
      <td>{{$clic->direccion}}</td>
      <td>{{$clic->telefono}}</td>
      <td> 
      <form method="POST" action="{{url('/clientes/'.$clic->id)}}">
      {{csrf_field()}}
      {{method_field('DELETE')}}
     
      <button type="submit" onclick="return confirm('Desea Eliminar el Cliente Seleccionado');"
      class="btn btn-danger btn-sm">Eliminar</button>
      <a href="{{ url('/clientes/'.$clic->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a> 

       </form><br>

      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<!--show Paginate in the view-->
    {{$clientes->links()}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCliente">
  Crear Nuevo Cliente
</button>

<!-- Modal -->
<div class="modal fade" id="crearCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
<form method="POST" action="{{url('/clientes')}}"><br>
{{csrf_field()}}
    <label for="fname">Nombre:</label><br><br>
    <input type="text"id="nombre" name="nombre"><br><br>
    <label for="lname">Dirección:</label><br><br>
    <input type="text"id="direccion" name="direccion"><br><br>
    <label for="lname">Telefono:</label><br><br>
    <input type="number" id="telefono" name="telefono"><br>
    
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </footer>
  </body>
</html>