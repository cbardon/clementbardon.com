<?php 
 // On démarre le système de session
 session_start();
 
 
 if ($_SESSION['logged'] == "1")
 {
	
	header('Location: Accueilconnexion.php'); 
 
 }
 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Espace Etudiant</title>
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
				
					<table width="1109px" border="1">
					
						<tr height="100%">
							<td width="90px">

							</td>
							<td>
								<center>
								<br><br>
								
								
								<br><br>
									<form action="Accueilconnexion.php" method="post" onsubmit="return validation();">
										<b>Identifiant :</b><br>
										<input id="zone1" type="text" name="id" size="20" >
										<br><br>
										<b>Mot de passe :</b><br>
										<input type="password" name="mdp" size="20" >
										<br><br>
										<input type="submit" value="Connexion" >
									</form>
									
									<br>
									
									<?php
									
									if ($_SESSION['logged'] == "0")
									{
										echo "Erreur de connexion !";
										session_destroy();
									}	
									?>
									
									
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