
<?php
include('connection.php');
$con = connection();

$id = $_GET['id']; // El id del post debe venir por GET

$sql = "DELETE FROM posts WHERE id = '$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("location: index.php");
}
?>