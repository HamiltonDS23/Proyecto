<?php

   $conexion = mysqli_connect("localhost","root","","estudiantes");

   include 'conexion.php';
 if($conexion){
    echo 'Conectado';
 }else{
    echo 'No 68';
 }
 
?>

