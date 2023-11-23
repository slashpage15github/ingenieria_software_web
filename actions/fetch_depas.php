<?php
include("../modelo/class_departamento_dal.php");
if(isset($_POST['depa_id'])){
   $id=  $_POST['depa_id'];
   //echo $id;
      $output='';      
      $metodos_depa=new Departamento_dal;
      $result_depa=$metodos_depa->datos_por_id($id);
      //foreach ($result_cursos as $key => $value) {
        $arreglo=array(
        "IDdepa"=>$result_depa->getIdDepa(),
        "nombre_depa"=>$result_depa->getNombreDepa()
        );


//}
      $arreglo = array_map('utf8_encode',$arreglo);
      echo json_encode($arreglo,JSON_UNESCAPED_UNICODE);
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>