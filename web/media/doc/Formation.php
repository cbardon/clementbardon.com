<?php 
 // On démarre le système de session
 session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Formation</title>
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
				
					<table width="1109px" border="0">
					
						<tr height="100%">
							<td width="90px">
							
							</td>
							<td>
								<h2>Bienvenue sur la page de formation, vous trouverez ici dans un 1er temps les formations après vos examens puis dans un 2nd temps des jobs étudiants pour l'été 2013</h2>
								<h2><u>Les études</u></h2>
								<p>Le programme de ce nouveau BTS SIO a permis d’améliorer les chances des étudiants à continuer leurs études, notamment avec un enrichissement des mathématiques ou de l’anglais.</p>

								<p />Voici les différentes possibilités d’études après le BTS SIO :

							   <li>-Faire une licence professionnelle dans l’informatique, réseaux … (<a href="http://www.etudinfo.com/diplome/formation-licence-professionnelle-systemes-informatiques-et-logiciels.html">comme la licence pro Systèmes informatiques et logiciels par exemple</a>)</li>
							   <li>-Intégrer une Ecole d’ingénieur (notamment TELECOM</li>
							   <li>-Licence puis Master à l’université</li>
							   <a href="module_formation.php">Trouver une formation</a>

								
								
								<h2><u>Les jobs d'été</u></h2>
								<p>Pour vous, nous vous avons selectionez quelques sites pour vous faciliter dans vos recherches</p>
							
								<li>-<a href="http://jobs-stages.letudiant.fr/jobs-etudiants/offres/operations-54/page-1.html">L'etudiant.fr</a></li>
								<li>-<a href="http://www.studentjob.fr/job-d-ete">Student Job</a></li>
								<li>-<a href="http://jobetudiant.net">Job Etudiant</a></li>
								<li>-<a href="http://www.jcomjeune.com/dossier/jobs-d-ete-toutes-les-pistes-pour-travailler">JcomJeune</a></li>
								<li>-<a href="http://www.capcampus.com/jobs-d-ete-987/">Cap Campus</a></li>
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