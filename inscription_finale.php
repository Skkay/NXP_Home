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
	ChromePhp::log("Connexion BDD : error");
}

// VARIABLES
$pseudo = $_POST["pseudo"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$ddn = $_POST["ddn"];
$civilite = $_POST["civilite"];
$adresse = $_POST["adresse"];
$ville = $_POST["ville"];
$code_postal = $_POST["code_postal"];

$valide_pseudo = true;
$valide_email = true;

// VERIFICATION PASSWORD
if ($password != $confirm_password) {
	ChromePhp::warn("Password différent de confirm_password");
}


// VERIFICATION SI EXISTE DEJA
// Pseudo
ChromePhp::log("VERIFICATION PSEUDO");
$bdd_pseudo = $bdd -> query("SELECT pseudo_utilisateur FROM utilisateur WHERE pseudo_utilisateur LIKE '$pseudo'");
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
$bdd_email = $bdd -> query("SELECT adresse_mail_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur LIKE '$email'");
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
	include("_inscription_failed_debut.php");
	if ($password != $confirm_password) {
		echo "<p>Le mot de passe ne correspond pas à la confirmation.</p>";
	}
	if ($valide_pseudo == false) {
		
		echo "<p>Pseudo déjà associé à un compte.</p>";
	}
	if ($valide_email == false) {
		
		echo "<p>Adresse mail déjà associé à un compte.</p>";
	}
	include("_inscription_failed_fin.php");
}


// 	AJOUT DANS LA BDD
if ($valide_pseudo == true AND $valide_email == true AND $password == $confirm_password) {
	ChromePhp::log("Ajout dans BDD");
	$req = $bdd->prepare("
		INSERT INTO utilisateur(
		nom_utilisateur, 
		prenom_utilisateur, 
		ddn_utilisateur, 
		mdp_utilisateur, 
		adresse_utilisateur, 
		pseudo_utilisateur, 
		code_postal_utilisateur, 
		ville_utilisateur, 
		sexe_utilisateur, 
		date_inscription_utilisateur, 
		adresse_mail_utilisateur) 
		VALUES(
		:nom, 
		:prenom, 
		:ddn, 
		:password, 
		:adresse, 
		:pseudo, 
		:code_postal, 
		:ville, 
		:civilite, 
		:dateInscription, 
		:email)"
	);
	ChromePhp::log($bdd->errorInfo());
	
	$req->execute(array(
		"nom" => $nom,
		"prenom" => $prenom,
		"ddn" => $ddn,
		"password" => password_hash($password, PASSWORD_DEFAULT),
		"adresse" => $adresse,
		"pseudo" => $pseudo,
		"code_postal" => $code_postal,
		"ville" => $ville,
		"civilite" => $civilite,
		"dateInscription" => date("Y-m-d"),
		"email" => $email
	));

	ChromePhp::log("Affichage : Inscription validé");
	include("_inscription_successful.php");
}

?>

<!-- 
<p><?php echo $_POST["pseudo"]; ?></p>
-->
