<?php
session_start();
 //require("connect.php");
 require "manager.class.php";
 require "joueur.class.php";
 $dsn="mysql:dbname=".BASE.";host=".SERVER;
 try{
 $connexion=new PDO($dsn,USER,PASSWD);
 }
 catch(PDOException $e){
 printf("Échec de la connexion : %s\n", $e->getMessage());
 exit();
 }
 $p=$_SESSION['pseudo'];
 
 function affichenbrJ($c,$p){
    $sql= "SELECT * from joueur where pseudo='".$p."'" ;
    foreach ($c->query($sql) as $row)
    echo $row['nbrJ']."</br>\n";
 }
 
 $M=new Manager();
 $J1=$M->get($p);
 $msg=""; 

    if (isset($_POST['pari']) && isset($_POST['pair']) )
    {   if($_POST['pari']>$J1->getnbrJ() )
        {   $msg="Ne peut pas mettre cet nombre de Jeton , Il faut un nombre inferieur ou egale a <strong>".$J1->getnbrJ()."</strong>";  }
        else if(empty($_POST['pari'])  || $_POST['gh']=="0"){$msg="Ne laisse pas les champs vides , il faut les remplir !!";}
        else
           { $p2=$_POST['gh'];
            $J2=$M->get($p2);
        if($_POST['pari']%2 == 0)
        {

            $J1->setnbrJ($J1->getnbrJ()-$_POST['pari']);
            $J2->setnbrJ($J2->getnbrJ()+$_POST['pari']);
            $M->update($J1);
            $M->update($J2);
            echo "<h1><span>".$J2->getPseudo()." WIN this round <span> :(<h1>";
            // var_dump($J1);
            // var_dump($J2);

        }
        else{
            echo "<h1><span>".$J1->getPseudo()." WIN this round <span> ;)<h1>";
            $J1->setnbrJ($J1->getnbrJ()+$_POST['pari']);
            $J2->setnbrJ($J2->getnbrJ()-$_POST['pari']);
            $M->update($J1);
            $M->update($J2); 
        }}
    }


    if (isset($_POST['pari']) && isset($_POST['impair']))
    {   
        if($_POST['pari']>$J1->getnbrJ())
        {   $msg="Ne peut pas mettre cet nombre de Jeton , Il faut un nombre inferieur ou egale a <strong>".$J1->getnbrJ()."</strong>";  }
        else if(empty($_POST['pari'])  || $_POST['gh']=="0"){$msg="Ne laisse pas les champs vides , il faut les remplir !!";}
        else 
           {
        $p2=$_POST['gh'];
        $J2=$M->get($p2);
        if($_POST['pari']%2 == 0)
        {
            
                echo "<h1><span>".$J1->getPseudo()." WIN this round <span> ;)<h1>";
                $J1->setnbrJ($J1->getnbrJ()+$_POST['pari']);
                $J2->setnbrJ($J2->getnbrJ()-$_POST['pari']);
                $M->update($J1);
                $M->update($J2);
                // var_dump($J1);
                // var_dump($J2);
            
            

        }
        else{
            echo "<h1><span>".$J2->getPseudo()." WIN this round <span> :(<h1>";
            $J1->setnbrJ($J1->getnbrJ()-$_POST['pari']);
            $J2->setnbrJ($J2->getnbrJ()+$_POST['pari']);
            $M->update($J1);
            $M->update($J2); 
        }}
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-bootstrap.css">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url("back.png") ;
        width:auto;
        height: auto;
    }
    h1{
        color: #fff;
        text-align: center;
        font-size:50px;
        margin-top:30px;
    }
    h3{
        color: #fff;
        margin-top: 50px;
        margin-bottom: 30px;
        
    }
    .con{
        width: 100%;
        text-align: center;
    }
    span{
        color:#FC0FE6;
    }
    .btn{
        background-color: #FC0FE6;
    }
    .sel{
        width:500px;
        margin-left: 35%;
    }
    .w{
        width: 500px;
        margin-left: 35%;
        margin-top:100px;
    }
</style>
<body>
    <h1><?php echo "Welcom <span>". $J1->getPseudo()."</span>"; ?></h1>
    <h1><?php echo "Your Score : <span>". $J1->getnbrJ()."</span>";  ?></h1>
    <div class="col-6 con">
        <form method="post" >
            <h3>choose your enemy :</h3>
            
            <select class="form-select form-select-lg mb-3 sel" aria-label="Default select example" name="gh">
                <option value="0" selected>Choisir un Joueur</option>
            <?php
            $_SESSION['perso']=$_POST['perso'];
            // require ("joueur.class.php");
            // $j = new joueur(getId(),getPseudo());
                $sql = "SELECT Pseudo  FROM joueur" ;
                foreach ($connexion->query($sql) as $row) 
                echo "<option value=".$row['Pseudo'].">".$row['Pseudo'].$row['Id']."</option>";
            ?>   
            </select>
                
        

        
             
        
        <input type="number" name="pari">
        <input  type="submit" class="btn " name="pair" value="PAIR">
        <input  type="submit" class="btn " name="impair" value="IMPAIR">
        <?php if(!empty($msg)): ?>
        <div class="alert alert-danger w">
          <?php echo $msg; ?>
        </div>
        <?php endif; ?>
        <?php 
            if (isset($_POST['pari']) && isset($_POST['pair']) && empty($msg))
                {
                    if($J1->getnbrJ()<=0  )
                    {
                        echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";
                        echo "<h1><span>".$J2->getPseudo()." WIN the GAME <span> :)<h1>";
                        $J2->setnbrJ(10);
                        $M->update($J2);
                        $J1->setnbrJ(10);
                        $M->update($J1);}
                    else if($J2->getnbrJ()<=0)
                    {
                        echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";
                        echo "<h1><span>".$J1->getPseudo()." WIN the GAME <span> :)<h1>";
                        $J2->setnbrJ(10);
                        $M->update($J2);
                        $J1->setnbrJ(10);
                        $M->update($J1);
                    }
                    else{echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";}
                }
            if (isset($_POST['pari']) && isset($_POST['impair']) && empty($msg))
                {if($J1->getnbrJ()<=0  )
                    {
                        echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";
                        echo "<h1><span>".$J2->getPseudo()." WIN the GAME <span> :)<h1>";
                        $J2->setnbrJ(10);
                        $M->update($J2);
                        $J1->setnbrJ(10);
                        $M->update($J1);}
                    else if($J2->getnbrJ()<=0)
                    {
                        echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";
                        echo "<h1><span>".$J1->getPseudo()." WIN the GAME <span> :)<h1>";
                        $J2->setnbrJ(10);
                        $M->update($J2);
                        $J1->setnbrJ(10);
                        $M->update($J1);
                    }
                    else{echo "<h3> Le Score de ". $J2->getPseudo() . " est : ".$J2->getnbrJ()."</h3>";}
                }
        ?>
        </form>
        <?php   
                
            
        ?>
    </div>
    
    
    
    
</body>
</html>
