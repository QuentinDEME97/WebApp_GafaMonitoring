<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styleRegister.css">
  <script src="script.js"></script>
</head>
<body>
  <?php
  require_once('main.php');
   ?>
  <h1>Création de compte</h1>
  <form method="post">
    <div id="registerContainer">

      <label for="firstname"><b>Nom</b></label>
      <input type="text" <?php
                            if(isset($_POST['lastname'])){
                              echo "value='".$_POST['lastname']."'";
                            }else{
                              echo "placeholder='Votre nom'";
                            }
                          ?> name="lastname" required>

      <label for="lastname"><b>Prénom</b></label>
      <input type="text" <?php
                            if(isset($_POST['firstname'])){
                              echo "value='".$_POST['firstname']."'";
                            }else{
                              echo "placeholder='Votre prenom'";
                            }
                          ?> name="firstname" required>
      <label for="uname"><b>Nom d'utilisateur</b></label>
      <?php echo "<p>".$messageAcc."</p>" ?>
      <input type="text" <?php
                            if(isset($_POST['uname'])){
                              echo "value='".$_POST['uname']."'";
                            }else{
                              echo "placeholder='Votre nom d&#39;utilisateur'";
                            }
                          ?> name="uname" style=<?php echo $styleAcc ?> required>

      <label for="psw"><b>Mot de passe</b></label>
      <?php echo "<p>".$messagePsw."</p>" ?>
      <input type="password" placeholder="Votre mot de passe" name="psw" style=<?php echo $stylePsw ?> required>

      <label for="psw"><b>Confirmation de mot de passe</b></label>
      <input type="password" placeholder="Confirmer votre mot de passe" name="pswConfirm" style=<?php echo $stylePsw ?> required>

      <button type="submit" name="creationcompte">Créer mon compte</button>
    </div>
  </form>
</body>
</html>
