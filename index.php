<?php
	include "modele/Membre.php";
	include "modele/createur.php";
	include "modele/spot.php";
	include "modele/SessionSurf.php";
	include "template.php";
	session_start();
	ecrireHead();
	ecrireSlider();
	ecrireNav();
	ecrireJeChercheSection();
	ecrireJeProposeSection();
?>





<?php
	// section CV
	$tabCreateur = Createur::getCreateurArray();
	ecrireCreateurs($tabCreateur);
	// fin section CV

	ecrireFooter();
?>