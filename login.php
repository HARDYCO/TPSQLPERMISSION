<?php
session_start();
if (!empty($_POST['name']) && !empty($_POST['password'])) {
  $name = htmlspecialchars($_POST['name']);
  $mdp = htmlspecialchars($_POST['password']);
  $bdd = new PDO('mysql:host=localhost;dbname=tp', 'root','');
  $query = $bdd->prepare('select * from utilisateurs where nom = '."'$name'");
  $query->execute();
  foreach  ($query as $row) {

    if ($mdp==$row['mdp']) {
        $_SESSION['name']=$row['nom'];
        $_SESSION['mdp']=$row['mdp'];
     echo "bienvenu ".$row['nom'];
     header("Location: Livredor.php");

    }
    else {
      echo "bad mdp";
    }

}

}

?>

<form action="login.php" method="post">
  <input type="text" placeholder="name" name="name">
  <input type="password" placeholder="password" name="password">
  <br>
  <input type="submit" value="connexion">
</form>
