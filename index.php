//INICIO DE LA PAGINA 

<?php
include('connection.php'); //INCLUIR LA FUNCION DE CONEXION 'CONECTION'

$con =connection();//VARIABLE QUE DEFINE LA FUNCION DE CONECTION
$sql = "SELECT * FROM users"; //TRAE TODA LA INFORMACION DE LOS USUARIOS DE LA BASE DE DATOS 

$query = mysqli_query($con ,$sql); //SOLICITUD A LA BASE DE DATOS PARA CREAR EL USUARIO

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS CRUD</title>
</head>
<body>
    <div>//DICCIONARIO 
        <form action="insert_user.php" method="POST">//FORMULARIO
            <h1>Crear usuario</h1>//SECCION DE LA PAG

        //CADA INPUT ES UN CAMPO NECESARIO PARA LA CREACION DE UN USUARIO 
            <input type="text" name ="nombre"placeholder ="nombre"> //PLACEHOLDER ES PARA INDICAR QUE DEBE IR EN CADA CAMPO 
            <input type="text" name ="apellido" placeholder ="Apellido">
            <input type="text" name ="username" placeholder ="Username">
            <input type="text" name ="password" placeholder ="password">
            <input type="text" name ="email" placeholder ="email">

             <input type="submit" value="Agregar usuario"> //BOTÓN PARA AGREGAR EL USUARIO



        </form>
    </div>
    <div>
        <h2>Usuarios registrados</h2>//SUBTITULO DE SECCION DE REGISTROS REALIZADOS 
        <table>
            <thead>
                <tr>
                    <TH>ID</TH> // TH : TITULOS DE CADA CAMPO
                    <th>nombre </th>
                    <th>apellido </th>
                    <th>username </th>
                    <th>password</th>
                    <th>email</th>
                    <TH></TH>
                    <TH></TH>
                </tr>
            </thead>
            <tbody>
                <?php  while($row= mysqli_fetch_array( $query)){; ?> //CICLO WHILE- ROW: REGISTRO O UNIDAD COMPLETA DE DATOS La función mysqli_fetch_array() toma el resultado de una consulta ($query) y devuelve una fila por vez
                <tr>

                    <th> <?= $row['id'] ?></th>
                    <th><?= $row['nombre'] ?></th>
                    <th><?= $row['apellido'] ?></th>
                    <th><?= $row['username'] ?></th>
                    <th><?= $row['password'] ?></th>
                    <th><?= $row['email'] ?></th>
                    
                    <th><a href="update.php?id= <?= $row['id'] ?>">EDITAR</a></th>         //BOTON EDITAR USUARIO--update.php LLAMA LA FUNCION 
                    <th><a href="delete_user.php?id= <?= $row['id'] ?>">ELIMINAR</a></th>  //BOTON ELIMINAR USUARIO -- delete_user.php LLAMA LA FUNCION
                </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>
</body>
</html>