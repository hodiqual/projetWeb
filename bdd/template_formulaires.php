<?php
/********* FONCTIONS VUE pour l'affichage des différents fomulaires *********/

// Entête
function entete_acceuil() {
	$entete = 
	'<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="UTF-8" />
		<title> Test bdd clasNsurf </title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="fic.js"></script>
	</head>
	
	<body>
	<h1> Site pour tester la bdd de <strong>clasNsurf</strong> </h1> ';
	return $entete;
}

// Formulaire pour se connecter
function formConnection() {
	$formConnection =
	'<h2>Se connecter</h2>
	<form method="GET" action="index.php">
		<input type="text" name="email" placeholder="Adresse mail" required/>
		<input type="password" name="mdp" placeholder="Mot de passe" required/>
		<button class="button" type="submit" name="choix" value="connection"> Valider </button>
	</form>';
return $formConnection;
}

// Formulaire pour s'inscrire
function formInscription() {
	$formInscription =
	'<h2>S\'inscrire</h2>
	<form method="GET" action="index.php">
		<input type="text" name="nom" placeholder="Nom" required/>
		<input type="text" name="prenom" placeholder="Prenom" required/>
		<input type="text" name="email" placeholder="Adresse mail" required/>
		<input type="password" name="mdp" placeholder="Mot de passe" required/>
		<h3>Avez-vous un véhicule ?</h3>
		<input type="text" name="marqueVeh" placeholder="Marque"/>
		<input type="text" name="modelVeh" placeholder="Modele"/>
		<input type="text" name="couleurVeh" placeholder="Couleur"/>
		<input type="file" name="photoVeh" placeholder="Votre fichier photo"/>
		<input type="text" name="nbrPlaces" placeholder="Nombre de places" required/>
		<input type="password" name="nbrPlanches" placeholder="Nombre de planches transportables" required/>
		<button class="button" type="submit" name="choix" value="inscription"> Valider </button>
	</form>';
return $formInscription;
}

// Pour visualiser toutes les sessions diponibles
function listeSessions() {
	$listeSessions =
	'<h2> Rechercher une session </h2>
	<form method="GET" action="index.php">
		<input type="date" name="dateAller" placeholder="Date"/>
		<button class="button" type="submit" name="choix" value="visualiserSessions"> Valider </button>
	</form>';
return $listeSessions;
}

// Entête de la page privée
function entete_privee() {
	$entete = 
	'<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="UTF-8" />
		<title> clasNsurf prive </title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="fic.js"></script>
	</head>
	
	<body>
	<h1> Page accessible qu\'aux inscrits <strong>clasNsurf</strong> </h1> ';
	return $entete;
}

// Formulaire pour participer à une session
function formParticipation() {
	$formParticipation =
	'<h2>Participer à une session</h2>
	<form method="GET" action="index.php">
		<select>
			<option> </option>
		</select>
		<button class="button" type="submit" name="choix" value="participation"> Participe </button>
	</form>';
return $formParticipation;
}

// Fin de page
function fin() {
	$fin =
	'</body>
	</html>';
return $fin;
}

?>
