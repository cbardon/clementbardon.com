<TD width="295px" height="143px"><a href="Accueil.php"><img src="images/bouton-accueil.jpg"></a></TD>
<TD width="180px"><a href="Journal.php"><img src="images/bouton-journal.jpg"></a></TD>
<TD width="150px"></TD>
<TD width="180px"><a href="Formation.php"><img src="images/bouton-formation.jpg"></a></TD>
<TD width="195px"><a href="Espaceperso.php"><img src="images/bouton-espaceperso.jpg"></a></TD>
<?php

if ($_SESSION['logged'] == "1")
{
	echo '<TD><a href="Deconnexion.php"><img src="images/logodeco.png"></a></TD>';
}
else
{
	echo '<TD></TD>';
}
?>