<?php 
 // On démarre le système de session
 session_start();
 
 
 if ($_SESSION['logged'] != "1")
 {
	$_SESSION['logged'] = "0";
	
	header('Location: Espaceperso.php');
}
 
 ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="iso-8859-15">
		<title>Notes</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	
		
		<article>
			<h1>Notes</h1>
			<p />
			<TABLE border=1>
				<?php
				
		$nom_du_serveur ="sql.free.fr";
		$nom_de_la_base ="kevin_forestier";
		$nom_utilisateur ="kevin.forestier";
		$passe ="uLNiX8hK";
		
		//Variable de connexion à la base de données
		$connexion = mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
			mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de données ");
 
				$query = "Select Note, NomMatiere From controle,matiere WHERE NumMatiere = NumMatiere";
				
				$resultat = mysql_query($query, $connexion);
				
				while($row = mysql_fetch_row($resultat))
				{
					$Note = $row[0];

					
					echo"<TR> <TD>".$Note."</TD> </TR> <TR> <TD>".$NomMatiere."</TD> </TR>";
					
				}
				mysql_close($connexion);
				
			?>
			</TABLE>
			<p />
			<br />
			<br />
			<br />
			<br />
		</article>
		<footer>
			
		</footer>
	</body>
</html>
