<HTML>
	<head><title>Liste des �leves</title>
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
	 
	 
	 // Requete pour r�cuperer les infos des �leves
	 $requeteNote = " SELECT NomEleve, PrenomEleve, NomClass
					  FROM Eleve, Classe
					  WHERE Eleve.NumClasse = Classe.NumClasse
					  
					  ; ";
	 
	 // On v�rifie si la requete fonctionne
	 $req = mysql_query($requeteNote) or die('Erreur SQL !<br>'.$requeteNote.'<br>'.mysql_error());
 
 
	echo "<table>" ;
	
		echo "Liste des �leves";
		
		 // On affiche les notes tant qu'il y en a
		 while($ligne = mysql_fetch_assoc($req))
		 {
			// On cr�e une ligne
			echo "<tr>" ;
				
				// On cr�� les cases dans la ligne avec le contenu
				echo "<td>".$ligne['NomEleve']."</td>" ;
				echo "<td>".$ligne['PrenomEleve']."</td>" ;
				echo "<td>".$ligne['NomClass']."</td>" ;
				
				
			echo "</tr>" ;
		
	}
	echo "<table>";

?>	

	<form action="Ajouteleve.php" method="post" name="formulaire" onsubmit="return validation();">
	
		<p>Ajouter un �l�ve</p>
		
		<input type="text" name="Nom" value="Nom" /></p>
		<input type="text" name="Prenom" value="Pr�nom" /></p>
		<select name="Classe">
			<option value="1">SLAM</option>
			<option value="2">SISR</option>
			<option value="3">WEBDESIGN</option>
		</select>
		<br><br>
		<input value="Ajouter" type="submit">
	</form>

	</center>
</HTML>