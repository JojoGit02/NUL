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

         if (isset($_POST[Valider"]))
         $Email = $_POST['ZoneEmail'];
         $MDP = $_POST['ZoneMdp'];

        ?>