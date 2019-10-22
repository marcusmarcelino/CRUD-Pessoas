<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($hostname,$user,$password,$database);

if (!$conn) {
   die("Falha na conexão" . mysqli_conect_error());
}
?>