<?php
// Motrar todos los errores de PHP
error_reporting(-1);

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
error_reporting(E_ALL);

// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);

   include('class_graficas.php');
   $ref=new graficas();
   $data=$ref->get_all_problematicas_departamento();
   echo '<pre>';
   //print_r($data);
   var_dump($data);
   echo '</pre>';
?>