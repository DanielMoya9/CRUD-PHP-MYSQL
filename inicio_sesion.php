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
            <input type="submit" value="Iniciar sesión">
            
        </form>
         
<?php
$query =(isset($_POST['username']) && isset($_POST['password'])) ? "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'" : '';
if ($query) {
    include('connection.php');
    $con = connection();
    $result = mysqli_query($con, $query);
}

if($query){
    header("location: index.php");}
?>
  
    </div>
</body>
</html>