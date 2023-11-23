<?php
include("../modelo/class_departamento_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_depa=new Departamento_dal;
      $result_depa=$metodos_depa->datos_por_id($id);

      
        $iddepa=$result_depa->getIdDepa();
        $nombredepa=utf8_encode($result_depa->getNombreDepa());
      

$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID Curso:</label></td>  
                     <td width="70%">'.$iddepa.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre Curso:</label></td>  
                     <td width="70%">'.$nombredepa.'</td>  
                </tr>  
           ';
      
      $output .= '  
           </table>  
      </div>  
      ';

       echo $output; 
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>