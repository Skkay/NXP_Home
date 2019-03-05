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


$pseudo = $_POST["pseudo"];

$req = $bdd->prepare("SELECT id, password FROM nxp WHERE pseudo = :pseudo");
$req->execute(array(
	"pseudo" => $pseudo));
$resultat = req->fetch();

$isPasswordCorrect = password_verify($_POST["password"], $resultat["password"]);

if (!$resultat) {
	echo "Mauvais identifiant ou mdr";
}
else {
	if ($isPasswordCorrect) {
		session_start();
		$_SESSION["id"] = $resultat["id"];
		$_SESSION["pseudo"] = $pseudo;
		echo "Connecté";
	}
	else {
		echo 'Mauvais identifiant ou mot de passe !';
	}
}
?>