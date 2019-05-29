<?php
include("chromephp-master/ChromePhp.php"); 
ChromePhp::log('Hello console!');

// Connexion à la BDD
try {
	ChromePhp::log("Connexion BDD");
	$bdd = new PDO('mysql:host=localhost;dbname=nxp_home_2;charset=utf8', 'root', '');
}
catch (Excpetion $e) {
	die("Erreur : " . $e -> getMessage());
}

ChromePhp::log("Recherche dans BDD");
$pseudo = $_POST["pseudo"];

$req = $bdd->prepare("
	SELECT 
	id_utilisateur, 
	pseudo_utilisateur, 
	mdp_utilisateur, 
	adresse_mail_utilisateur,
	nom_utilisateur,
	prenom_utilisateur,
	ddn_utilisateur,
	adresse_utilisateur,
	code_postal_utilisateur,
	ville_utilisateur,
	sexe_utilisateur
	FROM utilisateur 
	WHERE 
	pseudo_utilisateur = :pseudo");

$req->execute(array(
	"pseudo" => $pseudo));
$resultat = $req->fetch();
ChromePhp::log($resultat);
ChromePhp::log("Verifie correspondance mot de passe");
$isPasswordCorrect = password_verify($_POST["password"], $resultat["mdp_utilisateur"]);

if (!$resultat) {
	ChromePhp::warn("Pseudo ou mot de passe incorrect");
	include("_connexion_failed.php");
}
else {
	if ($isPasswordCorrect) {
		session_start();

		$_SESSION["id"] = $resultat["id_utilisateur"];
		$_SESSION["pseudo"] = $pseudo;
		$_SESSION["email"] = $resultat["adresse_mail_utilisateur"];
		$_SESSION["nom"] = $resultat["nom_utilisateur"];
		$_SESSION["prenom"] = $resultat["prenom_utilisateur"];
		$_SESSION["ddn"] = $resultat["ddn_utilisateur"];
		$_SESSION["adresse"] = $resultat["adresse_utilisateur"];
		$_SESSION["code_postal"] = $resultat["code_postal_utilisateur"];
		$_SESSION["ville"] = $resultat["ville_utilisateur"];
		$_SESSION["civilite"] = $resultat["sexe_utilisateur"];

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