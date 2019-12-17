<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Connexion</title>
	</head>
	<body>
        <?php
        /***********************************************
         * Nom du scirpt : connexion.php
         * Description : Propose un formulaire de connexion.
         * Les données sont comparées à celles enregistres dans la BD
         * Si Parametres correctes on indique que l'utilisateur qu'il est connecte 
         */

         if (isset($_POST["Valider"]))
         //On récupere les données brut 
         $Email = $_POST['ZoneEmail'];
         $MDP = $_POST['ZoneMdp'];
         
        // Paramétres de connexion
         $host = 'localhost';
         $user = 'user2';
         $passwd = 'snir@snir2019';
         $mabasse = 'biblio2';

         //Connexion au SGBD MySQL
         if ($conn = mysqli_connext($host,$user,$passwd,$mabasse))
         {
             //Nombre de ligne envoyé > 0
             $Ligne = mysqli_num_rows($result);
             if ($Ligne==1)
             {
                 //Extraction ligne envoyée par la requéte
                $row = mysqli_fetch_assoc($result);
                //Recuperation du mot de passe dans la ligne
                $Mdp_Crypt_BD = $row['mdp'];
                
             }
         }
        ?>