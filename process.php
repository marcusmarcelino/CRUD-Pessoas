<?php
include_once("conexao.php");

session_start();

$id = 0;
$update = false;
$name = '';
$location = '';

if (isset($_POST['save'])){
   $name = $_POST['name'];
   $location=$_POST['location'];

   $sql = "INSERT INTO data (name,location) VALUES ('$name','$location')";
   $result = mysqli_query($conn, $sql);

   $_SESSION['message'] = "O dado foi salvo";
   $_SESSION['msg_type'] = "success";

   header("location: index.php");
}

if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   
   $sql = "DELETE FROM data WHERE id=$id";
   $result = mysqli_query($conn, $sql);

   $_SESSION['message'] = "O dado foi apagado";
   $_SESSION['msg_type'] = "danger";

   header("location: index.php");
}

if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
   if(isset($result->num_rows) && $result->num_rows > 0){
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $name = $row['name'];
      $location = $row['location'];
   }
}

if(isset($_POST['update'])){
   $id = $_POST['id'];
   $name = $_POST['name'];
   $location = $_POST['location'];

   $conn->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or
      die($conn->error);

   $_SESSION['message'] = "Update Realizado com sucesso!";
   $_SESSION['msg_type'] = "warning";

   header('location: index.php');
}

mysqli_close($conn);
?>

