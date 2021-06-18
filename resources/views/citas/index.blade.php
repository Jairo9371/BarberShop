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
    <title>Listado de Citas</title>
  </head>
  <body>

<!--Creation the Menu-->

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

<!--Creation the Search -->
<div class = "row">
  <div class = "col -md-5">

    <form action = "{{url('/citas')}}" method="GET" class = "d-flex">
      <input class="form-control" type="search" placeholder="Buscar por cliente" 
      name="nombre" arial-label="search">
      <input class="form-control" type="search" placeholder="Buscar por fecha" 
      name="fecha" arial-label="search"> 
      <button class = "btn btn-outline-success" type = "submit" >Buscar</button>
    </form>    
  </div>
</div>

     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cliente</th>
      <th scope="col">Horario</th>
      <th scope="col">Barbero</th>
      <th scope="col">Total</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   @foreach($citas as $ci)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$ci->fecha}}</td>
      <td>{{$ci->nombre_cliente}}</td>
      <td>{{$ci->hora}}</td>
      <td>{{$ci->nombre_barbero}}</td>
      <td>{{$ci->total}}</td>
      <td> 
      <form method="POST" action="{{url('/citas/'.$ci->id)}}">
     {{ csrf_field() }}
 {{ method_field('DELETE') }} 
      <button type="submit" onclick="return confirm('Desea Eliminar la Cita Seleccionada');"
       class="btn btn-danger btn-sm">Eliminar</button>
      <a href="{{ url('/citas/'.$ci->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a> 
      </form>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>

<!--show Paginate in the view-->
    {{$citas->links()}}


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCita">
  Crear Nueva Cita
</button>

<!-- Modal -->
<div class="modal fade" id="crearCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Citas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form method="POST" action="{{url('/citas')}}">
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

      <input type="hidden" class="form-control" id="total" name="total" value="0.00">
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cita</button>
        </form>
      </div>
    </div>
  </div>
</div>
      
  </body>
</html>