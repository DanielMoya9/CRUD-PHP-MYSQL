//ELIMINAR REGISTRO COMPLETO DE UN USUARIO
<?php
include('connection.php');

$con =connection();

$id=$_GET['id'];
$sql_posts = "DELETE FROM posts WHERE user_id = '$id'";
mysqli_query($con, $sql_posts);
$sql = "DELETE FROM users WHERE id ='$id'";
$query =mysqli_query($con,$sql);


if($query){
    header("location: index.php");
}



?>