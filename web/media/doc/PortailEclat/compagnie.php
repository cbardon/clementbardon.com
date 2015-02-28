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
				
				$query = "Select compagnieSp From spectacle";
				
				$resultat = mysql_query($query, $connexion);
				
				while($row = mysql_fetch_row($resultat))
				{
					$compagnieSp = $row[0];

					
					/*echo"<TR> <TD>".$refSp."</TD> </TR> <TR> <TD>".$titreSp."</TD> </TR> <TR> <TD>".$compagnieSp.
					"</TD> </TR> <TR> <TD>".$dateSp."</TD> </TR> <TR> <TD>".$heureSp."</TD> </TR> <TR> <TD>"
					.$tarifSp."</TD> </TR> <TR> <TD>".$numLieu."</TD> </TR> <TR> <TD>".$codeGenre;*/
					echo"<TR>";
					echo"<TD>".$compagnieSp."</TD>";
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
