<?php
session_start();
include('actions/protected_sesion.php');
?>

<?php    
    include('modelo/class_graficas.php');
    $ref=new graficas();
    $data=$ref->get_all_problematicas_departamento();
    /*echo '<br><br><pre>';
    print_r($data);
    echo '</pre>';*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "inclusiones/meta_tags.php" ?>
    <title>Page Title</title>
    <?php include "inclusiones/css_y_favicon.php" ?>

    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

     

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Departamento', 'Problemas'],
            <?php foreach($data as $listItem): ?>
                ['<?= $listItem['nombre_depa'] ?>', <?= $listItem['problemas'] ?>],
            <?php endforeach; ?>
        ]);

/*
        [
          ['Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]
*/
        var options = {
          width: 1000,
          legend: { position: 'center' },
          chart: {
            title: 'Medición de problemáticas por departamentos',
            subtitle: 'Estrategía de mejora' },
          axes: {
            x: {
              0: { side: 'top', label: 'Departamentos - Seleccione la barra'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>    
</head>
<body>
            <!-- menu principal -->
            <div class="container-fluid">
                <div class="row">
                        <div class="col-12">
                                <?php include_once "inclusiones/menu_horizontal_superior.php" ?>
                        </div>
                </div>
            </div>



    <div class='container' style="margin-top: 15px !important;">
        <h1>Medición de Problemáticas</h1>
        
        <div id="row">
            <div class="col-md-12">
                <div id="top_x_div" style="width: 800px; height: 600px;"></div>    
            </div> 
        </div>

  
    </div><!-- end container-->
    <?php include "inclusiones/js_incluidos.php" ?>
</body>
</html>