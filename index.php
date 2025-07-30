<?php //INICIO DE LA PAGINA ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include('connection.php');
$con = connection();

// Consulta con LEFT JOIN para obtener usuarios y sus posts
$sql = "SELECT users.id AS user_id, users.nombre, users.apellido, users.username, users.password, users.email,users.Rol, posts.id AS post_id, posts.titulo, posts.contenido
        FROM users
        LEFT JOIN posts ON users.id = posts.user_id";


$query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS CRUD</title>
<head>   
<body>
    <div><?php //DICCIONARIO ?>
        <form action="insert_user.php" method="POST"> <?php //FORMULARIO?>
            <h1>Crear usuario</h1><?php //SECCION DE LA PAG?>
    
        <?php //CADA INPUT ES UN CAMPO NECESARIO PARA LA CREACION DE UN USUARIO ?>
            <input type="text" name ="nombre"placeholder ="nombre" required><?php  //PLACEHOLDER ES PARA INDICAR QUE DEBE IR EN CADA CAMPO?> 
            <input type="text" name ="apellido" placeholder ="Apellido" required>
            <input type="text" name ="username" placeholder ="Username"required>
            <input type="password" name ="password" placeholder ="contraseña" required>
            <input type="password" name="confirm_password" placeholder ="Confirma contraseña" required>
            <?php
            if (isset($_GET['error']) && $_GET['error'] === 'contraseñas_no_coinciden') {
                echo "<p style='color:red;'>Las contraseñas no coinciden.</p>";
            }
            ?>
            <input type="text" name ="email" placeholder ="email" required >
            <input type="text" name ="Rol" placeholder ="Rol" required><?php //CAMPO PARA Rol DEL USUARIO?>
            
            <input type="submit" value="Agregar usuario"><?php  //BOTÓN PARA AGREGAR EL USUARIO?>
                <?php
                if (isset($_GET['error']) && $_GET['error'] === 'campos_vacios') {
                        echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";}?>

            <br>
            <br>
             <a href="usuarios.php">Ver usuarios registrados</a>           
        </form>
    </div>
    <div>
    <DIv>
        <form action="insert_post.php" method="POST">
    <h1>Crear post</h1>
    <select name="user_id">
        <option value="">Seleccione</option><?php //BOTON DE "SELECCIONE EN EL POST?>"
        <?php
        // Consulta para mostrar usuarios en el select
        $users = mysqli_query($con, "SELECT id, nombre FROM users");
        while($u = mysqli_fetch_array($users)) {
            echo "<option value='{$u['id']}'>{$u['nombre']}</option>";
        }
        ?>
    </select>
    <input type="text" name="titulo" placeholder="Título del post" required>
    <textarea name="contenido" placeholder="Contenido" required></textarea>
    <input type="submit" value="Agregar post">
    <br>
    <br>
    <br>
        </form>
    
            </tbody>
            
        </table>

    </div>
</body>
</html>