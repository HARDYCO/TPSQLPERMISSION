<?php
session_start();
if (!empty($_SESSION['name']) && !empty($_SESSION['mdp'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=tp', $_SESSION['name'],$_SESSION['mdp']);
  $query = $bdd->prepare('select * from vue_commentaires ');
  $query->execute();
    foreach  ($query as $row) {
      echo $row['nom']." : ".$row['message']."<br>";
    }
    if (!empty($_POST['message'])){
      $name = $_SESSION['name'];
      $msg = htmlspecialchars($_POST['message']);
      $query ="INSERT INTO message VALUES(NULL,"."'"."$name"."'".",'"."$msg"."')";
        echo "$query";
      $query = $bdd->prepare($query);
      $query->execute();
    }
}
else{
header("Location: login.php");
}
?>


<br>
<br>
<form action="livredor.php" method="post">
  <input type="text" placeholder="message" name="message">
  <br>
  <input type="submit" value="post">
</form>
