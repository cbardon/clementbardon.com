<?php
	//On d�clare les variables pour pouvoir se connecter � la base
	$nom_du_serveur ="sql.free.fr";
	$nom_de_la_base ="kevin_forestier";
	$nom_utilisateur ="kevin.forestier";
	$passe ="uLNiX8hK";
	 
	//Variable de connexion � la base de donn�es
	mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
	 
	//V�rification d'acc�s � la base de donn�es
	mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de donn�es ");
	 
 
  //r�cup�ration des valeurs des champs:
  $nom = $_POST["Nom"] ;
  $prenom = $_POST["Prenom"] ;
  $classe = $_POST["Classe"] ;

 
  //cr�ation de la requ�te SQL:
  $sql = "INSERT  INTO Eleve (NomEleve, PrenomEleve, NumClasse)
          VALUES ( '$nom', '$prenom', '$classe' ) " ;
 
 
  //ex�cution de la requ�te SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
  //affichage des r�sultats, pour savoir si l'insertion a march�e:
  if($requete)
  {
    header('Location: Listeeleve.php');
  }
 ?>