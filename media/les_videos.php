<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="../../favicon.ico">
  <link href="../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
  <link href="../navbar-fixed-top.css" rel="stylesheet">

  <title>Les vidéos - NXP Home</title>

</head>


<body>
  <?php include("../static/navigation_bar.php"); ?>

  <div class="container-fluid">
    <div class="jumbotron">
      <div class="row">

        <h3>Vidéos</h3>

        <div class="tabbable">

          <div class="nav col-md-3" style="overflow-y:scroll; height:68vh">
            <a href="#exemple" class="list-group-item" data-toggle="tab">Exemple</a>

            <?php
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

            $bdd_videos = $bdd->query("SELECT id_video, titre_video FROM video ORDER BY titre_video");

            if ($bdd_videos->rowCount() > 0) {
              while($row = $bdd_videos->fetch()) {
                echo '<a href="#'.$row["id_video"].'" class="list-group-item" data-toggle="tab">'.$row["titre_video"].'</a>';
              }
            }
            else {
              echo "0";
            }
            $bdd_videos->closeCursor();
            ?>
          </div>

          <div class="jumbotron tab-content col-md-9" style="overflow-y:scroll; height:68vh; background-color:white">
            <div class="tab-pane" id="exemple">
            	<h3>Titre Video (Titre VO)</h3>
            	description
            	<br><br>
            	<b><u>Langue</u> : </b>fr
            	<br>
            	<b><u>Durée</u> : </b>00:00
            	<br>
            	<b><u>Date de sortie française</u> : </b>aaaa-mm-jj
            	<br>
            	<b><u>Date de sortie originale</u> : </b>aaaa-mm-jj
            	<br><br>
            	<button type="submit" class="btn btn-primary">Ajouter à mes vidéos</button>


            </div>

            <?php
            function seconds_to_hhmmss($seconds) {
              $t = round($seconds);
              return sprintf("%02d:%02d:%02d", ($t/3600),($t/60%60), $t%60);
            }

            $bdd_videos = $bdd->query("SELECT id_video, titre_video, titre_video_vo, resume_video, langue_video, duree_video, date_sortie_video, date_sortie_video_vo FROM video");

            if ($bdd_videos->rowCount() > 0) {
              while($row = $bdd_videos->fetch()) {

                $hhmmss = seconds_to_hhmmss($row["duree_video"]);

                echo '
                <div class="tab-pane" id="'.$row["id_video"].'">'
	                .'<h3>'.$row["titre_video"].' ('.$row["titre_video_vo"].') '.'</h3>'
	                .$row["resume_video"].'<br><br>'
	                .'<b><u>Langue</u> : </b>'.$row["langue_video"].'<br>'
	                .'<b><u>Durée</u> : </b>'.$hhmmss.'<br>'
	                .'<b><u>Date de sortie française</u> : </b>'.$row["date_sortie_video"].'<br>'
	                .'<b><u>Date de sortie originale</u> : </b>'.$row["date_sortie_video_vo"].'<br><br>'
	                //.'<button type="submit" class="btn btn-primary">Ajouter à mes vidéos</button>'
	                //.'<button type="submit" class="btn btn-primary" onclick="window.location.href = \'ajouter_a_mes_medias.php/?type=video&id='.$row["id_video"].'\';">Ajouter à mes vidéos</button>'
                  .'<div class="input-group">'
                    .'<input type="text" id="url_'.$row["id_video"].'" class="form-control" placeholder="URL" name="url" required="false">'
                    .'<span class="input-group-btn">'
                      .'<button type="submit" class="btn btn-primary" onclick="window.location.href = \'ajouter_a_mes_medias.php/?type=video&id='.$row["id_video"].'&url=\' + document.getElementById(\'url_'.$row["id_video"].'\').value;">Ajouter à mes vidéos</button>'
                    .'</span>'
                  .'</div>'
                .'</div>';
              }
            }
            else {
              echo "0";
            }
            $bdd_videos->closeCursor();
            ?>


          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</body>
</html>
