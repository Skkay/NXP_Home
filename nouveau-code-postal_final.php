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
$code_postal = $_POST["code-postal"];

$req = $bdd->prepare("
	SELECT
	id_utilisateur,
	code_postal_utilisateur
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
	include("_nouveau-code-postal_failed.php");
}
else
{
	$req = $bdd->prepare("
		UPDATE utilisateur
		SET code_postal_utilisateur = :new_code_postal
		WHERE id_utilisateur = :id_user
	");
	ChromePhp::log($bdd->errorInfo());

	$req->execute(array(
		"new_code_postal" => $code_postal,
		"id_user" => $_SESSION["id"]
	));

	ChromePhp::log("Modification ok");
	$_SESSION["code_postal"] = $code_postal;
	echo "<script>window.location = 'profil.php'</script>";
}
	
?>