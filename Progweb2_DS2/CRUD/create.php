<?php

require "../manager.class.php";
$M = new manager();
echo $M->header();
$M->create();
$message=$M->create();
?>
<div class="container">
<div class="card mt-5">
  <div class="card-header">
    <h2>Create a person</h2>
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
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Create a person</button>
      </div>
    </form>
  </div>
</div>
</div>