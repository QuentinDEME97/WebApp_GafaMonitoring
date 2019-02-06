<?php

include('../data/base.php');
$connexionState="";
$message="";
$error = "";
$registerMessage="";
$myTab = [];
$newTab=[];
$test=[];
$toAdd="";
$constraint="";
$nom="";
$prenom="";
$button="";
$connexion ="fas fa-user";

$styleAcc="''";
$stylePsw="''";

$messageAcc="";
$messagePsw="";


if(isset($_POST["connection"])){
	$keyID=inArray($_POST["uname"]); //Parcours les tableaux et si le login est dedant, renvoie sa clé.
	if($keyID>=0){
			 $hash = strval($comptes[$keyID]['password']);
			 if (password_verify($_POST['psw'], $hash)) {
					 $message="Connexion success";
					 $connexionState="<form method='POST'>".$comptes[$keyID]["name"]."<br/><button type='submit'>Disconnect</button></form>";
					 $connexion="fas fa-user-check";
					 $error="&#x2705;";
					 $prenom=$comptes[$keyID]['firstname'];
					 $nom=$comptes[$keyID]['lastname'];

					 $button="<form method='POST'><button id='deco' type>Déconnexion</button></form>";
			 }
	}else{
			 $message = "Invalid username or password";
			 $error ="&#10060;";
			 $connexion="fas fa-user-times";
	}
}else if(isset($_POST["creationcompte"])){
	$errorStyle="'box-shadow: 0 0 10px red'";
	$existKey = inArray($_POST["uname"]);
	if( $existKey >= 0 ){
		$messageAcc = "Ce nom d'utilisateur est déjà utilisé";
		$styleAcc=$errorStyle;
	}else{
		$styleAcc="";
		$messageAcc="";
		if($_POST['psw'] != $_POST['pswConfirm']){
			$messagePsw="La confirmation de votre mot de passe ne correspond pas";
			$stylePsw=$errorStyle;
		}else{
			$hash = password_hash($_POST['psw'], PASSWORD_BCRYPT);

			//Je crée le futur sous-tableau
			$newAccount = [[
				'firstname' => $_POST["firstname"],
				'lastname' => $_POST["lastname"],
				'login' => $_POST["uname"],
				'password' => $hash,
				'name' => $_POST["uname"],
				'status' => 'user',
			]];


			if('' == file_get_contents('../data/base.php')){
				$var_str = var_export($newAccount, true);
				$var = "<?php\n\n\$comptes = $var_str;\n\n?>";
				file_put_contents('../data/base.php', $var);
			}else{
				//J'ajoute aux compte déjà existant
				$newTab=array_merge($comptes, $newAccount);
				$var_str = var_export($newTab, true);
				$var = "<?php\n\n\$comptes = $var_str;\n\n?>";
				file_put_contents('../data/base.php', $var);
			}

			echo "<script type='text/javascript'>document.location.replace('squelette.php');</script>";

		}
	}
}

if(isset($_POST["sending"])){
	$texte="<p>\n".date("D M j G:i:s Y")."\n".$_POST['survey']."\n</p>\n";
	file_put_contents('../data/opinion.txt', $texte, FILE_APPEND | LOCK_EX);
}

function inArray($name){
          include('../data/base.php');
          foreach($comptes as $key => $results){
               if(strval($results['login'])==$name){
                    return $key;
               }
          }
          return -1;
     }
?>
