<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
	<link href="../navbar-fixed-top.css" rel="stylesheet">

	<title>Ajouter un media - NXP Home</title>

	<script>
		function countChar(val) {
			var len = val.value.length;
			if (len >= 1001) {
				val.value = val.value.substring(0, 1001);
			} else {
				$('#charNum').text(1000 - len);
			}
		};

		function test() {
			alert("Hello! I am an alert box!");
		};
	</script>

</head>


<body>
	<?php include("../static/navigation_bar.php"); ?>

	<div class="container">

		<div class="jumbotron">

			<h1 id="JQcolor">NXP Home</h1>
			<p>Ajouter un média</p>
			<hr class="my-4">
			<p></p>


			<form id="form_type_media" method="get" action="">

				<div class="form-group">
					<label>Type de média : </label>
					<select class="form-control" name="media_type" onchange="form_type_media.submit();">
						<option value="0" <?php if (!empty($_GET) && $_GET["media_type"] == "0") {echo "selected"; } ?> >Type du média</option>
						<option value="1" <?php if (!empty($_GET) && $_GET["media_type"] == "1") {echo "selected"; } ?> >Vidéo</option>
						<option value="2" <?php if (!empty($_GET) && $_GET["media_type"] == "2") {echo "selected"; } ?> >Audio</option>
						<option value="3" <?php if (!empty($_GET) && $_GET["media_type"] == "3") {echo "selected"; } ?> >Livre</option>
					</select>
				</div>

				<!-- <button type="submit" class="btn btn-primary">Suivant</button> -->

			</form>

			<p><br></p>

			<!-- AJOUTER UNE VIDEO-->
			<?php if (!empty($_GET) && $_GET["media_type"] == "1"): ?>
				<p>Ajouter une vidéo :</p>

				<form method="post" action="">

					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Titre</label>
							<input type="text" class="form-control" placeholder="Tire de la vidéo" name="titre" required="true">
						</div>
						<div class="form-group col-md-4">
							<label>Titre Version Original</label>
							<input type="text" class="form-control" placeholder="Titre de la version original de la vidéo" name="titre_vo">
						</div>
						<div class="form-group col-md-2">
							<label>Langue</label>
							<!-- https://fr.m.wikipedia.org/wiki/Mod%C3%A8le:Code_langue -->
							<select class="form-control" name="lang">
								<option value="fr" selected="">Français</option>
								<option value="en">Anglais</option>
								<option value="de">Allemand</option>
								<option value="es">Espagnol</option>
							</select>            
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Date de sortie en France</label>
							<input type="date" class="form-control" placeholder="Date de sortie en France" name="date_fr">
						</div>
						<div class="form-group col-md-4">
							<label>Date de sortie original</label>
							<input type="date" class="form-control" placeholder="Date de sortie original" name="date_vo">
						</div>
						<div class="form-group col-md-2">
							<label>Durée</label>
							<input type="time" class="form-control" placeholder="Durée" name="duree">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label>Résumé</label>
							<textarea class="form-control vresize" placeholder="Résumé de la vidéo" rows="10" maxlength="1000" oninput="countChar(this)"></textarea>
							<!-- <small id="charNum" class="form-text text-muted">1000</small> -->
							<p id="charNum" class="text-right">1000</p>
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Suivant</button>						
				</form>

				<!-- AJOUTER UN AUDIO-->
				<?php elseif (!empty($_GET) && $_GET["media_type"] == "2"): ?>
					<p>Ajouter un audio :</p>

					<form id="form_ajout_audio" method="post" action="">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Titre</label>
								<input type="text" class="form-control" placeholder="Titre de l'audio" name="titre" required="true">
							</div>
							<div class="form-group col-md-4">
								<label>Date de sortie</label>
								<input type="date" class="form-control" placeholder="Date de sortie de l'audio" name="date">
							</div>
							<div class="form-group col-md-2">
								<label>Durée</label>
								<input type="time" class="form-control" placeholder="Durée" name="duree">
							</div>
						</div>
						<br>						
						<button type="submit" class="btn btn-primary">Suivant</button>
					</form>

					<!-- AJOUTER UN LIVRE-->
					<?php elseif (!empty($_GET) && $_GET["media_type"] == "3"): ?>
						<p>Ajouter un livre :</p>

						<form id="form_ajout_livre" method="post" action="">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Titre</label>
								<input type="text" class="form-control" placeholder="Titre du livre" name="titre" required="true">
							</div>
							<div class="form-group col-md-3">
								<label>Édition</label>
								<input type="text" class="form-control" placeholder="Édition du livre" name="edition">
							</div>
							<div class="form-group col-md-3">
								<label>Page</label>
								<input type="number" class="form-control" placeholder="Nombre de page" name="nb_page">
							</div>
						</div>
						<br>						
						<button type="submit" class="btn btn-primary">Suivant</button>
					</form>

					<?php endif ?>

				</div>

			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

		</body>
		</html>
