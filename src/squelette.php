<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="../chart.js/dist/Chart.min.js"></script>
    <link rel="stylesheet" media="screen" type="text/css" href='style.css'>
    <!--
    <script type="text/javascript">

    </script>
-->
</head>
<body>
  <?php
    require_once('main.php');
   ?>
   <div id="topPage"></div>
  <div class="navBar">
	<nav>
      <ul>
        <li><a href="#topPage" id="siteName">GAFA Monitor</a></li>
        <li><a href="https://www.google.com/finance" title="Actualités Finance">Actualité</a></li>
        <li><a style="cursor:help;" onclick="displayAll()" title="Contacter l'auteur">Contact</a></li>
        <li><a id="identity">Quentin DEME</a></li>
        <li><a id="mail">demequentin97@gmail.com</a></li>
        <li><a id="mobile">07.82.08.46.42</a></li>
        <li style="float:right;"><a class="<?php echo $connexion ?>" onclick="document.getElementById('id01').style.display='block'"></i></a></li>
        <li style="float: right;"><?php echo $button ?></li>
        <li style="float:right;"><a><?php echo $prenom." ".$nom?></a></li>
      </ul>
	</nav>
</div>

<!-- Button to open the modal login form -->
<!-- The Modal -->
<div id="id01" class="modal">
<span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close">&times;</span>

<!-- Modal Content -->
<form class="modal-content animate" method="post">
<div class="imgcontainer">
  <img src="../Images/user.png" alt="Avatar" class="avatar">
</div>

<div class="container">
  <label for="uname"><b>Nom d'utilisateur</b></label>
  <input type="text" placeholder="Votre nom d'utilisateur" name="uname" required>

  <label for="psw"><b>Mot de passe</b></label>
  <input type="password" placeholder="Votre mot de passe" name="psw" required>

  <button type="submit" name="connection">Me connecter</button>
</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
  <span class="psw"><a href="register.php">Créer un compte</a></span>
</div>
</form>
</div>

	<div class="maincontainer">
    <div class="containerPar">
      <div class="paragraph">
        <h1>Vous avez dit GAFA ? </h1>
        <p>L'acronyme <a href="https://fr.wikipedia.org/wiki/GAFAM">GAFA</a> désigne quatre des entreprises les plus puissantes du monde de l'internet (et du monde tout court !) à savoir : <span class="gafa" id="googl">Google</span>, <span class="gafa" id="aapl">Apple</span>, <span class="gafa" id="fb">Facebook</span> et <span class="gafa" id="amzn">Amazon</span>.  Ces firmes possèdent un pouvoir économique et financier considérable (parfois supérieur à un Etat).<br/>
        Par exemple, en 2015, les GAFA pesaient 1 675 milliards de dollars contre 1 131 milliards de dollars pour toutes les entreprises françaises cotées au CAC 40.<br/>
        On peut s'étonner de l'absence de Microsoft de ce "groupe", c'est pour ça qu'on trouve parfois l'acronyme GAFAM dans lequel le M représente <span class="gafa" id="msft">Microsoft</span>.
        Ces GAFA représentent l’économie du début du XXIe siècle et incarnent le passage à l’ère du digital. </p>
      </div>
  <div class="BigParagraph">
    <h1>1 675 000 000 $</h1>
    <p>Ce que pesaient les GAFA en 2015</p>
    <h1>1 131 000 000 $</h1>
    <p>Ce que pesaient toutes les entreprises du CAC 40</p>
  </div>
  </div>
    <fieldset><legend>Graphique interactif du cours des GAFAM</legend>
      <canvas id="myChart" width="800" height="400"></canvas>
    </fieldset>
<div class="paragraph2">
  <div class="imageContainer">
    <!--Empty with background-->
</div>
<div class="paragraphContainer">
<h1>Les GAFA et les taxes.</h1>
La problématique avec les GAFA c’est qu’ils ne payent pas les impôts dans les pays où ils réalisent des affaires. Ces géants du numérique représentent un véritable défi pour les fiscalistes. Les règles de taxation des entreprises actuelles, conçues pour l'économie traditionnelle, sont fondées sur le principe « d'établissement permanent » : ne peuvent être taxées que les entreprises qui ont une présence physique dans un pays, mesurée par le montant des actifs (usines, machines), le nombre d'employés et le montant des ventes.
</p>
<p>
Or les entreprises du numérique peuvent offrir leurs services via le net en étant juridiquement installées dans le pays de leur choix. Evidemment un pays qui offre des facilités fiscales comme l’Irlande pour Google par exemple.
</p>
<p>
Pour faire face à cette situation, en mars 2018, la Commission européenne a proposé de taxer à 3% le chiffre d'affaires en ligne des grandes entreprises mondiales du numérique pour contrer leur tendance à l'optimisation fiscale. Cependant devant la difficulté à s’accorder au niveau européen, la France se dit prête à taxer seul les entreprises du GAFA dès 2019.<a href="http://www.lefigaro.fr/conjoncture/2018/12/17/20002-20181217ARTFIG00166-la-france-taxera-les-geants-du-numerique-a-partir-du-1er-janvier-2019.php">Affaire à suivre</a>
</p>
<p>
Depuis le 28 mai 2018, les entreprises sont soumises à la RGPD. Cette dernière impose à toutes les entreprises, donc également les GAFA,  des contraintes en matière de gestion de données personnelles, base de données... On peut aisément comprendre pourquoi les GAFA sont particulièrement impactés par ce texte. Voir définition de RGPD.
</p>
</div>
</div>
<hr>
<div class="ending">
<h1>Plus d'informations : </h1>
<div class="tableau">
<table>
  <tr>
    <td>&nbsp;</td>
    <td>Google</td>
    <td>Amazon</td>
    <td>Facebook</td>
    <td>Apple</td>
    <td>Microsoft</td>
  </tr>
  <tr>
    <td>Symbole</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Nom complet</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>CEO</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>industrie</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Site internet</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Decription</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>
</div>

  <hr>
  <div class="survey">
    <h1>Et vous, que pensez des GAFA(M) ?</h1>
    <form method="post">
      <h2>Votre avis nous intéresse !</h2>
      <p>Si vous le souhaitez, vous pouvez nous livrer votre avis sur le sujet des GAFAM.</p>
      <h3>Donnez votre avis sur le sujet :</h3>
      <textarea id="surveyField" name ="survey"></textarea>
      <button type="submit" name="sending">Donner mon opinion</button>
    </form>
  </div>

  </div>
	<script src="script.js"></script>
</body>
</html>
