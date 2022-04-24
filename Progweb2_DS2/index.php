<?php  
 session_start(); 
 require("connect.php");
 require "manager.class.php";
$M = new manager();
$M->create();
 $dsn="mysql:dbname=".BASE.";host=".SERVER;
 try{
 $connexion=new PDO($dsn,USER,PASSWD);
 }
 catch(PDOException $e){
 printf("Échec de la connexion : %s\n", $e->getMessage());
 exit();
 } 
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "BD_Game";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["pseudo"]) || empty($_POST["pwd"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM joueur WHERE Pseudo = :pseudo AND Passw= :pwd";  
                $statement = $connect->prepare($query);  
                $sql= "SELECT * FROM joueur WHERE Pseudo =". $_POST["pseudo"];
                 $c=$connexion->query($sql);
                $statement->execute(  
                     array(  
                          'pseudo'     =>     $_POST["pseudo"],  
                          'pwd'     =>     $_POST["pwd"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                { 
                     if($_POST["pseudo"]=="Admin"){
                         header("location:CRUD/CRUD_Manager.php");
                     }
                     else{ 
                     $_SESSION["pseudo"] = $_POST["pseudo"];
                     header("location:jeux.php"); } 
                }  
                else  
                {  
                     $message = 'Wrong Data';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Game peer no peer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />    
</head>
<style>
    body{
        background-image: url("back.png");
    }
    .he{
      background-color:#750B99 ;
    }
    h1{
      font-size:50px;S
    }
    h3{
      color:#fff;
      font-size:35px;
      text-align:center;
    }
    label{
      color:#fff;
      font-size:18px;
    }
    span{
      text-align:center;
      color:#FC0FE6;
    }
    .spa{
      color:#3A094B;
    }
</style>
<body>

<div class="container-fluid p-1 he text-white text-center">
  <h1><span>P</span>eer <span class="spa">NO</span> <span>P</span>eer</h1>
  <p>WELCOM TO OUR GAME !!!</p> 
</div>

<div class="container col-sm-6 ">
  <div class=" mt-5">
    <div class="card-header">
      <h3>Create a person</h3>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?php echo $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Pseudo (Affichable pendant le jeux)</label>
          <input type="text" name="name" id="nameI" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="emailI" class="form-control">
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password" name="pass" id="passI" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info" onclick="clkhere2()">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
   <div class="container col-sm-6 mt-5" >
    <div class="card-header">
      <h3 >Login </h3> <span>and start NOW !</span> <br /> 
    </div> 
      <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>   
                  <form method="post" >  
                      <label>Pseudo</label>  
                      <input type="text" name="pseudo" class="form-control" />  
                      <br />  
                      <label>Password</label>  
                      <input type="password" name="pwd" class="form-control" />  
                      <br />  
                      <input type="submit" name="login" class="btn btn-info" value="Login" onclick="clkhere1()" />  
                  </form>  

    </div>
    
  </div>
</div>
<script  type="text/javascript">
  function clkhere1()
 {
     let name=document.getElementById("pseudo").value;
     let pass=document.getElementById("pass").value;

     if(!name || !pass){alert('Il y a quelque champ est vide , remplir tout les données')}
     if(pass<8){alert('Le mot de passe doit etre au moin 8 caractère ')}
    
 }
</script>
</body>
</html>
