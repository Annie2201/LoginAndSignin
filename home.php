<?php
session_start();
 if(!isset($_SESSION['nom'])){
    header('Location: index.php');    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome <?= $_SESSION['nom']?></h1>
    <form action="" method="post">
        <input type="submit" name="goOut" value="Déconnexion">
        <?php
            if(isset($_POST['goOut'])){
                session_destroy();
                header('Location: index.php');
            } 
        ?>
    </form>
</body>
</html>