<?php
/************** FONCTIONS MODELE (gestion de la base de données) ***************/

DEFINE ("dbHost", "127.0.0.1"); 				// nom du serveur
DEFINE ("dbName", "IESSA14_Hodiquet_Thomas");	// nom de la base
DEFINE ("dbUser", "shippable"); 					// login de l'utilisateur
DEFINE ("dbPwd", ""); 						// pwd de l'utilisateur

// Pour se connecter à la base de données
function connectDb() {
	try {
	$connecteur = new PDO("mysql:host=".dbHost.";dbname=".dbName, dbUser, dbPwd);
	} catch (PDOException $e)
	{
		echo "Connection à la base de données échouée : ".$e->getMessage();
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
		session_unset();
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
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null;							// déconnexion de la bdd					
}

// Pour modifier un membre (repéré par son noMem)
function updateMembre() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "UPDATE Membre SET nom=:nom, prenom=:prenom, avatar=:avatar, email=:email, mdp=:mdp WHERE noMem=:noMem;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nom", $_REQUEST["nom"], PDO::PARAM_STR);
	$sth->bindParam(":prenom", $_REQUEST["prenom"], PDO::PARAM_STR);
	$sth->bindParam(":avatar", $_REQUEST["avatar"], PDO::PARAM_STR);
	$sth->bindParam(":email", $_REQUEST["email"], PDO::PARAM_STR);
	$sth->bindParam(":mdp", $_REQUEST["mdp"], PDO::PARAM_STR);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour supprimer un membre (repéré par son noMem)
function deleteMembre() {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "DELETE FROM Membre WHERE noMem = :noMem;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour obtenir la liste des sessions de surf disponibles
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

// Pour ajouter un véhicule
function setVehicule() {
	$dbh = connectDb(); 										// connexion à la bdd
	$sql = "INSERT INTO Vehicule (nbrPlaces, nbrPlanches, marqueVeh, modeleVeh, couleurVeh, photoVeh) VALUES (:nbrPlaces, :nbrPlanches, :marqueVeh, :modeleVeh, :couleurVeh, :photoVeh);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nbrPlaces", $_REQUEST["nbrPlaces"], PDO::PARAM_STR);
	$sth->bindParam(":nbrPlanches", $_REQUEST["nbrPlanches"], PDO::PARAM_STR);
	$sth->bindParam(":marqueVeh", $_REQUEST["marqueVeh"], PDO::PARAM_STR);
	$sth->bindParam(":modeleVeh", $_REQUEST["modeleVeh"], PDO::PARAM_STR);
	$sth->bindParam(":couleurVeh", $_REQUEST["couleurVeh"], PDO::PARAM_STR);
	$sth->bindParam(":photoVeh", $_REQUEST["photoVeh"], PDO::PARAM_STR);
	if ($sth->execute() == 0) {
		print($dbh->errorInfo()); 							// affiche message d'érreur de la bdd
	} else setPossede($dbh->lastInsertId(), $dbh);	// création d'un Possede
	$dbh = null;												// déconnexion de la bdd					
}

// Pour supprimer un véhicule
function deleteVehicule($noVeh) {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "DELETE FROM Vehicule WHERE noVeh = :noVeh;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noVeh", $noVeh, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour ajouter une classe Possede
function setPossede($noVeh, $dbh) {
	$sql = "INSERT INTO Possede VALUES (:noMem, :noVeh);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	$sth->bindParam(":noVeh", $noVeh, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd 				
}

// Pour ajouter une session de surf
function setSessionSurf() {
	$dbh = connectDb(); 				// connexion à la bdd
	$sql = "INSERT INTO SessionSurf (nomSpot, dateAller, dateRetour, lieuDep) VALUES (:nomSpot, :dateAller, :dateRetour, :lieuDep);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":nomSpot", $_REQUEST["nomSpot"], PDO::PARAM_STR);
	$sth->bindParam(":dateAller", $_REQUEST["dateAller"], PDO::PARAM_STR);
	$sth->bindParam(":dateRetour", $_REQUEST["dateRetour"], PDO::PARAM_STR);
	$sth->bindParam(":lieuDep", $_REQUEST["lieuDep"], PDO::PARAM_STR);
	if ($sth->execute() == 0) {
		print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd
	}
	else {
		$noSes = $dbh->lastInsertId();
		setPropose($noSes, $dbh);	// création d'un Propose
	}
	$dbh = null;						// déconnexion de la bdd
	setParticipe($noSes);			// celui qui propose une session y participe					
}

// Pour supprimer une sessionSurf
function deleteSessionSurf($noSes) {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "DELETE FROM SessionSurf WHERE noSes = :noSes;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour ajouter une classe Propose
function setPropose($noSes, $dbh) {
	$sql = "INSERT INTO Propose VALUES (:noMem, :noSes);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd 				
}

// Pour ajouter une classe Participe
function setParticipe($noSes) {
	$dbh = connectDb();				// connexion à la bdd
	$sql = "INSERT INTO Propose VALUES (:noMem, :noSes);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd 
	$dbh = null;						// déconnexion de la bdd			
}

// Pour supprimer une participation
function deleteParticipe($noSes) {
	$dbh = connectDb(); 					// connexion à la bdd
	$sql = "DELETE FROM Participe WHERE noMem = :noMem AND noSes = :noSes;";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noMem", $_SESSION["noMem"], PDO::PARAM_STR);
	$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 		// affiche message d'érreur de la bdd 
	$dbh = null; 							// déconnexion de la bdd
}

// Pour ajouter un vehiculeSessionSurf
function setVehiculeSessionSurf($noVeh, $noSes) {
	$dbh = connectDb();				// connexion à la bdd
	$sql = "INSERT INTO VehiculeSessionSurf VALUES (:noVeh, :noSes, :nbrPlacesDispo, :nbrPlanchesDispo);";
	$sth = $dbh->prepare($sql);
	$sth->bindParam(":noVeh", $noVeh, PDO::PARAM_STR);
	$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
	$sth->bindParam(":nbrPlacesDispo", $_REQUEST["nbrPlacesDispo"], PDO::PARAM_STR);
	$sth->bindParam(":nbrPlanchesDispo", $_REQUEST["nbrPlanchesDispo"], PDO::PARAM_STR);
	if ($sth->execute() == 0)
		print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd 
	$dbh = null;						// déconnexion de la bdd			
}

?>
