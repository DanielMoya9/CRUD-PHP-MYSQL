
<?php
include('connection.php');
$con = connection();

$user_id = $_POST['user_id'];
$titulo = strtoupper($_POST['titulo']);
$contenido = $_POST['contenido'];

$sql = "INSERT INTO posts (user_id, titulo, contenido) VALUES ('$user_id', '$titulo', '$contenido')";
$query = mysqli_query($con, $sql);


header("Location: index.php");
?>
