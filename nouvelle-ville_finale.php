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
$ville = $_POST["ville"];

$req = $bdd->prepare("
	SELECT
	id_utilisateur,
	ville_utilisateur
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
	include("_nouvelle-ville_failed.php");
}
else
{
	$req = $bdd->prepare("
		UPDATE utilisateur
		SET ville_utilisateur = :new_ville
		WHERE id_utilisateur = :id_user
	");
	ChromePhp::log($bdd->errorInfo());

	$req->execute(array(
		"new_ville" => $ville,
		"id_user" => $_SESSION["id"]
	));

	ChromePhp::log("Modification ok");
	$_SESSION["ville"] = $ville;
	echo "<script>window.location = 'profil.php'</script>";
}
	
?>