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
    
    $("h4.modal-title").text("Agregado de Departamento");
            $('#insert').val("Insert");  
            $('#insert_form')[0].reset();   
      });


      $('#insert_form').on("submit", function(event,table){
        event.preventDefault();  
           if($('#f_depa').val() == '')  
           {  
            Swal.fire({
           type: 'warning',
           title: 'Error',
           text: 'Error:Nombre departamento es requerido'});  
           }  
           else  
           {  
                $.ajax({  
                     url:"actions/inserta_actualiza_depas.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){ 
                            if($('#depa_id').val() == ''){ 
                              $('#insert').val("Insertando");
                            }
                            else{
                              $('#insert').val("Actualizando");
                            }  
                     },     
                     success:function(data){ 
                            //alert(data); 
                          if (data=='ok'){
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');
                          
                          //bootbox.alert('correcto!');
                          Swal.fire({
                          title: "Registro de Departamento",
                          text: "¡Curso Ingresado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "lista_departamentos.php";
                          });

                      }
                          else{
                            Swal.fire({
                                    type: 'error',
                                    title: 'No se agregó correctamente departamento, vuelva a intentar.',
                        });
                          }  
                     }  
                });  
           }  
          
      });
 

    $('#lista_cursos tbody').on('click', '.delete', function() {
       
        var el = this;
  
  // Delete id
  var deleteid = $(this).data('id');

  // Confirm box
  bootbox.confirm("¿Deseas realmente borrar el registro?", function(result) {

     if(result){
       // AJAX Request
       $.ajax({
         url: 'actions/delete_depas.php',
         type: 'POST',
         data: { id:deleteid },
         success: function(response){
            //alert(response);
           // remueve el registro tambien del datatable
           if(response == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
              $(this).remove();
      });
       }else{
              //bootbox.alert('Registro No Fue Eliminado.');
              Swal.fire({
                                    type: 'error',
                                    title: 'Departamento No Fue Eliminado, vuelva a intentar.',
                        });
       }
         }
       });
     }

  });
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <legend class="text-center header">
                     <h4 class="modal-title">Detalles de Departamento</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </legend>  
                       
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>  
           </div>  
      </div>  
 </div>


<!-- modal para insertar y update -->
  <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
                <legend class="text-center header">
                     <h4 class="modal-title"></h4>
                     </legend>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                       
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Nombre de Departamento:</label>
                          <input type="text" name="f_depa" id="f_depa" class="form-control" />  
                          <br />  
                          <input type="hidden" name="depa_id" id="curso_id" readonly="true" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>