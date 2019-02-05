<?php
// Connexion à la BDD
try {
	$bdd = new PDO('mysql:host=localhost;dbname=nxp_test;charset=utf8', 'root', '');
}
catch (Excpetion $e) {
	die("Erreur : " . $e -> getMessage());
}

// VARIABLES
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
$email = $_POST["email"];

$valide_pseudo = true;
$valide_email = true;

// VERIFICATION SI EXISTE DEJA
// Pseudo
$bdd_pseudo = $bdd -> query("SELECT pseudo FROM nxp WHERE pseudo LIKE '$pseudo'");
while($array_pseudo = $bdd_pseudo -> fetch()) {
	$valide_pseudo = false;
	echo $array_pseudo["pseudo"];
	echo " : pseudo existant";
}
if ($valide_pseudo == true) {
	echo $pseudo;
	echo " : pseudo valide";
}
$bdd_pseudo -> closeCursor();
// -----
echo "<br>";
// Email
$bdd_email = $bdd -> query("SELECT email FROM nxp WHERE email LIKE '$email'");
while($array_email = $bdd_email -> fetch()) {
	$valide_email = false;
	echo $array_email["email"];
	echo " : email existante";
}
if ($valide_email == true) {
	echo $email;
	echo " : email valide";
}
$bdd_email -> closeCursor();
// -----

// 	AJOUT DANS LA BDD
if ($valide_pseudo == true AND $valide_email == true) {
	$req = $bdd -> prepare("INSERT INTO nxp(pseudo, password, email) VALUES(:pseudo, :password, :email)");

	$req -> execute(array(
	"pseudo" => $pseudo,
	"password" => $password,
	"email" => $email
	));
	echo "<br><br>";
	echo "<strong>Ajouter</strong>";
}


?>

<!-- 
<p><?php echo $_POST["pseudo"]; ?></p>
-->
