<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
     
</head>
<body>
    <div>
        <form action="login.php" method="POST">
            <h1>Iniciar sesión</h1>
            <label for="username">Username</label><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <br>
            <button type="submit" >Iniciar sesión</button>
            
        </form>
        <?php
            // Mostramos el mensaje de error si existe
            if (!empty($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
      
    </div>
</body>
</html>
