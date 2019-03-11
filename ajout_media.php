<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <title>Ajouter un media - NXP Home</title>


  </head>


  <body>
    <?php include("fix/navigation_bar.php"); ?>

    <div class="container">

      <div class="jumbotron">

        <h1 id="JQcolor">NXP Home</h1>
        <p>Ajouter un média</p>
        <p></p>


        <form method="post" action="ajout_media_submit.php">

          <div class="form-group">
            <label>Type de média : </label>
            <select class="form-control" name="media_type">
              <option value="0" selected>Type du média</option>
              <option value="1">Vidéo</option>
              <option value="2">Audio</option>
              <option value="3">Livre</option>
            </select>
          </div>
          

          <button type="submit" class="btn btn-primary">Suivant</button>

        </form>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

  </body>
</html>
