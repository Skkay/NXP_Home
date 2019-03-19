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


</head>


<body>
  <?php include("../fix/navigation_bar.php"); ?>

  <div class="container">

    <div class="jumbotron">

      <h1 id="JQcolor">NXP Home</h1>
      <p>Ajouter un média</p>
      <p></p>


      <form method="get" action="">

        <div class="form-group">
          <label>Type de média : </label>
          <select class="form-control" name="media_type">
            <option value="0" <?php if (!empty($_GET) && $_GET["media_type"] == "0") {echo "selected"; } ?> >Type du média</option>
            <option value="1" <?php if (!empty($_GET) && $_GET["media_type"] == "1") {echo "selected"; } ?> >Vidéo</option>
            <option value="2" <?php if (!empty($_GET) && $_GET["media_type"] == "2") {echo "selected"; } ?> >Audio</option>
            <option value="3" <?php if (!empty($_GET) && $_GET["media_type"] == "3") {echo "selected"; } ?> >Livre</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Suivant</button>

      </form>

      <p><br></p>

      <!-- AJOUTER UNE VIDEO-->
      <?php if (!empty($_GET) && $_GET["media_type"] == "1"): ?>
        <p>Ajouter une vidéo :</p>

        <form method="post" action="">
          <div class="form-row">
            <label>Titre</label>
            <input type="text" class="form-control" placeholder="Tire de la vidéo" name="titre">

            <label>URL</label>
            <input type="text" class="form-control" placeholder="URL vers la vidéo" name="URL">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Suivant</button>
        </form>

      <!-- AJOUTER UN AUDIO-->
      <?php elseif (!empty($_GET) && $_GET["media_type"] == "2"): ?>
        <p>Ajouter un audio :</p>

          <form method="post" action="">
            <div class="form-row">
              <label>Titre</label>
              <input type="text" class="form-control" placeholder="Tire de l'audio" name="titre">

              <label>URL</label>
              <input type="text" class="form-control" placeholder="URL vers l'audio" name="URL">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Suivant</button>
          </form>

      <!-- AJOUTER UN LIVRE-->
      <?php elseif (!empty($_GET) && $_GET["media_type"] == "3"): ?>
        <p>Ajouter un livre :</p>

          <form method="post" action="">
            <div class="form-row">
              <label>Titre</label>
              <input type="text" class="form-control" placeholder="Tire du livre" name="titre">

              <label>URL</label>
              <input type="text" class="form-control" placeholder="URL vers le livre" name="URL">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Suivant</button>
          </form>

      <?php endif ?>

    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</body>
</html>
