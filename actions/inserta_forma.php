<?php
    if ($_POST){
        $nombre=isset($_POST["f_nombre"]) ? $nombre=strtoupper($_POST["f_nombre"]) : $nombre=null;
        $email=isset($_POST["f_email"]) ? $email=strtoupper($_POST["f_email"]) : $email=null;
        $producto=isset($_POST["f_producto"]) ? $producto=strtoupper($_POST["f_producto"]) : $producto=null;
        $notifica=isset($_POST["f_notifica"]) ? $notifica=strtoupper($_POST["f_notifica"]) : $notifica='N';
        $departamento=isset($_POST["f_depa"]) ? $departamento=strtoupper($_POST["f_depa"]) : $departamento=null;
        $comentario=isset($_POST["f_desc"]) ? $comentario=strtoupper($_POST["f_desc"]) : $departamento=null;

        echo $nombre.'-'.$email.'-'.$producto.'-'.$notifica.'-'.$departamento.'-'.$comentario;

    }

  
?>