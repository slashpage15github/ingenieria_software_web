<?php
session_start();
?>
<style>
    .navbar {
        font-family: Verdana, sans-serif;
        font-size: 18px !important;
    }

    .dropdown:hover .drop-catalogo {
        display: block;
    }

    .dropdown:hover .drop-ajustes {
        display: block;
    }
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="btn btn-success" href="index.php">Registro</a>
      <a class="btn btn-warning" href="#" style="margin-left: 5px">Buscar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
          </li>
        <!--  <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Disabled</a>
          </li>-->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
            <div class="dropdown-menu drop-ajustes" aria-labelledby="dropdown04">
<!--              <a class="dropdown-item" href="lista_aspirantes.php">Cambios Registro</a>-->
              <a class="dropdown-item" href="dashboard_grafica.php">Gráfica</a>
              <!--<a class="dropdown-item" href="#">Fechas Cursos</a>-->
            </div>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos</a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="lista_departamentos.php">Catálogo Departamentos</a>
            </div>
          </li>
          <!--
          <li class="nav-item active">
            <a class="nav-link" href="#">Usuarios <span class="sr-only">(current)</span></a>
          </li>
-->
          <?php if(isset($_SESSION['usuario'])){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['usuario']);?></a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="actions/cerrar_sesion.php">Cerrar sesión</a>
            </div>
          </li>
          <?php } ?>

         </ul>
        <!--<form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>-->
      </div>
</nav>