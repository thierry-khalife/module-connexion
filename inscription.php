<?php session_start() ?>

<!DOCTYPE html>

<html>

<head>
    <title>Inscription</title>
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

            <?php 
            if (isset($_SESSION["login"])) 
            {
                echo "Bonjour, " . $_SESSION["login"] . " vous êtes déja connecté impossible de s'inscrire.<br>";
                echo "<form action=\"index.php\" method=\"post\">
	                <input class=\"mybutton\"  name=\"deco\" value=\"Deconnexion\" type=\"submit\" />
                    </form>";
            } 
            else 
            {
                echo "<article id=\"titreinscription\"><h1>Veuillez rentrer vos informations</h1></article>
                    <form action=\"inscription.php\" method=\"post\" class=\"form_profil\">
                    <label>Login</label>
                    <input type=\"text\" name=\"login\" required>
                    <label>Prénom</label>
                    <input type=\"text\" name=\"prenom\" required>
                    <label>Nom</label>
                    <input type=\"text\" name=\"nom\" required>
                    <label>Password</label>
                    <input type=\"password\" name=\"mdp\" required>
                    <label>Password confirmation</label>
                    <input type=\"password\" name=\"mdpval\" required>
                    <input class=\"mybutton\"  type=\"submit\" value=\"S'inscire\" name=\"valider\">
                    </form>";

                if (isset($_POST["valider"])) 
                {
                    $login = $_POST["login"];
                    $prenom = $_POST["prenom"];
                    $nom = $_POST["nom"];
                    $mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT, array('cost' => 12));
                    $connexion = mysqli_connect("localhost", "root", "", "moduleconnexion");
                    $requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";
                    $query3 = mysqli_query($connexion, $requete3);
                    $resultat3 = mysqli_fetch_all($query3);

                    if (!empty($resultat3)) 
                    {
                        echo "Ce Login est déjà prit";
                    } 
                    elseif ($_POST["mdp"] != $_POST["mdpval"]) 
                    {
                        echo "Attention ! Mot de passe différents";
                    } 
                    else 
                    {
                        $requete = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$mdp')";
                        $query = mysqli_query($connexion, $requete);
                        header('Location:connexion.php');
                    }
                }
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