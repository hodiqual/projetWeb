<?php
	include "modele/Membre.php";
	include "modele/createur.php";
	include "modele/spot.php";
	include "modele/SessionSurf.php";
	include "template.php";
	session_start();
	
	if (isset($_REQUEST['choix'])) {
		switch ($_REQUEST['choix']) {
			case 'session-inscription':
				require_once 'participe.php';
				$participe_form = new Participe_Form($_REQUEST);
				$participe_form->sendRequest();
				break;
			default:
				;
		}
	}
	else
	{	
		ecrireHead();
		ecrireSlider();
		ecrireNav();
		ecrireJeChercheSection();
		ecrireJeProposeSection();
		// section CV
		$tabCreateur = Createur::getCreateurArray();
		ecrireCreateurs($tabCreateur);
		// fin section CV
	
		ecrireFooter();
	}
?>