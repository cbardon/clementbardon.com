<?php
$DB_serveur = 'clementbardon.com.mysql'; // Nom du serveur
$DB_utilisateur = 'clementbardon_c'; // Nom de l'utilisateur de la base
$DB_motdepasse = 'projetweb'; // Mot de passe pour accèder à la base
$DB_base = 'clementbardon_c'; // Nom de la base

$connection = mysql_connect($DB_serveur, $DB_utilisateur, $DB_motdepasse) // On se connecte au serveur
or die (mysql_error().' sur la ligne '.__LINE__);

mysql_select_db($DB_base, $connection) // On se connecte à la BDD
or die (mysql_error().' sur la ligne '.__LINE__);
?>