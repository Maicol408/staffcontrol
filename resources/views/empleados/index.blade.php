<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>STAFF CONTROL</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])
    @endif

</head>
<body>
   <div class="hero_area">
    <!-- header section starts -->
      <header class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="http://127.0.0.1:8000/">
                    <img src="images/logo.png" alt="">
                    <span>
                       STAFF CONTROL
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="http://127.0.0.1:8000/">inicio <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contactanos</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="/login"> inicio de sesion </a>
                            </li>-->
                            <!--<li class="nav-item">
                                <a class="nav-link" href="/register">Registro</a>
                            </li>-->

                        </ul>
                        <!--<form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">mmm</button>
                          </form>-->
                    </div>
                    <div class="quote_btn-container  d-flex justify-content-center">
                        <a href="tel:+01123456789">
                            llamar a: +01 12345678
                        </a>
                    </div>
                </div>
            </nav>
         </div>
      </header>
      <!-- end header section -->
   </div>
<br>
<br>
<br>

<form action="{{ route('empleados.buscar') }}" method="GET">
    <input type="text" name="query" class="form-control" placeholder="Buscar empleado...">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>


<div class="container">
    <h1>Lista de Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Nuevo Empleado</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <!--<th>Departamento</th>-->
                <!--<th>Cargo</th>-->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <!--<td>{{ $empleado->departamento }}</td>-->
                    <!--<td>{{ $empleado->cargo }}</td>-->
                    <td>
                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info">Ver</a>
                    <!--<a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>-->
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                    @if (!$empleado->activo)
                       <form action="{{ route('empleados.reactivar', $empleado->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <button type="submit" class="btn btn-warning">Reactivar</button>
                       </form>
                    @endif
 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<br>
<br>
   <!-- info section -->
   <section class="info_section layout_padding2">
       <div class="container">
           <div class="info_items">
               <a href="">
                   <div class="item ">
                       <div class="img-box box-1">
                           <img src="" alt="">
                       </div>
                       <div class="detail-box">
                           <p>
                               SENA
                               CALLE 13 # 65-10
                           </p>
                       </div>
                   </div>
               </a>
               <a href="">
                   <div class="item ">
                       <div class="img-box box-2">
                           <img src="" alt="">
                       </div>
                       <div class="detail-box">
                           <p>
                               +02 1234567890
                           </p>
                       </div>
                   </div>
               </a>
               <a href="">
                   <div class="item ">
                       <div class="img-box box-3">
                           <img src="" alt="">
                       </div>
                       <div class="detail-box">
                           <p>
                               recursoshumanos@staffcontrol.com.co
                           </p>
                       </div>
                   </div>
               </a>
           </div>
       </div>
   </section>
   <!-- end info section-->

   <footer>
        &copy; {{ date('Y') }} Staff Control - Todos los derechos reservados
    </footer>

<script type="text/javascript" src="JS/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.js"></script>

<script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
</script>
<!-- end google map js -->



</body>
</html>


