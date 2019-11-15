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
            <img src="img/connexion.png"></br>

            <?php

            $cnx = mysqli_connect("localhost", "root", "", "moduleconnexion");
            session_start();

            if (isset($_SESSION["login"])) 
            {
                echo "Bonjour " . $_SESSION["login"] . " vous êtes déja connecté.<br>";
                echo "<form action=\"index.php\" method=\"post\">
	                <input class=\"mybutton\"  name=\"deco\" value=\"Deconnexion\" type=\"submit\" />
                    </form>";
            }

            if ((!isset($_POST["login"]) || !isset($_POST["password"])) && (!isset($_SESSION["login"]))) 
            {
                echo "<form action=\"connexion.php\" method=\"post\" class=\"form_profil\">
                    <label>Login</label>
                    <input name=\"login\"  type=\"text\" required />
                    <label>Password</label>
	                <input name=\"password\"  type=\"password\" required />
	                <input class=\"mybutton\"  name=\"connexion\" value=\"Connexion\" type=\"submit\" />
                    </form>";
            }

            if (isset($_POST['login']) && isset($_POST['password'])) 
            {
                $requete2 = "SELECT * FROM utilisateurs WHERE login ='" . $_POST['login'] . "'";
                $query2 = mysqli_query($cnx, $requete2);
                $resultat = mysqli_fetch_array($query2);

                if (!empty($resultat)) 
                {
                    if (password_verify($_POST['password'], $resultat['password'])) 
                    {
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location:index.php');
                    } else 
                    {
                        echo 'Votre mot de passe n\'est pas bon';
                        echo "<form action=\"connexion.php\" method=\"post\"class=\"form_profil\">
                            <label>Login</label>
                            <input name=\"login\"  type=\"text\" required />
                            <label>Password</label>
	                        <input name=\"password\"  type=\"password\" required />
	                        <input class=\"mybutton\"  name=\"connexion\" value=\"Connexion\" type=\"submit\" />
                            </form>";
                    }
                } else 
                {
                    echo 'Votre nom d\'utilisateur n\'existe pas';
                    echo "<form action=\"connexion.php\" method=\"post\" class=\"form_profil\">
                        <label>Login</label>
                        <input name=\"login\"  type=\"text\" required />
                        <label>Password</label>
	                    <input name=\"password\"  type=\"password\" required />
	                    <input class=\"mybutton\"  name=\"connexion\" value=\"Connexion\" type=\"submit\" />
                        </form>";
                }
            }
            mysqli_close($cnx);

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