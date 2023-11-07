<?php 

function msg($title,$text,$type){
                        print "<script>";
                            print "Swal.fire({
                                title: '$title',
                                text: '$text',
                                type: '$type'
                                }).then(function() {
                                window.location = 'aspirantes.php';
                                });";
                          print "</script>";
}

 function validaRequerido($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }

 

 function validarEntero($valor){
    $min=1;
    $max=2147483647;
    /*esta funcion es para rango de numero  y segun la doc de php el max es hasta donde alcanza*/
    if(filter_var($valor, FILTER_VALIDATE_INT, array("options"=>
    array("min_range"=>$min, "max_range"=>$max))) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 

 function validarNumerico($valor){
    if (!ctype_digit($valor)) {
    return false;
    }
    else{
      return true;
    }
 }

 

function validaEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 

function validaSelecthtml($valor){
    if ($valor=='0'){
      return false;
    }
    else{
      return true;
    }
}
?>