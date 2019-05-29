
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
  <!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="/NXP_Home/index.php">NXP Home</a>

    </div>


    <!-- NAVIGATION BAR -->
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Les médias<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/NXP_Home/media/les_videos.php">Les vidéos</a></li>
            <li><a href="/NXP_Home/media/les_audios.php">Les audios</a></li>
            <li><a href="/NXP_Home/media/les_livres.php">Les livres</a></li>
          </ul>
        </li>
        <li><a href="/NXP_Home/media/ajout_media.php">Ajouter un média</a></li>
        

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/NXP_Home/contact.php">Contact</a></li>
        <li><a>|</a></li>
        <li><a href="/NXP_Home/inscription.php">Inscription</a></li><li><a href="/NXP_Home/connexion.php">Connexion</a></li>      </ul>

    </div>
  </div>
</nav>

  <div class="container-fluid">
    <div class="jumbotron">
      <div class="row">

        <h3>Vidéos</h3>

        <div class="tabbable">

          <div class="nav col-md-3" style="overflow-y:scroll; height:68vh">
            <a href="#exemple" class="list-group-item" data-toggle="tab">Exemple</a>

            <a href="#1" class="list-group-item" data-toggle="tab">test_titre_video</a>          </div>

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

            
            <div class="tab-pane" id="1">
              <h3>test_titre_video (test_titre_video_vo)</h3>
              Test résumé d'une vidéo.
              <br><br>
              <b><u>Langue</u> : </b>fr
              <br>
              <b><u>Durée</u> : </b>01:50:00
              <br>
              <b><u>Date de sortie française</u> : </b>2019-05-29
              <br>
              <b><u>Date de sortie originale</u> : </b>
              <br><br>
              <div class="input-group">
                <input type="text" id="url" class="form-control" placeholder="URL" name="url" required="false">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary" onclick="window.location.href = 'ajouter_a_mes_medias.php/?type=video&id=1&url=' + document.getElementById('url').value;">Ajouter à mes vidéos</button>
                </span>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</body>
</html>
