
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
      <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
    <title>Listado de Ganancias</title>
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


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Mes</th>
      <th scope="col">Año</th>
      <th scope="col">Ingresos</th>
      <th scope="col">Egresos</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  @foreach($ganancias as $gan)<!--nombre de la variable mas un alias-->
    <tr>
      <th scope="row">{{$gan->id}}</th>
      <td>{{$gan->mes}}</td>
      <td>{{$gan->año}}</td>
      <td>{{$gan->ingresos}}</td>
      <td>{{$gan->egresos}}</td>
      <td>{{$gan->total}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

<a href="{{ url('/pagos')}}" class="btn btn-warning btn-sm">Pagos</a>
<a href="{{ url('/gastos')}}" class="btn btn-success btn-sm">Gastos</a>

  </body>
</html>