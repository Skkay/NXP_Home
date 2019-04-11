
<?php
session_start();
?>
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

      <a class="navbar-brand" href="#">NXP Home</a>

    </div>


    <!-- NAVIGATION BAR -->
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav">
        <li><a href="/NXP_Home/index.php">Accueil</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="/NXP_Home/media/ajout_media.php">Ajouter un nouveau média</a></li>
            <li><a href="/NXP_Home/media/les_videos.php">Les vidéos</a></li>
          </ul>

        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
          echo "<li><a href=\"#\">" . $_SESSION['pseudo'] . "</a></li>";
          echo "<li><a href=\"/NXP_Home/deconnexion.php\">Deconnexion</a></li>";
        }
        else 
        {
          echo "<li><a href=\"/NXP_Home/inscription.php\">Inscription</a></li>";
          echo "<li><a href=\"/NXP_Home/connexion.php\">Connexion</a></li>";
        }
        ?>
      </ul>

    </div>
  </div>
</nav>
