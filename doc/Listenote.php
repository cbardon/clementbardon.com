<HTML>
	<head><title>Liste des notes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css">
	</head>
	<center>

<?php
	//On d�clare les variables pour pouvoir se connecter � la base
	$nom_du_serveur ="sql.free.fr";
	$nom_de_la_base ="kevin_forestier";
	$nom_utilisateur ="kevin.forestier";
	$passe ="uLNiX8hK";
	 
	//Variable de connexion � la base de donn�es
	mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
	 
	//V�rification d'acc�s � la base de donn�es
	mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de donn�es ");
	 
	 
	 // Requete pour r�cuprere les notes et les matieres
	 $requeteNote = " SELECT Note, Matiere FROM Note; ";
	 
	 // On v�rifie si la requete fonctionne
	 $req = mysql_query($requeteNote) or die('Erreur SQL !<br>'.$requeteNote.'<br>'.mysql_error());
 
 
	echo "<table>" ;
	
	 // On affiche les notes tant qu'il y en a
	 while($ligne = mysql_fetch_assoc($req))
	 {
		// On cr�e une ligne
		echo "<tr>" ;
			
			// On cr�� les cases dans la ligne avec le contenu
			echo "<td>".$ligne['Note']."</td>" ;
			echo "<td>".$ligne['Matiere']."</td>" ;
			
			
		echo "</tr>" ;
		
	}
	echo "<table>";

?>

		<a href="Note.php">Ajouter une note</a>
	</center>
</HTML>