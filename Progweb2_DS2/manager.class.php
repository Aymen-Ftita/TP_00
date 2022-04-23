<?php

class manager{
    // private $_db;

    // public function __construct($db)
    // {
    //     $this->setDb($db);
    // }

    public function header()
    {
        return '<!doctype html>
        <html lang="en">
          <head>
            <title>Hello, world!</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
          </head>
          <body class="bg-info">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="../index.php">HOME</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="CRUD_Manager.php">Table<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create.php">Create a person</a>
              </li>
              
              
            </ul>
          </div>
        </nav>
        ';
    }

    public function delete() 
    {
      session_start();  
      $host = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "BD_Game";  
      $message = "";
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = $_GET['id'];
        $sql = 'DELETE FROM Joueur WHERE id=:id';
        $statement = $connect->prepare($sql);
        if ($statement->execute([':id' => $id])) 
        {
        header("Location:index.php");
        }


    }

    function create()
    {
        
      $host = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "BD_Game";  
      $message = "";
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['pass']) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = 'INSERT INTO Joueur(Pseudo, Email, Passw,nbrJ) VALUES(:name, :email , :pass,10)';
        $statement = $connect->prepare($sql);
        if ($statement->execute([':name' => $name, ':email' => $email , ':pass'=> $pass])) {
          $message = 'data inserted successfully';
        }
      } 
      return $message;
    } 
    
    public function update(joueur $p)
    {
      $host = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "BD_Game";  
      $message = "";
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare('UPDATE joueur SET nbrJ  = ? WHERE Pseudo = ?');
        $stmt->execute([$p->getnbrJ(),$p->getPseudo()]);
    }

    public function edit()
    {
      session_start();  
      $host = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "BD_Game";  
      $message = "";
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Joueur WHERE Id=:id';
        $statement = $connect->prepare($sql);
        $statement->execute([':id' => $id ]);
        $person = $statement->fetch(PDO::FETCH_OBJ);
        if (isset ($_POST['name'])  && isset($_POST['email']) ) 
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sql = 'UPDATE Joueur SET Pseudo=:name, Email=:email WHERE Id=:id';
            $statement = $connect->prepare($sql);
            if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
                header("Location:CRUD_Manager.php");
            }
        }
        return $person;
    }
        
    public function get ($name){
      $host = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "BD_Game";  
      $message = "";
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt =$connect->prepare('SELECT Id, Pseudo, nbrJ FROM joueur WHERE Pseudo = ?');
      $stmt->execute([$name]);
      while ($row = $stmt->fetch()) {
       return new joueur($row['Id'],$row['Pseudo'],$row['nbrJ']);
      }
      }   
        
}
