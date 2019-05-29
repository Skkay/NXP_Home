<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">
    <link href="../../bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../navbar-fixed-top.css" rel="stylesheet">

    <title>Les vidéos - NXP Home</title>


  </head>


  <body>

    
    <div class="container">

      <div class="jumbotron">

        <h1 id="JQcolor">Erreur :</h1>
        <?php 
          if ($_GET["type"] == "video"):
            echo "<p>Cette vidéo est déjà dans <a href='#'>votre liste</a></p>";
          elseif ($_GET["type"] == "audio"):
            echo "<p>Cet audio est déjà dans <a href='#'>votre liste</a></p>";
          elseif ($_GET["type"] == "livre"):
            echo "<p>Ce livre est déjà dans <a href='#'>votre liste</a></p>";
          else:
            echo "<p>Erreur $_GET type</p>";
          endif;
        ?>
        <button onclick="back()" type="button" class="btn btn-primary btn-lg">Retour</button>
        
        <p></p>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script>
      function back() {
      window.history.back();
      }
    </script>

  </body>
</html>
