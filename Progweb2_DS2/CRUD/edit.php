<?php

require "../manager.class.php";
$M = new manager();
echo $M->header();
// session_start();  
// $host = "localhost";  
// $username = "root";  
// $password = "";  
// $database = "BD_Game";  
// $message = "";
//   $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
//   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $id = $_GET['id'];
//   $sql = 'SELECT * FROM Joueur WHERE Id=:id';
//   $statement = $connect->prepare($sql);
//   $statement->execute([':id' => $id ]);
//   $person = $statement->fetch(PDO::FETCH_OBJ);
//   if (isset ($_POST['name'])  && isset($_POST['email']) ) 
//   {
//       $name = $_POST['name'];
//       $email = $_POST['email'];
//       $sql = 'UPDATE Joueur SET Pseudo=:name, Email=:email WHERE Id=:id';
//       $statement = $connect->prepare($sql);
//       if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
//           header("Location:CRUD_Manager.php");
//       }
//   }
$edit=$M->edit();
 ?>
 <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $edit->Pseudo; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $edit->Email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>