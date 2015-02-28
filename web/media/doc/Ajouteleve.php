<?php
	//On déclare les variables pour pouvoir se connecter à la base
	$nom_du_serveur ="sql.free.fr";
	$nom_de_la_base ="kevin_forestier";
	$nom_utilisateur ="kevin.forestier";
	$passe ="uLNiX8hK";
	 
	//Variable de connexion à la base de données
	mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
	 
	//Vérification d'accès à la base de données
	mysql_select_db("$nom_de_la_base") or die("Impossible d'ouvrir la base de données ");
	 
 
  //récupération des valeurs des champs:
  $nom = $_POST["Nom"] ;
  $prenom = $_POST["Prenom"] ;
  $classe = $_POST["Classe"] ;

 
  //création de la requête SQL:
  $sql = "INSERT  INTO Eleve (NomEleve, PrenomEleve, NumClasse)
          VALUES ( '$nom', '$prenom', '$classe' ) " ;
 
 
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
  //affichage des résultats, pour savoir si l'insertion a marchée:
  if($requete)
  {
    header('Location: Listeeleve.php');
  }
 ?>