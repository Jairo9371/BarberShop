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

    <title>Listado Detalle de Citas</title>
  </head>
  <body>
     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Tarifa</th>
      <th scope="col">Precio</th>
      <th scope="col">SubTotal</th>
    </tr>
  </thead>
  <tbody>
   @foreach($detallecitas as $dec)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
      <td>{{$dec->cliente}}</td>
      <td>{{$dec->tipo}}</td>
      <td>{{$dec->precio}}</td>
      <td>{{$dec->subtotal}}</td>
      <td>
         <form method="POST" action="{{url('/detallecitas/'.$dec->id)}}">
     {{ csrf_field() }}
 {{ method_field('DELETE') }} 
      <button type="submit" onclick="return confirm('Desea Eliminar la Tarifa Seleccionada');"
      class="btn btn-danger btn-sm">Eliminar</botton>
      </form>
      </td>
    </tr>
      @endforeach
  </table>
  
<!--show Paginate in the view-->
    {{$detallecitas->links()}}
  </body>
</html>