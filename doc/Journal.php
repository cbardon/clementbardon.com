<?php 
 // On d�marre le syst�me de session
 session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Journal</title>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>

	<body>
	
		<center>

			 <table style="background-image: url(images/fond-journal.jpg)" border="0" width="1109px" height="782px"> 
				<tr valign="top">
				<?php
					include("hautpage.php");
				?>
				</tr>
				<tr>
				<td colspan="6" rowspan="1" valign="top">
				
				<table width="1109px" border="0">
				
					<tr height="139px">
						<td width="316px">
						
						</td>
						<td width="470px">
						
						</td>
						<td>
						
						</td>
					</tr>
					<tr>
						<td height="334px">
						
						</td>
						<td>
						<iframe id="video" src="http://www.youtube.com/embed/4JFv-yrzTEg" frameborder="0" height="343" width="470"></iframe>
						</td>
						<td>
						
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