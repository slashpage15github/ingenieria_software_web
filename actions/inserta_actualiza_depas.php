<?php
if (!empty($_POST)){
	require_once '../php/funciones_php.php';
	include("../modelo/class_departamento_dal.php");
	$metodos_depa=new Departamento_dal;

	if (isset($_POST['depa_id'])){
		$curso_id=strtoupper($_POST['depa_id']);
	}else{
		$curso_id=null;
		echo "no llego dato de depa Id";
		exit;
	}

	if (isset($_POST['f_depa'])){
		$nombre_curso=strtoupper($_POST['f_depa']);
	}else{
		$nombre_curso=null;
		echo "no llego dato de nombre depa";
		exit;
	}

	$errores=array();
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		if (!validaRequerido($nombre_curso)){
			$errores[]="El campo de nombre de departamento esta vacio";
		}

		if (!$errores){
			$obj_depa=new Departamento($curso_id,$nombre_curso);
			if ($curso_id==''){

				if($metodos_depa->inserta_departamento($obj_depa)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para ingresar el depa, intente nuevamente";
				}

			}else{
				if($metodos_cursos->actualizar_curso($obj_curso)=="1"){
					echo 'ok';
				}
				else{
					print "Ocurrio un error para actualizar el depa, intente nuevamente";
				}
			}





		}else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
		}



	}
	else{
		print "no ocurrio el request method";
	}


}
else{
	echo 'Error de post, los datos no llegaron correctamente ';
}

?>