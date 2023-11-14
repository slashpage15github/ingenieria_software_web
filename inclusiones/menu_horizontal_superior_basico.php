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
      <a class="btn btn-success" href="#">Egresos</a>
      <a class="btn btn-warning" href="#" style="margin-left: 5px">Ingresos</a>
      <a class="btn btn-danger" href="#" style="margin-left: 5px">Informe</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Login <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos</a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="beneficiario_catalogo.php">Beneficiarios</a>
              <a class="dropdown-item" href="componente_catalogo.php">Componentes</a>
            </div>
          </li>
          
          <?php if(isset($_SESSION['usuario'])){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['usuario']);?></a>
            <div class="dropdown-menu drop-catalogo" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
            </div>
          </li>
          <?php } ?>

         </ul>
      </div>
</nav>