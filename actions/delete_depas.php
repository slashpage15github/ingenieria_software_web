<?php
include("../modelo/class_departamento_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
			$metodos_depa=new Departamento_dal;
			$cuantos=$metodos_depa->borra_departamento($id);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>