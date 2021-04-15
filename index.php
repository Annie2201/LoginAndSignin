<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="text.css">
</head>
<body>
    
    <div class="signin">
    <h2>Inscrivez vous</h2>
    <form action="" method="POST">

        <input class="text" type="text" name="nom" placeholder="Nom" required>
 
        <input class="text" type="text" name="prenom" placeholder="Prénom" required>

        <input class="text" type="email" name="mail" placeholder="Mail" required>

        <input class="text" type="password" name="psw1" placeholder="Mot de passe" required>

        <input class="text" type="password" name="psw2" placeholder="Confirmez le mot de passe" required>

    <div class="test" style="margin-top: 143px;margin-left: -151px;">

        <input type="submit" name="envoi" class="first" style="background-color: rgba(0,0,0,0);
        border: 0px black;font-size: 50px; color: rgb(230, 0, 120);">

    </div>
    </form><br><br><br><br><br>
  <a href="login.php?msg=0" style="text-decoration: none;color: #e91e63; margin-left: 5px;"> Se connecter</a>
  </div> 

<?php


    $db = mysqli_connect("localhost","root","root","crud");
    class Personne 
    {
        public $id;
        public $nom;
        public $prenom;
        public $mail;
        public $mot_de_passe;
    
     public function __construct($id,$n,$p,$m,$psw)
    {
        $this->id=$id;
        $this->nom=$n;
        $this->prenom=$p;
        $this->mail=$m;
        $this->mot_de_passe=$psw;
    }
    }

    if (isset($_POST['mail'])){
        $email=$_POST['mail'];
    for ($i=1;$i<20;$i++)
    {
    $sql = "SELECT * FROM user WHERE id_user = ".$i;
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {    
        $id= $row ['id_user']; 
        $nom = $row ['nom'];
        $prenom = $row ['prenom'];
        $mail = $row['mail'];
        $mot_de_passe = $row ['mdp'];
        $pers=new Personne ($id,$nom,$prenom,$mail,$mot_de_passe);  
        if ($pers->mail == $email){
                header('Location:login.php?msg=1');
        }  
    }
    }
    }

    if (isset($_POST['envoi'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $psw2=$_POST['psw2'];
        $psw1=$_POST['psw1'];
        if($psw1==$psw2){
            $sql="INSERT INTO user (nom,prenom,mail,mdp) VALUES ('$nom','$prenom','$email','$psw2')";
            mysqli_query($db,$sql);
            header('Location:login.php?msg=2');
            }
        else{
            echo 'veuillez entrez le mêmemot de passe';
        }    
    }     
?>    
</body>
</html>