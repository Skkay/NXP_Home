<?php
/*
echo($_GET["type"]."<br>");
echo($_GET["id"]."<br>");
echo($_GET["url"]."<br>");
*/

session_start();
include("../chromephp-master/ChromePhp.php"); 
ChromePhp::log('Hello console!');

// Connexion à la BDD
try {
	ChromePhp::log("Connexion BDD");
	$bdd = new PDO('mysql:host=localhost;dbname=nxp_home_2;charset=utf8', 'root', '');
}
catch (Excpetion $e) {
	die("Erreur : " . $e -> getMessage());
	ChromePhp::log("Connexion BDD : error");
}

// VARIABLES
$type = $_GET["type"];
$id = $_GET["id"];
$url = $_GET["url"];
$user_id = $_SESSION["id"];
$valide_id = true;

// VERIFICATION SI EXISTE DEJA
ChromePhp::log("VERIFICATION ID");
$bdd_id = $bdd->query("SELECT ".$type.".id_".$type." FROM ".$type.", ".$type."_utilisateur WHERE ".$type."_utilisateur.id_".$type." LIKE '$id' AND ".$type."_utilisateur.id_utilisateur LIKE '$user_id'");
ChromePhp::log($bdd_id);
while($array_id = $bdd_id->fetch()) {
	$valide_id = false;
	ChromePhp::log("ID Existant");
}
if ($valide_id == true) {
	ChromePhp::log("ID Valide");
}
$bdd_id->closeCursor();
// -----

// AJOUT DANS BDD
if ($valide_id == true) {
	ChromePhp::log("Ajout dans BDD");
	$req = $bdd->prepare("
		INSERT INTO ".$type."_utilisateur(
		id_utilisateur,
		id_".$type.",
		url_".$type.")
		VALUES(
		:id_utilisateur,
		:id_".$type.",
		:url_".$type.")"
	);
	ChromePhp::log($bdd->errorInfo());

	$req->execute(array(
		"id_utilisateur" => $user_id,
		"id_".$type."" => $id,
		"url_".$type."" => $url
	)) or die(print_r($req->reqInfo(), TRUE));
	ChromePhp::log("Ajout dans BDD réussi");

	echo "<script>window.location = '../les_".$type."s.php'</script>";
}
else {
	include("_ajout_media_failed.php");
}

//echo "<script>window.location = 'les_videos.php'</script>";
?>