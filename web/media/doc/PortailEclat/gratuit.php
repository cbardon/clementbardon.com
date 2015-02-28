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
				
				$query = "Select * From spectacle Where tarifSp = 0";
				
				$resultat = mysql_query($query, $connexion);
				
				while($row = mysql_fetch_row($resultat))
				{
					$refSp = $row[0];
					$titreSp = $row[1];
					$compagnieSp = $row[2];
					$dateSp = $row[3];
					$heureSp = $row[4];
					$tarifSp = $row[5];
					$numLieu = $row[6];
					$codeGenre = $row[7];
					
					/*echo"<TR> <TD>".$refSp."</TD> </TR> <TR> <TD>".$titreSp."</TD> </TR> <TR> <TD>".$compagnieSp.
					"</TD> </TR> <TR> <TD>".$dateSp."</TD> </TR> <TR> <TD>".$heureSp."</TD> </TR> <TR> <TD>"
					.$tarifSp."</TD> </TR> <TR> <TD>".$numLieu."</TD> </TR> <TR> <TD>".$codeGenre;*/
					echo"<TR>";
					echo"<TD>".$refSp."</TD>";
					echo"<TD>".$titreSp."</TD>";
					echo"<TD>".$compagnieSp."</TD>";
					echo"<TD>".$dateSp."</TD>";
					echo"<TD>".$heureSp."</TD>";
					echo"<TD>".$tarifSp."</TD>";
					echo"<TD>".$numLieu."</TD>";
					echo"<TD>".$codeGenre."</TD>";
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
