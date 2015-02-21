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
		<script>
		function recherche()
			{
			var niveau = document.getElementById("menu_1").value;
			var domaine = document.getElementById("menu_2").value;
			var rd = document.getElementById("menu_3").value;
			var affichage = document.getElementById("affichage");
			if (((niveau=="0")||(niveau=="1"))&&(domaine=="0")&&(rd=="1"))
				{
				var resultat="# BTS Communication - Lycée Saint-Géraud - Aurillac (Cantal)</br># BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)</br># BTS SIO - Lycée La Chartreuse - Brives-Charensac (Haute-Loire)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="0")&&(rd=="a"))
				{
				var resultat="# BTS Communication - Lycée Saint-Géraud - Aurillac (Cantal)</br># BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)";
				}	
			else if (((niveau=="0")||(niveau=="1"))&&((domaine=="0")||domaine=="2")&&(rd=="b"))
				{
				var resultat="# BTS SIO - Lycée La Chartreuse - BTS SIO - Brives-Charensac (Haute-Loire)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&((domaine=="0")||(domaine=="2"))&&(rd=="2"))
				{
				var resultat="# BTS SIO - LycéeMonge - Charleville-Mézières (Ardennes)</br># BTS SIO - Lycée Bouchardon - Chaumont (Haute-Marne)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&((domaine=="0")||(domaine=="2"))&&(rd=="c"))
				{
				var resultat="# BTS SIO -  Lycée Monge - Charleville-Mézières (Ardennes)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&((domaine=="0")||(domaine=="2"))&&(rd=="d"))
				{
				var resultat="# BTS SIO - Lycée Bouchardon - Chaumont (Haute-Marne)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&((domaine=="0")||(domaine=="2"))&&((rd=="3")||(rd=="e")))
				{
				var resultat="# BTS Communucation -  Lycée Saint-Géraud - Aurillac (Cantal)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="1")&&((rd=="0")||(rd=="1")||(rd=="a")))
				{
				var resultat="# BTS Communucation -  Lycée Saint-Géraud Communication - Aurillac (Cantal)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="1")&&((rd=="b")||(rd=="2")||(rd=="c")||(rd=="d")||(rd=="3")||(rd="e")))
				{
				var resultat="Aucune formation n'est disponible dans la zone souhaitée.";
				}	
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="2")&&(rd=="0"))
				{
				var resultat="# BTS SIO - Lycée Monge - Charleville-Mézières (Ardennes)</br># BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)</br># BTS SIO - Lycée La Chartreuse - Brives-Charensac (Haute-Loire)</br># BTS SIO - Lycée Bouchardon - Chaumont (Haute-Marne)</br># BTS SIO - Lycée Poincaré Bar-le-Duc (Meuse)";
				}	
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="2")&&(rd=="1"))
				{
				var resultat="# BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)</br># BTS SIO - Lycée La Chartreuse - Brives-Charensac (Haute-Loire)";
				}
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="2")&&(rd=="a"))
				{
				var resultat="# BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)";
				}
			else if ((niveau=="2")&&((domaine=="0")||(domaine=="1")||(domaine=="2"))&&((rd=="0")||(rd=="1")||(rd=="a")||(rd=="b")||(rd=="2")||(rd="c")||(rd=="d")||(rd=="3")||(rd=="e")))
				{
				var resultat="Aucune formation n'est disponible dans la zone souhaitée.";
				}		
			else if (((niveau=="0")||(niveau=="1"))&&(domaine=="0")&&(rd=="0"))
				{
				var resultat="# BTS SIO - Lycée Monge - Charleville-Mézières (Ardennes)</br># BTS Communication - Lycée Saint-Géraud - Aurillac (Cantal)</br># BTS SIO - Lycée Monnet-Mermoz - Aurillac (Cantal)</br># BTS SIO - Lycée La Chartreuse - Brives-Charensac (Haute-Loire)</br># BTS SIO - Lycée Bouchardon - Chaumont (Haute-Marne)</br># BTS SIO - Lycée Poincaré Bar-le-Duc (Meuse)";
				}	
			affichage.innerHTML=resultat;
			}
		</script>
	</head>

	<body>
	
		<center>

		<table style="background-image: url(images/page-rechercheformation.jpg)" border="0" width="1109px" height="782px"> 
				<tr valign="top">
				<?php
					include("hautpage.php");
				?>
				</tr>
				<tr>
				<td colspan="6" rowspan="1" valign="top">
				
				
				
				
				<table width="1109px" height="500px" border="0">
				
					<tr height="50px">
						<td width="85px">
						 
						</td>
						<td width="250px">
						
						
						
						

						</td>
						<td height="382px" valign="bottom">
						
						
						<table width="680x" border="0" >
										<tr>
											<td width="205px" >
											<center>
											<select id="menu_1" style="width:170px;">
												<option value="0">Tous les niveaux</option>
												<option value="1">Bac +1 à Bac +2</option>
												<option value="2">Bac +3</option>
												</select>
												</center>
												</td>
												<td style="width:200px;">
												<center>
												<select id="menu_2" style="width:165px;">
													<option value="0">Choisir un domaine</option>
													<option value="1">Communication</option>
													<option value="2">Informatique</option>
												</select>
												</center>
												</td>
												<td width="200";>
												<center>
												<select id="menu_3" style="width:165px;">
													<option class="opt_bold" value="0" >Toutes les zones</option>
													<option class="opt_bold" value="1" ><b>Auvergne</b></option>
													<option class="opt_bold" value="a" >  => Cantal</option>
													<option class="opt_bold" value="b" >  => Haute-Loire</option>
													<option class="opt_bold" value="2" >Champagne-Ardenne</option>
													<option class="opt_bold" value="c" >  => Ardennes</option>
													<option class="opt_bold" value="d" >  => Haute-Marne</option>
													<option class="opt_bold" value="3" >Lorraine</option>
													<option class="opt_bold" value="e" >  => Meuse</option>
												</select>
												</center>
												</td>
												</tr>
												<tr>
												<td colspan=3>
												<p></p>
												<center><input type="button" value="Lancer la recherche" onclick="recherche()"></center>
												</td>
												</tr>
												<tr>
												<td colspan=3>
												<p></p>
												
											</table>
						
						
						
						</td>
					</tr>
					<tr>
						<td >
						
						</td>
						<td>
						
						</td>
						<td height="220px">
							<center><div id="affichage"></div></center>
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