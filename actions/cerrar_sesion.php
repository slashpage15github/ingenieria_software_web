<?php
session_start();
session_unset();//para eliminar las variables de sesion
session_destroy();//con esto destruyes la sesion 
header("Location: index.php");
?>