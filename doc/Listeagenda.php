<HTML>
	<head><title>Agenda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css">
	</head>
	<center>

<?php
	//On déclare les variables pour pouvoir se connecter à la base
	$nom_du_serveur ="sql.free.fr";
	$nom_de_la_base ="kevin_forestier";
	$nom_utilisateur ="kevin.forestier";
	$passe ="uLNiX8hK";
	 
	//Variable de connexion à la base de données
	mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
	 
	//Vérification d'accès à la base de données
	mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de données ");
	 
	 
	 // Requete pour récuperer les infos de l'agenda
	 $requeteNote = " SELECT TitreAg, DateAg, DescriptionAg FROM Agenda; ";
	 
	 // On vérifie si la requete fonctionne
	 $req = mysql_query($requeteNote) or die('Erreur SQL !<br>'.$requeteNote.'<br>'.mysql_error());
 
 
	echo "<table>" ;
	
	 // On affiche les notes tant qu'il y en a
	 while($ligne = mysql_fetch_assoc($req))
	 {
		// On crée une ligne
		echo "<tr>" ;
			
			// On créé les cases dans la ligne avec le contenu
			echo "<td>".$ligne['TitreAg']."</td>" ;
			echo "<td>".$ligne['DateAg']."</td>" ;
			echo "<td>".$ligne['DescriptionDevoir']."</td>" ;
			
			
		echo "</tr>" ;
		
	}
	echo "<table>";

?>

	</center>
</HTML>