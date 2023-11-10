<!DOCTYPE html>
<html>
<head>
<?php 
//forma fácil reutilizando estrategoa de inclusión, pero cargas cosas de más 
//include_once "inclusiones/css_y_favicon.php";
//include_once "inclusiones/js_incluidos.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
?>
<!-- forma específica pero solo incluimos lo necesario para el backend --> 
<link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
<script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
</head>
</html>
<?php
    if ($_POST){
        $nombre=isset($_POST["f_nombre"]) ? $nombre=strtoupper($_POST["f_nombre"]) : $nombre=null;
        $email=isset($_POST["f_email"]) ? $email=strtoupper($_POST["f_email"]) : $email=null;
        $producto=isset($_POST["f_producto"]) ? $producto=strtoupper($_POST["f_producto"]) : $producto=null;
        $notifica=isset($_POST["f_notifica"]) ? $notifica=strtoupper($_POST["f_notifica"]) : $notifica='N';
        $departamento=isset($_POST["f_depa"]) ? $departamento=strtoupper($_POST["f_depa"]) : $departamento=null;
        $comentario=isset($_POST["f_desc"]) ? $comentario=strtoupper($_POST["f_desc"]) : $departamento=null;

        //echo $nombre.'-'.$email.'-'.$producto.'-'.$notifica.'-'.$departamento.'-'.$comentario;
        //inician validaciones de lado del servidor(backend)
        require_once '../php/funciones_php.php';
        $errores=array();

        if (!validaRequerido($nombre)){
			$errores[]='El campo Nombre llegó vacio';
		}
        
        if (!validaRequerido($email)){
			$errores[]='El campo Nombre llegó vacio';
		}

        if (!validaRequerido($producto)){
			$errores[]='El campo producto llegó vacio';
		}

        if (!validaRequerido($notifica)){
			$errores[]='El campo notifica llegó vacio';
		}

        if (!validaRequerido($departamento)){
			$errores[]='El campo departamento llegó vacio';
		}
        
        if (!validaRequerido($comentario)){
			$errores[]='El campo departamento llegó vacio';
		}

        if (!validaEmail($email)){
			$errores[]='El campo de correo no cumple formato adecuado';	
	    }

	    if (!validaSelecthtml($departamento)){
			$errores[]='No seleccionó un empresa';
	    }

        	///logica de insercion
        	if (!$errores){
                include("../modelo/class_problema_dal.php");
                $metodos_pro=new Problema_dal;
                $obj_problema= new Problema( null,$nombre,$email,$producto,$notifica,$departamento,$comentario,null);
                if ($metodos_pro->insertar_problematica($obj_problema)==1){
                    	//print "Aspirante Agregado Correctmente";
						print '<script>';
						print 'Swal.fire({
                          title: "Registro Problemática",
                          text: "¡Problematica Ingresado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "../index.php";
                          });';
						print '</script>';
                }
                else{//inserta problema
                    print '<script>';
                          print 'Swal.fire({
                          title: "Registro Problemática",
                          text: "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar",
                          type: "error"
                          }).then(function() {
                        window.location = "index.php";
                          });';
                      print '</script>';				
        }                
            }
            else{
                echo '<ul style="color:red;font-size:25px">';
                    foreach ($errores as $error):
                        echo '<li>'.$error.'</li>';
                    endforeach;
                echo '</ul>';			
            }//end errores
	
    }//end if post method
?>