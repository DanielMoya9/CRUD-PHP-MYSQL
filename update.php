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
            <br>
            
            <input type="hidden" name ="id" value="<?= $row['id'] ?>"><br>
            <label for="nombre">Nombre</label><br>
            <input type="text" name ="nombre" placeholder ="nombre" value="<?= $row['nombre'] ?>"><br>
            <label for="apellido">Apellido</label><br>
            <input type="text" name ="apellido" placeholder ="Apellido" value="<?= $row['apellido'] ?>"><br>
            <label for="username">Username</label><br>
            <input type="text" name ="username" placeholder ="Username" value="<?= $row['username'] ?>"><br>
            <label for="password">Password</label><br>
            <input type="text" name ="password" placeholder ="password" value="<?= $row['password'] ?>"><br>
            <label for="email">Email</label><br>
            <input type="text" name ="email" placeholder ="email" value="<?= $row['email'] ?>"><br>
            <label for="telefono">Telefono</label><br>
            <input type="text" name ="telefono" placeholder ="telefono" value="<?= $row['telefono'] ?>"><br>
            
            <label for="rol">Rol</label><br>

            <input type="text" name="Rol" placeholder="Rol" value="<?= $row['Rol'] ?>"><br>
            <br>
            <br>
            <input type="submit" value="Actualizar usuario"> 

        </form>
    </div>
</body>
</html>

