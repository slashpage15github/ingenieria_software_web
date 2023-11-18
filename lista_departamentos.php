<?php
session_start();
include('actions/protected_sesion.php');
?>


<!DOCTYPE html>
<html>
<head>
    <?php include "inclusiones/meta_tags.php" ?>
    <title>Page Title</title>
    <?php include "inclusiones/css_y_favicon.php" ?>
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
    <legend class="text-center header"><h1>Lista de departamentos</h1></legend>
  
    
    <?php  
include("modelo/class_departamento_dal.php");
$obj_depa=new Departamento_dal;

$result_depa=$obj_depa->obtener_lista_departamento();

    if ($result_depa==NULL){

            print "<p>No se encontraron resultados de cursos</p>";
        }
        else{
/*
            print '<pre>';
            print_r($result_dato_catalogo_cursos);
            print '</pre>';
            return;
            */
        }
?>     
    

    <div id="row">
            <div class="col-md-12">
            <div align="center">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Agregar Departamento</button>  
                     </div>
                     <table id="lista_cursos" class="table table-striped table-bordered" border="0">

                            <thead class="text-capitalize">
                                            <tr>
                                                <th># DEPA</th>
                                                <th>Nombre Departamento</th>
                                                <th>Actualizar</th>
                                                <th>Ver</th> 
                                                <th>Eliminar</th>

                                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result_depa as $key => $value) {
                            ?>
                            <tr>
                                <td><?=$value->getIdDepa();?></td>
                                <td><?=$value->getnombreDepa();?></td>
                            <td>
                            <button class='update btn btn-success btn-sm' id='update_<?= $value->getIdDepa() ?>' data-id='<?= $value->getIdDepa() ?>' >Actualizar</button>
                            </td>

                            <td>
                            <button class='ver btn btn-warning btn-sm' id='ver_<?= $value->getIdDepa() ?>' data-id='<?= $value->getIdDepa() ?>' >Ver</button></td>

                            <td>
                            <button class='delete btn btn-danger btn-sm' id='del_<?= $value->getIdDepa() ?>' data-id='<?= $value->getIdDepa() ?>' >Eliminar</button>
                            </td>

                            </tr>
                            <?php
                            }//cierre de foreach lista de personas
                            ?>
                            </tbody>                             

                            </table>                                      
            </div> 
    </div>
  
    </div><!-- end container-->
    <?php include "inclusiones/js_incluidos.php" ?>
    <script>
 $(document).ready(function() {
 

    if ($('#lista_cursos').length) {
        //$('#lista_cursos').DataTable();

$('#lista_cursos').DataTable( {
        
dom: 'Blfrtip',
        buttons: [{
            extend: 'excelHtml5',
                messageTop: 'Direccion De Ecología',
                text:"Exporta Excel",
                title:"Listado de cursos",
        },
        {
            /*'csvHtml5',*/
                extend: 'csvHtml5',
                text:"Exporta csv",
                title:"Listado de cursos",
                messageTop: 'Direccion De Ecología',
              },
                          {
                extend: 'pdfHtml5',
                title: 'Listado de cursos'
            }
        ],
    responsive: false,
    "language": {
    "search": "Filtro de Registros:",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
    "oPaginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
      }
  }  

    });

    }



$('#add').click(function(){
    alert("proceos de dar de alta create")  
      });


      $('#insert_form').on("submit", function(event,table){
          
      });
 

    $('#lista_cursos tbody').on('click', '.delete', function() {
       
    var el = this;
  
    // Delete id
    var deleteid = $(this).data('id');
    alert("borra el id:"+ deleteid);
});


$('#lista_cursos tbody').on('click', '.ver', function() {
    // ver id
    var curso_id = $(this).data('id');
    alert(curso_id);
    

});


/*updTAE*/
$('#lista_cursos tbody').on('click', '.update', function() {
    var curso_id = $(this).data('id');
    alert("debes actualizar el id:"+curso_id);
 
});// end function update

 });//ready function
 </script>    
</body>
</html>