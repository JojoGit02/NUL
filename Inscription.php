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
            $Email = utf8_decode($_POST['']);
            $ConfirmerEmail = utf8_decode($_POST['']);
            $Mdp = $_post[''];
            $ConfirmMdp = $_POST [''];
            //On aseptise les données recupérer 
            $Email = sanitizeString($Email);
            $ConfirmerEmail = sanitizeString();
            $Mdp = sanitizeString();
            $ConfirmMdp = sanitizeString();

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
            if($conn = mysqli_connext($host,$user,$passwd,$mabasse))
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
                    die ("Erreur de requête").
                }
            }
            else
            {
                //Echec de la connexion à la BD
                die ("Probleme de connexion au serveur de base de données").
            }

            
        }
