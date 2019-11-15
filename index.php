<?php session_start(); ?>

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

	<section class="leftsidebar"><img src="img/welcome.gif">

		<?php

		date_default_timezone_set('Europe/Paris');
		if(isset($_SESSION['login']))
		{ 
			echo "Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s');
			echo "<h1>Bonjour ".$_SESSION["login"]."</h1><br>";

			if($_SESSION['login'] == "admin"){
				echo "<p>Vous êtes connecté en tant qu'administrateur et vous avez accès à la page <a href=\"admin.php\">ADMIN PANEL</a></p>";
			}
			else{
				echo "<p>Vous êtes connecté en tant qu'utilisateur. Accédez à votre page de <a href=\"profil.php\">PROFIL</a></p>";
			}

	 	    echo "<form action=\"index.php\" method=\"post\">
	        <input class=\"mybutton\"  name=\"deco\" value=\"Deconnexion\" type=\"submit\" />
            </form>";
		}
	    else
	    {
	    	echo "Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s');
	    	echo "<h1>Bonjour Guest</h1>";
	    	echo "<p>Pour pouvoir accéder à votre profil veuillez visiter la page : <a href=\"connexion.php\">CONNEXION</a></p>";
	    	echo "<p>Pas de compte ? Inscrivez-vous en remplissant le formulaire : <a href=\"inscription.php\">INSCRIPTION</a></p>";
		}
		
		if (isset($_POST["deco"]))
		{
	     session_unset();
         session_destroy();
         header('Location:index.php');
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