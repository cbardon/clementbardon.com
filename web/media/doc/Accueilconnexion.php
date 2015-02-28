<?php 
 // On démarre le système de session
 session_start();
		
		$nom_du_serveur ="sql.free.fr";
		$nom_de_la_base ="kevin_forestier";
		$nom_utilisateur ="kevin.forestier";
		$passe ="uLNiX8hK";
		
		//Variable de connexion à la base de données
		mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
			mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de données ");
 
		if ($_SESSION['logged'] != "1")
		{
			$identifiant = $_POST['id'];
			$mtpEleve = $_POST['mdp'];
			
			
			
			$query = "SELECT IdentifiantEleve, MtpEleve FROM Eleve WHERE IdentifiantEleve ='$identifiant' AND MtpEleve ='$mtpEleve'";
			$resultat = mysql_query($query, $connexion);
			$nb = mysql_num_rows($resultat);
		}
		else
		{
			$nb = "1";
			$identifiant = $_SESSION['IdentifiantEleve'];
		}

			if ($nb == "1")
			{
				$_SESSION['IdentifiantEleve'] = $identifiant;
				
				
				$_SESSION['logged'] = "1";
				
				$tmp = mysql_query("SELECT * FROM Eleve WHERE IdentifiantEleve = '$identifiant' LIMIT 1") or die(mysql_error());
				$eleve = mysql_fetch_assoc($tmp);
			}
			else
			{
			
											
				$_SESSION['logged'] = "0";
											
				header('Location: Connexionetudiant.php'); 
			}
			

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Bienvenue dans votre espace personnel</title>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>

	<body>
	
		
		
		<center>

		<table style="background-image: url(images/page-blanche.jpg)" border="0" width="1109px" height="782px"> 
				<tr valign="top">
				<?php
					include("hautpage.php");
				?>
				</tr>
				<tr>
				<td colspan="6" rowspan="1" valign="top">
				
				<?php
				   
							echo "<h2>Bienvenue ".$eleve['PrenomEleve']." ".$eleve['NomEleve']."</h2>";
						?>
						<center>
						
							<a href="Menu.php">Accès au menu</a>
							
						</center>
				
				
				<table width="1109px" height="500px" border="0">
				
					<tr height="50px">
						<td width="85px">
						 
						</td>
						<td width="470px">
						
						<center>
						<a href="Noteeleve.php"><img src="images/bouton-notes.jpg">
						</center>

						</td>
						<td>
						
						<center>
						<a href="Profileleve.php"><img src="images/bouton-profil.jpg">
						</center>
						
						</td>
					</tr>
					<tr>
						<td height="50px">
						
						</td>
						<td>
						
						<center>
						<a href="Repaseleve.php"><img src="images/bouton-repas.jpg">
						</center>
						
						</td>
						<td>
						
						<center>
						<a href="Devoirseleve.php"><img src="images/bouton-devoirs.jpg">
						</center>
						
						</td>
					</tr>
				
				</table>
				
				</td>
				</tr>
			</table>
		
		<?php
			include("baspage.php");
		?>
		</center>
	</body>
</html>