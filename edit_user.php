<?php

include('connection.php');
$con =connection();
$id = $_POST['id'];



$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$username = strtoupper($_POST['username']);
$password = strtoupper($_POST['password']);
$email =    strtoupper($_POST['email']);
$Rol= strtoupper($_POST['Rol']);
 // Agregar el campo Rol

$sql = "UPDATE  users SET  nombre='$nombre',apellido='$apellido',username='$username', password='$password',email='$email', Rol='$Rol'  WHERE id='$id'";
$query = mysqli_query($con ,$sql);

if($query){
    header("location: index.php");
};
?> 