
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="text.css">
</head>
<body>
<div class="login">

<?php 
    $db = mysqli_connect("localhost","root","root","crud");
    $test=$_GET['msg'];
    if ($test==3){
        echo "Identifiant incorrect! ";
    }
    if($test==1){
        echo 'Vous avez déjà un compte enregistré avec ce mail';
    }
    elseif($test==2){
        echo 'Inscription effectués avec un succès, connectez vous';
    }
    elseif ($test==0) {
        echo ' Connectez vous avec vos identifiants';
    }
    
?>

    <form action="" method="POST" class="plus">
        <input type="email" name="mail1" class="text" placeholder="Mail ou identifiant"><br>
        <input type="password" name="psw"  class="text" placeholder="Mot de passe"><br>
        <div class="test" style="margin-top: 50px;margin-left: -157px;">
        <input type="submit" name="connex" value="Connexion" class="first" style="background-color: rgba(0,0,0,0);
        border: 0px black;font-size: 50px; color: rgb(230, 0, 120);">
        </div>
    </form><br><br><br><br>
<?php
    if (isset($_POST['connex'])){
    $email=$_POST['mail1'];
        $psw=$_POST['psw'];
        $sql = "SELECT * FROM user";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) { 
            $name= $row['nom'];
            $firstname = $row['prenom'];  
            $mail = $row['mail'];        
            $mdp = $row['mdp'];
    
            if($psw == $mdp && $email == $mail){
            header("Location:home.php");
            session_start();
            $_SESSION['nom']=$name;
            $_SESSION['prenom']=$firstname;
            $_SESSION['mail']=$mail;
            $_SESSION['mdp']=$mdp;
            } /*else{ 
                header('Location:login.php?msg=3');
        }*/
    }    
    }
    ?>
    <h4>Vous n'avez pas de compte? <a href="index.php"> S'INSCRIRE</a></h4>
</div>  
</body>
</html>