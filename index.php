<!doctype html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">

      <title>Formulario Simples</title>
  </head>

   <body>
      <?php require_once 'process.php'; ?>

      <?php if(isset($_SESSION['message'])): ?>
         <div class="alert alert-<?=$_SESSION['msg_type']?>">

         <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
         ?>
         </div>
      <?php endif ?>
      
      <header class="container">
         <h1>Cadastro de Pessoas</h1>
         <div class="container-fluid">
         <p>Cadastro simples de pessoa e localização</p>
         </div>
      </header>
      
      <div class="container">
         <?php
         $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
         $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
         ?>

         <div class="row justify-content-center">
            <table class="table">
               <thead>
                  <tr>
                  <th>Nome</th>
                  <th>Localização</th>
                  <th colspan="2">Action</th>
                  </tr>
               </thead>

               <?php while ($row = $result->fetch_assoc()): ?>
                  <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td>
                     <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
                     <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
                  </td>
                  </tr>
               <?php endwhile; ?>
            </table>
         </div>

         <?php
            function pre_r($array){
               echo '<pre>';
               print_r($array);
               echo '</pre>';
            }
         ?>
      </div>
      <div class="container">
         <div class="row justify-content-center">      
            <form action="process.php" method="POST" class="form">

               <input type="hidden" name="id" value="<?php echo $id; ?>">

               <div class="form-group col-md-auto">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" 
                  value="<?php echo $name; ?>" placeholder="Digite o seu nome">
               </div>

               <div class="form-group col-md-auto">
                  <label for="location">Localização</label>
                  <input type="text" class="form-control" id="location" name="location" 
                  value="<?php echo $location; ?>" placeholder="Digite a sua Localização">
               </div>

               <div class="form-group" style="text-align:center;">
                  <?php 
                     if ($update == true):
                  ?>
                     <button type="submit" name="update" class="btn btn-info">Alterar</button>
                     
                  <?php else: ?>
                     <button type="submit" name="save" class="btn btn-primary">Salvar</button>
                  <?php endif; ?>
               </div>

            </form>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
   </body>
</html>