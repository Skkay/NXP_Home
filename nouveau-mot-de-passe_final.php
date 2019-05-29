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
$old_mdp = $_POST["password"];
$new_mdp = $_POST["new_password"];
$confirm_new_mdp = $_POST["confirm_new_password"];

$req = $bdd->prepare("
	SELECT
	id_utilisateur,
	mdp_utilisateur
	FROM utilisateur
	WHERE
	id_utilisateur = :id_user
");

$req->execute(array(
	"id_user" => $_SESSION["id"]
));

$resultat = $req->fetch();
ChromePhp::log($resultat);

$isPasswordCorrect = password_verify($_POST["password"], $resultat["mdp_utilisateur"]);
//ChromePhp::log(password_hash($_POST["password"], PASSWORD_DEFAULT));
//ChromePhp::log($resultat["mdp_utilisateur"]);
ChromePhp::log("isPasswordCorrect : " . $isPasswordCorrect);

if (!$resultat) {
	include("_nouveau-mdp_failed.php");
}
else
{
	if ($isPasswordCorrect == true AND $new_mdp == $confirm_new_mdp)
	{
		$req = $bdd->prepare("
			UPDATE utilisateur
			SET mdp_utilisateur = :new_pass
			WHERE id_utilisateur = :id_user
		");
		ChromePhp::log($bdd->errorInfo());

		$req->execute(array(
			"new_pass" => password_hash($new_mdp, PASSWORD_DEFAULT),
			"id_user" => $_SESSION["id"]
		));

		ChromePhp::log("Modification ok");
		echo "<script>window.location = 'profil.php'</script>";

	}
	else
	{
		ChromePhp::log("Mot de passe incorrecte OU nouveau mdp / confirm mdp différent");
		include("_nouveau-mdp_failed.php");
	}
}
	
?>