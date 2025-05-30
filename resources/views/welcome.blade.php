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
<style>
  .steps-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 30px;
    background-color: white;
  }

  .step .circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(145deg, #00d1c1, #005b83);
    border-radius: 50%;
    color: white;
    font-size: 32px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
  }

  .step .description {
    font-weight: 600;
    color: 333;
  }

  .arrow {
    font-size: 24px;
    color: #00bcd4;
  }

  @media (max-width: 768px) {
    .steps-container {
      flex-direction: column;
    }

    .arrow {
      transform: rotate(90deg);
    }
  }
</style>


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
                            <li class="nav-item">
                                <a class="nav-link" href="/login"> inicio de sesion </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Registro</a>
                            </li>

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
<!--about section-->
   <section class="about_section layout_padding">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <div class="img-box">
                       <img src="images/1.png" alt="">
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="detail-box">
                       <h2 class="custom_heading">
                           STAFF CONTROL <br>
                           <span>
                              ¿QUIENES SOMOS?
                           </span>
                       </h2>
                       <p>
                           Somos una aplicación que surgió a raíz
                           de los problemas que enfrentan algunas
                           instituciones del país con el ingreso
                           de las personas a sus instalaciones.
                           Decidimos crear una forma de automatizar
                           el ingreso de las personas.
                       </p>
                       <div>
                           <a href="more.html">
                             Saber Mas
                           </a>
                         </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- sección de pasos -->
<section class="steps_section" style="padding: 50px 0; background-color:rgb(255, 255, 255);">
  <div class="container">
    <h2 class="text-center mb-5" style="font-weight: bold; color: #005b83;">¿Cómo funciona?</h2>
    <div class="steps-container d-flex flex-wrap justify-content-center align-items-center gap-5">

      <div class="step text-center">
        <div class="circle mx-auto">1</div>
        <div class="description">Contactarse con un acesor</div>
      </div>
      <div class="arrow">➔</div>
      <div class="step text-center">
        <div class="circle mx-auto">2</div>
        <div class="description">Solicitar el software</div>
      </div>
      <div class="arrow">➔</div>
      <div class="step text-center">
        <div class="circle mx-auto">3</div>
        <div class="description">Recibes un usuario de administrador</div>
      </div>
      <div class="arrow">➔</div>
      <div class="step text-center">
        <div class="circle mx-auto">4</div>
        <div class="description">Disfrutar de tu programa</div>
      </div>

    </div>
  </div>
</section>
<br>
<!-- gallery section -->
<section class="gallery-section layout_padding">
       <div class="container">
           <h2>
               Nuestros Asociados.
           </h2>
       </div>
       <div class="container ">
           <div class="img_box box-3">
               <img src="images/imagen1.png" alt="">
           </div>
           <div class="img_box box-4">
               <img src="images/G2.png" alt="">
           </div>
           <div class="img_box box-5">
               <img src="images/G5.png" alt="">
           </div>
       </div>
   </section>
   <!-- end gallery section -->
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