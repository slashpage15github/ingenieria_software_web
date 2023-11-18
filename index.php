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
    <link rel='stylesheet' type='text/css' media='screen' href='css/miestilo.css'>
    <script src='js/validaciones.js'></script>
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
    <div class='container' style="margin-top: 20px !important;">
        <h1>Fomulario de Problemáticas</h1>
        <p>Todos los campos son obligatorios</p>
    <form name="forma" action="actions/inserta_forma.php" method="post" onsubmit="return valida_forma(); ">
        
        <div id="row">
            <div id="col-25">
                <label id="lbl">Nombre:</label>
            </div>
            <div id="col-75">
                <input class="mayusculas" type="text" id="f_nombre" name="f_nombre" placeholder="Ingrese nombre"/>    
            </div> 
        </div>
        <div id="row">
            <div id="col-25">
                <label id="lbl">Email:</label>
            </div>
            <div id="col-75">
                <input type="email" id="f_email" name="f_email" placeholder="Ingrese email"/>    
            </div> 
        </div>
        <div id="row">
            <div id="col-25">
                <label id="lbl">Producto:</label>
            </div>
            <div id="col-75">
            <label id="l_prod">Adobe ColdFusion</label>    
            <input type="radio" id="f_producto" name="f_producto" value="ColdFusion"/>
            <label id="l_prod">Adobe Flash</label>
            <input type="radio" id="f_producto" name="f_producto" value="Flash"/>
            </div> 
        </div>
        <div id="row">
            <div id="col-75">
                <input type="checkbox" id="f_notifica" name="f_notifica" value="Y"/>
                <label id="l_prod">Notificarme actualizaciones por email</label>    
            </div> 
        </div>
        <div id="row">
        <?php
            include('modelo/class_departamento_dal.php');
            $obj_lista_depa= new Departamento_dal;
            $result_depa=$obj_lista_depa->obtener_lista_departamento();
            /*echo '<pre>';
            print_r($result_depa);
            echo '</pre>';
            exit; */
            if ($result_depa==NULL){
                    echo '<h2>No se encontraron empresas</h2>';
            }
            else{
?>        
                    
            <div id="col-25">
                <label id="lbl">Departamento Solicitud:</label>
            </div>
            <div id="col-75">
                <select id="f_depa" name="f_depa">
                <option value="0">Seleccione:</option>
                <?php
foreach ($result_depa as $key => $value){									
?>
	            <option value="<?=$value->getIdDepa(); ?>"><?=$value->getNombreDepa(); ?></option>
<?php } ?>                
                </select>
            </div>
<?php } ?>             
        </div>
        <div id="row">
        <div id="col-25">
                <label id="lbl">Observaciones:</label>
            </div>
            <div id="col-75">
                <textarea id="f_desc" name="f_desc" rows="5" cols="50" placeholder="Coméntenos su problemática"></textarea>
            </div>
        </div>
        <div id="row2">
            <input type="submit" class="boton" id="f_guarda" value="guardar">
        </div>
    </form>
    </div><!-- end container-->
    <?php include "inclusiones/js_incluidos.php" ?>
</body>
</html>