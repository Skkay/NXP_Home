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
$pseudo = $_POST["pseudo"];
$valide_pseudo = true;

$req = $bdd->prepare("
	SELECT
	id_utilisateur,
	pseudo_utilisateur
	FROM utilisateur
	WHERE
	id_utilisateur = :id_user
");

$req->execute(array(
	"id_user" => $_SESSION["id"]
));

$resultat = $req->fetch();
ChromePhp::log($resultat);

// VERIFICATION SI EXISTE DEJA :
// Pseudo
ChromePhp::log("VERIFICATION PSEUDO");
$bdd_pseudo = $bdd -> query("SELECT pseudo_utilisateur FROM utilisateur WHERE pseudo_utilisateur LIKE '$pseudo'");
while($array_pseudo = $bdd_pseudo -> fetch()) {
	$valide_pseudo = false;
	ChromePhp::warn("Pseudo existant");
}
if ($valide_pseudo == true) {
	ChromePhp::log("Pseudo valide");
}
$bdd_pseudo -> closeCursor();
// -----

// UPDATE DATABASE
if (!$resultat) 
{
	include("_nouveau-pseudo_failed.php");
}
else
{
	if ($valide_pseudo == true) 
	{
		$req = $bdd->prepare("
			UPDATE utilisateur
			SET pseudo_utilisateur = :new_pseudo
			WHERE id_utilisateur = :id_user
		");
		ChromePhp::log($bdd->errorInfo());

		$req->execute(array(
			"new_pseudo" => $pseudo,
			"id_user" => $_SESSION["id"]
		));

		ChromePhp::log("Modification ok");
		$_SESSION["pseudo"] = $pseudo;
		echo "<script>window.location = 'profil.php'</script>";
	}
	else
	{
		include("_nouveau-pseudo_failed.php");
	}
}
	
?>