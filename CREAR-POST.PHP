<?php include("connection.php");
$con = connection(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <Style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }   
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            
        }
        form input[type="text"],
        form input[type="password"],
        form input[type="email"],
        form input[type="submit"],
        form select,        
        form textarea {
            width: 100%;
            padding: 10px;  
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        </Style>

</head>

<body>
    <form action="insert_post.php" method="POST">
        <h1>Crear post</h1>
        <select name="user_id" required>
            <option value="">Seleccione un usuario</option>
            <?php
            // Consulta para mostrar usuarios en el select
            $users = mysqli_query($con, "SELECT id, nombre FROM users");
            while ($u = mysqli_fetch_array($users)) {
                echo "<option value='{$u['id']}'>{$u['nombre']}</option>";
            }
            ?>
        </select>
        <input type="text" name="titulo" placeholder="Título del post" required>
        <textarea name="contenido" placeholder="Contenido" required></textarea>
        <input type="submit" class="btn-link" value="Agregar post">
        <br>
        <br>
        <br>
    </form>
</body>


</html>