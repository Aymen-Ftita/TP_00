<?php
require "../manager.class.php";
session_start();  
$host = "localhost";  
$username = "root";  
$password = "";  
$database = "BD_Game";  
$message = "";
$connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM Joueur';
$statement = $connect->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
$M = new manager();
 echo $M->header();
 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Tout les joueurs</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->Id; ?></td>
            <td><?= $person->Pseudo; ?></td>
            <td><?= $person->Email; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->Id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->Id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>

