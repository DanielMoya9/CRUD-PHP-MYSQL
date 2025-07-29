//MODIFICAR USUARIO

<?php
include('connection.php');

$con =connection();
$id=$_GET['id'];
$sql = "SELECT * FROM posts where id='$id'";
$query = mysqli_query($con ,$sql);
$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar posts</title>
</head>
<body>
    <div>
        <form action="edit_posts.php" method="POST">
            <h1>Editar posts</h1>
            <input type="hidden" name ="id" value="<?= $row['id'] ?>">
            <input type="text" name ="titulo"placeholder ="titulo" value="<?= $row['titulo'] ?>">
            <input type="text" name ="contenido" placeholder ="contenido" value="<?= $row['contenido'] ?>">
            
             <input type="submit" value="Actualizar posts"> 


        </form>
    </div>
</body>
</html>