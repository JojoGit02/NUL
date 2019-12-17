<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Connexion</title>
	</head>
	<body>
        <?php
        /***********************************************
         * Nom du scirpt : Inscription.php
         * Description : Propose un formulaire d'inscription.
         * Les paramétres sont envoyé a une base de donnée
         */

        if (isset($_POST["Valider"]))
        {
            //On recupere les données de maniére brut
            $Email = utf8_decode($_POST['zoneEmail']);
            $ConfirmEmail = utf8_decode($_POST['zoneConfirmEmail']);
            $Mdp = $_POST['zoneMdp'];
            $ConfirmMdp = $_POST ['zoneConfirmMdp'];
            //On aseptise les données recupérer 
            $Email = sanitizeString($Email);
            $ConfirmerEmail = sanitizeString($ConfirmEmail);
            $Mdp = sanitizeString($Mdp);
            $ConfirmMdp = sanitizeString($ConfirmMdp);

            //On se connecte au SGBD
            //Paramétres de connexion
            $host = 'localhost';
            $user = 'user2';
            $passwd = 'snir@snir2019';
            $mabasse = 'biblio2';

            /*Vérifier les données :
                - L'email et sa confirmation identique
                - Le mdp et sa confirmation identique 
            */
            if($conn = mysqli_connect($host,$user,$passwd,$mabasse))
            {
                //On hache le mot de passe
                $Mdp_hash = password_hash($Mdp, PASSWORD_DEFAULT);
                //Preparation insertion des données
                $reqInsert =    "INSERT INTO Connexion(email,mdp)
                                VALUE('$email','$Mdp')";
                //On tente d'envoyer la requete
                if ($result = mysqli_query($conn, $reqInsert, MYSQLI_USE_RESULT))
                {
                    //Requete on appelle le script "Connexion.php"
                    echo " Inscription réalisée vous pouvez vous connecter";
                    echo '<a href="Connexion.php">Connexion</a>';
                }
                else
                {
                    //Erreur de requete 
                    die ("Erreur de requête");
                }
            }
            else
            {
                //Echec de la connexion à la BD
                die ("Probleme de connexion au serveur de base de données");
            }           
        }
        else
        {
            //Afficher le formulaire 
            ?>
            <h1> Inscription </h1>
            <form action ="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div>
                    <label for = "zoneEmail">Email : </label>
                    <input type="email" id="zoneEmail" name="zoneEmail" placeholder="Entrez votre email" required>
                </div>
                <div>
                    <label for = "zoneConfirmEmail"> Confirmation Email :</label>
                    <input type="email" id="zoneConfirmEmail" name="zoneConfirmEmail" placeholder="Confirmer votre email" required>
                </div>
                <div>
                    <label for ="zoneMdp"> Mot de passe : </label>
                    <input type="password" id="zoneMdp" name="zoneMdp" placeholder="Entrez votre mot de passe" required>
                </div>
                <div>
                    <label for="zoneConfirmMdp">Confirmer mot de passe : </label>
                    <input type="password" id="zoneConfirmMdp" name="zoneConfirmMdp" placeholder="Confirmer votre mot de passe" required>
                </div>
                <div>
					<!-- Zone du bouton valider -->
					<button type="submit" name= "Valider"> Valider </button>
                </div>
        </form>

            <?php
        }

        //Fonction pour asseptiser les données utilisateurs 
        //Asseptiser les chaines de caractéres 
        function sanitizeString($var)
        {
            if (get_magic_quotes_gpc())
            {
            	// supprimer les slashes
				$var = stripslashes($var);
			}
			// suppression des tags
			$var = strip_tags($var);
	    	// convertir la chaine en HTML
			$var = htmlentities ($var);
			return $var;
		}
            ?>
    </body>
</html>
