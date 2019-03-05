<?php
include("chromephp-master/ChromePhp.php"); 
ChromePhp::log('Hello console!');
// Connexion à la BDD
try {
	ChromePhp::log("Connexion BDD");
	$bdd = new PDO('mysql:host=localhost;dbname=nxp_test;charset=utf8', 'root', '');
}
catch (Excpetion $e) {
	die("Erreur : " . $e -> getMessage());
}

// VARIABLES
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email = $_POST["email"];

$valide_pseudo = true;
$valide_email = true;


// VERIFICATION PASSWORD
if ($password != $confirm_password) {
	ChromePhp::warn("Password différent de confirm_password");
}


// VERIFICATION SI EXISTE DEJA
// Pseudo
ChromePhp::log("VERIFICATION PSEUDO");
$bdd_pseudo = $bdd -> query("SELECT pseudo FROM nxp WHERE pseudo LIKE '$pseudo'");
while($array_pseudo = $bdd_pseudo -> fetch()) {
	$valide_pseudo = false;
	ChromePhp::warn("Pseudo Existant");
}
if ($valide_pseudo == true) {
	ChromePhp::log("Pseudo Valide");
}
$bdd_pseudo -> closeCursor();
// -----


echo "<br>";


// Email
ChromePhp::log("VERIFICATION EMAIL");
$bdd_email = $bdd -> query("SELECT email FROM nxp WHERE email LIKE '$email'");
while($array_email = $bdd_email -> fetch()) {
	$valide_email = false;
	ChromePhp::warn("Email Existante");
}
if ($valide_email == true) {
	ChromePhp::log("Email Valide");
}
$bdd_email -> closeCursor();
// -----


if ($valide_pseudo == false OR $valide_email == false OR $password != $confirm_password) {
	ChromePhp::log("Affichage : PSEUDO ou EMAIL invalide");
	include("_exist_debut.php");
	if ($password != $confirm_password) {
		include("_password_diff.php");
	}
	if ($valide_pseudo == false) {
		include("_exist_pseudo.php");
	}
	if ($valide_email == false) {
		include("_exist_mail.php");
	}
	include("_exist_fin.php");
}


// 	AJOUT DANS LA BDD
if ($valide_pseudo == true AND $valide_email == true AND $password == $confirm_password) {
	ChromePhp::log("Ajout dans BDD");
	$req = $bdd -> prepare("INSERT INTO nxp(pseudo, password, email) VALUES(:pseudo, :password, :email)");

	$req -> execute(array(
	"pseudo" => $pseudo,
	"password" => password_hash($password, PASSWORD_DEFAULT),
	"email" => $email
	));
	ChromePhp::log("Affichage : Inscription validé");
	include("_valide.php");
}


?>

<!-- 
<p><?php echo $_POST["pseudo"]; ?></p>
-->
