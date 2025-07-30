<?php

include('connection.php');

$con =connection();

$id = $_POST['id'];
$titulo = strtoupper($_POST['titulo']);
$contenido = $_POST['contenido'];


$sql = "UPDATE  posts SET  titulo='$titulo',contenido='$contenido' WHERE id='$id'";
$query = mysqli_query($con ,$sql);

if($query){
    header("location: index.php");
};
?> 