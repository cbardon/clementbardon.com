<?php 
 // On démarre le système de session
 session_start();
 
 
 /*if ($_SESSION['logged'] == "1")
 {
	
	header('Location: Accueilconnexion.php'); 
 
 }*/
 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Espace Personnel</title>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>

	<body>
	
		<center>

		<table style="background-image: url(images/page-fondespace.jpg)" border="0" width="1109px" height="782px"> 
				<tr valign="top">
				<?php
					include("hautpage.php");
				?>
				</tr>
				<tr>
				<td colspan="6" rowspan="1" valign="top">
				
					<table width="1109px" border="0">
					
						<tr height="600px">
							<td width="90px">

							</td>
							<td>
								<center>

									<TABLE height="300px" width="950px" border="0">
										<TR>
											<TD><center><a href="Connexionprof.php"><img src="images/bouton-prof.jpg"></a></center></TD>
											<TD><center><a href="Connexionetudiant.php"><img src="images/bouton-etudiant.jpg"></a></center></TD>
										
										</TR>
										
									</TABLE>
									
									
									
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