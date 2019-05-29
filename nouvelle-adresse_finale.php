<?php
session_start();

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

// VARIABLES
$adresse = $_POST["adresse"];

$req = $bdd->prepare("
	SELECT
	id_utilisateur,
	adresse_utilisateur
	FROM utilisateur
	WHERE
	id_utilisateur = :id_user
");

$req->execute(array(
	"id_user" => $_SESSION["id"]
));

$resultat = $req->fetch();
ChromePhp::log($resultat);


// UPDATE DATABASE
if (!$resultat) 
{
	include("_nouvelle-adresse_failed.php");
}
else
{
	$req = $bdd->prepare("
		UPDATE utilisateur
		SET adresse_utilisateur = :new_adresse
		WHERE id_utilisateur = :id_user
	");
	ChromePhp::log($bdd->errorInfo());

	$req->execute(array(
		"new_adresse" => $adresse,
		"id_user" => $_SESSION["id"]
	));

	ChromePhp::log("Modification ok");
	$_SESSION["adresse"] = $adresse;
	echo "<script>window.location = 'profil.php'</script>";
}
	
?>