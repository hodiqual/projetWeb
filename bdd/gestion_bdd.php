<?php
/************** FONCTIONS MODELE (gestion de la base de données) ***************/


// Pour se connecter à la base de données
function connectDb() {
	$dbHost = "localhost"; 						// serveur
	$dbName = "IESSA14_Hodiquet_Thomas"; 	// nom de la base
	$dbUser = "iessa"; 							// login de l'utilisateur
	$dbPwd = "iessa"; 							// pwd de l'utilisateur
	try {
	$connecteur = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
	} catch (PDOException $e)
	{
		echo "Connection à la base de données échouée : " .$e->getMessage();
		exit;
	}
	return $connecteur;
}

// Pour authentifier un internaute
function authentifier() {
	$dbh = connectDb(); 		// connexion à la bdd
	$sql = "SELECT * FROM Membre WHERE email = :email AND mdp = :mdp;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":email", $_REQUEST["email"], PDO::PARAM_STR);
	$sth->bindParam(":mdp", $_REQUEST["mdp"], PDO::PARAM_STR);
	$bool = $sth->execute();
	if ($result = $sth->fetch(PDO::FETCH_OBJ)) // on charge les paramètres de l'utilisateur
	{
		$_SESSION["noMem"] = $result->noMem;
		$_SESSION["nom"] = $result->nom;
		$_SESSION["prenom"] = $result->prenom;
		$_SESSION["avatar"] = $result->avatar;
		$_SESSION["email"] = $result->email;
	}
	else 
	{
		echo "Erreur d'authentification";
		session_destroy();
	}
	$sth->closeCursor(); 	// déconnexion de la bdd
	return $bool;
}

// Pour créer un nouveau membre
function setMembre() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "INSERT INTO Membre (nom, prenom, avatar, email, mdp) VALUES (:nom, :prenom, :avatar, :email, :mdp);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nom", $_REQUEST["nom"], PDO::PARAM_STR);
	$sth->bindParam(":prenom", $_REQUEST["prenom"], PDO::PARAM_STR);
	$sth->bindParam(":avatar", $_REQUEST["avatar"], PDO::PARAM_STR);
	$sth->bindParam(":email", $_REQUEST["email"], PDO::PARAM_STR);
	$sth->bindParam(":mdp", $_REQUEST["mdp"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche mésage d'érreur de la bdd 
	$dbh = null;							// déconnexion de la bdd					
}

// Pour modifier un membre (repéré par son noMem caché)
function updateMembre() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "UPDATE Membre SET nom=:nom, prenom=:prenom, avatar=:avatar, email=:email, mdp=:mdp WHERE noMem=:noMem;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nom", $_REQUEST["nom"], PDO::PARAM_STR);
	$sth->bindParam(":prenom", $_REQUEST["prenom"], PDO::PARAM_STR);
	$sth->bindParam(":avatar", $_REQUEST["avatar"], PDO::PARAM_STR);
	$sth->bindParam(":email", $_REQUEST["email"], PDO::PARAM_STR);
	$sth->bindParam(":mdp", $_REQUEST["mdp"], PDO::PARAM_STR);
	$sth->bindParam(":noMem", $_REQUEST["noMem"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche mésage d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour supprimer un membre (repéré par son noMem caché)
function deleteMembre() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "DELETE FROM Membre WHERE noMem=:noMem;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_REQUEST["noMem"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche mésage d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

function getListeSessions() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "SELECT nomSpot, dateAller, dateRetour, heureDep FROM SessionSurf WHERE dateAller >= :dateAller;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":dateAller", $_REQUEST["dateAller"], PDO::PARAM_STR);
	$sth->execute();
	while($result = $sth->fetch(PDO::FETCH_OBJ)) {
		echo $result->nomSpot ." ";
	}
	$dbh = null;							// déconnexion de la bdd
	return $result;
}	

function setVehicule() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "INSERT INTO Vehicule (nbrPlaces, nbrPlanches, marqueVeh, modeleVeh, couleurVeh, photoVeh) VALUES (:nbrPlaces, :nbrPlanches, :marqueVeh, :modeleVeh, :couleurVeh, :photoVeh);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nbrPlaces", $_REQUEST["nbrPlaces"], PDO::PARAM_STR);
	$sth->bindParam(":nbrPlanches", $_REQUEST["nbrPlanches"], PDO::PARAM_STR);
	$sth->bindParam(":marqueVeh", $_REQUEST["marqueVeh"], PDO::PARAM_STR);
	$sth->bindParam(":modeleVeh", $_REQUEST["modeleVeh"], PDO::PARAM_STR);
	$sth->bindParam(":couleurVeh", $_REQUEST["couleurVeh"], PDO::PARAM_STR);
	$sth->bindParam(":photoVeh", $_REQUEST["photoVeh"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche mésage d'érreur de la bdd 
	$dbh = null;							// déconnexion de la bdd					
}
