<?php
// obtenemos el id que es enviado desde el archivo index.php
$id=$_GET['id'];
include("conexion.php"); // mandamos a traer el archivo conexion.php

$sql="delete from alumnos where id='".$id."'"; //para poder eliminar un registro de la tabla
$resultado=mysqli_query($conexion,$sql); // donde se va enviar la variable conexion y sql

if($resultado){
    echo "<script language='JavaScript'>
    alert('Los datos se eliminaron correctamente de la BD');
    location.assign('index.php');
    </script>";
}else{
    echo "<script language='JavaScript'>
    alert('Los datos NO se eliminaron correctamente de la BD');
    location.assign('index.php');
    </script>";
}


?>