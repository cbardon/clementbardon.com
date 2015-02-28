<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="iso-8859-15">
		<title>Association ECLAT</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<?php
		include"header.inc.php";
		include"menuvertical.inc.php";
	?>
		
		</aside>
		<article>
			<h1>Liste des Spectacles</h1>
			<p />
			<TABLE border=1>
				<?php
				
				$connexion = mysql_connect ('localhost', 'peuch', 'Quypxcsc15$') OR die ('Erreur de connexion');
				
				mysql_select_db('Festival_Peuch') Or die ('Selection de la base impossible');
				
				$query = "Select adresseL, villeL From lieu ";
				
				$resultat = mysql_query($query, $connexion);
				
				while($row = mysql_fetch_row($resultat))
				{
					$adresse = $row[0];
					$ville = $row[1];

					echo"<TR>";
					echo"<TD>".$adresse."</TD>";
					echo"<TD>".$ville."</TD>";
					echo"</TR>";
				}
				
				?>
			</TABLE>
			<p />
			<br />
			<br />
			<br />
			<br />
		</article>
		<footer>
			<p>Site officiel du <a href="http://www.aurillac.net" target="_blank">festival de théâtre de rue</a> d'Aurillac - design by <a href="http://www.webdezign.co.uk" title="web design london">Webdezign</a></p>
		</footer>
	</body>
</html>
