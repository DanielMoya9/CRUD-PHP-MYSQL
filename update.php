//MODIFICAR USUARIO

<?php
include('connection.php');

$con =connection();
$id=$_GET['id'];
$sql = "SELECT * FROM users where id='$id'";
$query = mysqli_query($con ,$sql);
$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ususario</title>
</head>
<body>
    <div>
        <form action="edit_user.php" method="POST">
            <h1>Editar usuario</h1>
            <input type="hidden" name ="id" value="<?= $row['id'] ?>">
            <input type="text" name ="nombre"placeholder ="nombre" value="<?= $row['nombre'] ?>">
            <input type="text" name ="apellido" placeholder ="Apellido" value="<?= $row['apellido'] ?>">
            <input type="text" name ="username" placeholder ="Username"value="<?= $row['username'] ?>">
            <input type="text" name ="password" placeholder ="password"value="<?= $row['password'] ?>">
            <input type="text" name ="email" placeholder ="email"value="<?= $row['email'] ?>">

             <input type="submit" value="Actualizar usuario"> 


        </form>
    </div>
</body>
</html>