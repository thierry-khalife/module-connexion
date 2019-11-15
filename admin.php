<?php

session_start();
$cnx = mysqli_connect("localhost", "root", "", "moduleconnexion");
$requete1 = "SELECT * FROM utilisateurs";
$query1 = mysqli_query($cnx, $requete1);
$resultat = mysqli_fetch_all($query1, MYSQLI_ASSOC);
mysqli_close($cnx);

?>

<!DOCTYPE html>

<html>

<head>
  <title>.::TMG CNX::.</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <header>
    <nav class="nav">
      <section class="undernav">
        <a href="inscription.php"><img src="img/inscription.png"></a>
        <a href="inscription.php">INSCRIPTION</a>
      </section>
      <section class="undernav">
        <a href="connexion.php"><img src="img/connexion.png"></a>
        <a href="connexion.php">CONNEXION</a>
      </section>
    </nav>
    <article id="logo">
      <a href="index.php"><img src="img/logo.png"></a>
      <a href="index.php">TMG CNX</a>
    </article>
    <nav class="nav">
      <section class="undernav">
        <a href="admin.php"><img src="img/admin.png"></a>
        <a href="admin.php">ADMIN PANEL</a>
      </section>
      <section class="undernav">
        <a href="profil.php"><img src="img/profil.png"></a>
        <a href="profil.php">USER PROFIL</a>
      </section>
    </nav>
  </header>

  <main>
    <section class="leftsidebar">
      <img src="img/admin.png"></br>

      <?php

      $i = 0;
      if (!empty($_SESSION['login'])) 
      {
        if ($_SESSION['login'] == "admin") 
        {
          echo "<table border>";
          echo "<thead><tr>";
          $taille = sizeof($resultat) - 1;
          foreach ($resultat[$taille] as $key => $value) 
          {
            echo "<th>{$key}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";
          while ($i <= $taille) 
          {
            echo "<tr>";
            foreach ($resultat[$i] as $key => $value) 
            {
              echo "<td>{$value}</td>";
            }
            echo "</tr>";
            $i++;
          }

          echo "</tbody></table>";
        } 
        else 
        {
          echo "Vous n'avez pas accès à cette page.";
        }
      } 
      else 
      {
        echo "Vous n'êtes pas connecté.";
      }

      ?>

    </section>
  </main>

  <footer>
    <nav class="navfooter">
      <a href="inscription.php">INSCRIPTION</a>
      <a href="connexion.php">CONNEXION</a>
      <a href="admin.php">ADMIN PANEL</a>
      <a href="profil.php">MEMBER PROFIL</a>
    </nav>
    <article>
      <p>Copyright 2019 Coding School | All Rights Reserved | Project by Mathilde, Gwenael & Thierry.</p>
    </article>
  </footer>

</body>

</html>