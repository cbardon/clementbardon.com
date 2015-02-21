<HTML>
	<head><title>Note</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css">
	</head>

	<form action="Ajoutinfos.php" method="post" name="formulaire" onsubmit="return validation();">

		<table style="text-align: center; width: 100px; height: 200px; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">

			<tr>
				<td p class="formulaire_note" style="text-align: center"><b>Note :</b><br>
				
					<INPUT type="Note" value="Entrer une note" name="Note">
					
				</td>
				
			</tr>
			<tr>
			
				<td p class="titre_formulaire" style="text-align: center" ><b>Matière :</b><br>
				
					<INPUT type="Matiere" value="Entrer une matière" name="Matiere">
				
				</td>

		</table>
		<center>
			<input value="Envoyer la note" type="submit">
			<input type="reset" value="Effacer"><br>
			<a href="Listenote.php">Voir les notes</a>
		</center>
	</form>
</HTML>