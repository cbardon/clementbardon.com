<HTML>
	<head><title>Repas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css">
	</head>
	<body>
	
	<FORM NAME="formulaire" method="post" action ="">
	
		Selectionner la date: <input type="date" name="date" value="" /></p>


		<p align="center"><input name ="Envoyer" TYPE="submit" value="Rechercher"></p>
	</FORM>

<?php

	$date= $_POST['date'];
			
	//On d�clare les variables pour pouvoir se connecter � la base
	$nom_du_serveur ="sql.free.fr";
	$nom_de_la_base ="kevin_forestier";
	$nom_utilisateur ="kevin.forestier";
	$passe ="uLNiX8hK";
	 
	//Variable de connexion � la base de donn�es
	mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
	 
	//V�rification d'acc�s � la base de donn�es
	mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de donn�es ");
	 
	 
	 // Requete pour r�cuperer les infos des repas
	 $requeteNote = " SELECT Jour, RepasMidi, RepasSoir FROM Repas ";
	 
	 // On v�rifie si la requete fonctionne
	 $req = mysql_query($requeteNote) or die('Erreur SQL !<br>'.$requeteNote.'<br>'.mysql_error());
 
 
	//$jour = $ligne['Jour'];
	
	echo "Date du repas : ".$ligne['Jour']."<p>";
	
	if ($date == $jour)
	{
	
	
		echo "<table>" ;
		
		 // On affiche les notes tant qu'il y en a
		 while($ligne = mysql_fetch_assoc($req))
		 {
			// On cr�e une ligne
			echo "<tr>" ;
				
				// On cr�� les cases dans la ligne avec le contenu
				echo "<td>Repas du midi : ".$ligne['RepasMidi']."</td>" ;
			echo "</tr>" ;
			
			echo "<tr>" ;
				echo "<td>Repas du soir : ".$ligne['RepasSoir']."</td>" ;
				
			echo "</tr>" ;
			
		}
		echo "<table>";
	}
?>

	</body>
</HTML>