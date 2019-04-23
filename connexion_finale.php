<?php
include("chromephp-master/ChromePhp.php"); 
ChromePhp::log('Hello console!');

// Connexion à la BDD
try {
	ChromePhp::log("Connexion BDD");
	$bdd = new PDO('mysql:host=localhost;dbname=nxp_home;charset=utf8', 'root', '');
}
catch (Excpetion $e) {
	die("Erreur : " . $e -> getMessage());
}

ChromePhp::log("Recherche dans BDD");
$pseudo = $_POST["pseudo"];
$req = $bdd->prepare("SELECT idUtilisateur, identifiantUtilisateur, motDePasseUtilisateur FROM utilisateur WHERE identifiantUtilisateur = :pseudo");
$req->execute(array(
	"pseudo" => $pseudo));
$resultat = $req->fetch();

ChromePhp::log("Verifie correspondance mot de passe");
$isPasswordCorrect = password_verify($_POST["password"], $resultat["motDePasseUtilisateur"]);

if (!$resultat) {
	ChromePhp::warn("Pseudo ou mot de passe incorrect");
	include("_connexion_failed.php");
}
else {
	if ($isPasswordCorrect) {
		session_start();
		$_SESSION["id"] = $resultat["idUtilisateur"];
		$_SESSION["pseudo"] = $pseudo;
		ChromePhp::log("Connecté");
		ChromePhp::log($_SESSION);
		include("_connexion_successful.php");
	}
	else {
		ChromePhp::warn("Pseudo ou mot de passe incorrect");
		include("_connexion_failed.php");
	}
}
?>