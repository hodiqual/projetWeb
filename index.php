<?php
	include "modele/Membre.php";
	include "modele/createur.php";
	include "modele/spot.php";
	include "modele/SessionSurf.php";
	include "template.php";
	session_start();
	
	/*header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');*/
	
	if (isset($_REQUEST['choix'])) {
		switch ($_REQUEST['choix']) {
			case 'session-inscription':
				require_once 'participe.php';
				$participe_form = new Participe_Form($_REQUEST);
				$participe_form->sendRequest();
				break;
			case 'je_propose':
				require_once 'propose.php';
					$propose_form = new Propose_Form($_REQUEST);
					$propose_form->sendRequest();
				break;
			case 'connection':
				require_once 'auth.php';
					$auth_form = new Auth_Form($_REQUEST);
					$auth_form->sendRequest();
				break; 
			case 'deconnection':
					require_once 'auth.php';
					deconnect();
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