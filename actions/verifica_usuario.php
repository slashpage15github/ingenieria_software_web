<?php
session_start();
//$_SESSION['tmptxt'];
      
       //$_SESSION['usuario']="";
       if (isset($_POST['usuario']) && isset($_POST['contra'])){


            $usu=$_POST['usuario'];
            $contra=$_POST['contra'];
            include("../modelo/class_usuarios_dal.php");
            $obj_usuario=new usuarios_dal;

            $existe=$obj_usuario->verify_user($usu,$contra);
            //echo 'logn acciones:'.$existe.'-'.strlen($captcha);exit;
            if ($existe==1) {
                      //session_start();
                      $_SESSION['usuario']=$usu;
                      $_SESSION['tipou']=$obj_usuario->verify_usertipo($usu,$contra);
                      echo 'true';
            }
            else if ($existe!=1){
                print 'Error: Usuario o contraseña inválidos, vuelva a intentar';
                }
            else {
                print 'Error: Código de seguridad incorrecto, vuelva a intentar';
                }
    }
    else{
        print 'No pude recoger los datos del formulario(post), Error web page en login';
    }
?>