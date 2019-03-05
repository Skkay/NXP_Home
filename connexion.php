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
    <link href="style_form.css" rel="stylesheet">

    <title>Connexion - NXP Home</title>


  </head>


  <body>

    <?php include("fix/navigation_bar.php"); ?>

    <div class="container">

      <div class="jumbotron">
        <h1 id="JQcolor">Connexion</h1>
        <p>Médiathèque en ligne</p>

        <form method="post" action="connexion_final.php">

          <div>
            <label>Pseudo : </label>
            <input type="text" name="pseudo"/>
            <p></p>
          </div>

          <div>
            <label>Mot de passe : </label>
            <input type="password" name="password"/>
            <p></p>
          </div>

          <input type="submit" value="Valider"/>

        </form>

      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

  </body>
</html>
