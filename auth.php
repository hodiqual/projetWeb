<?php
/*
* Contact Form Class
*/
session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');


class Auth_Form{
	function __construct($details){
		
		$this->mdp = stripslashes($details['mdp']);
		$this->email = trim($details['email']);
		
		$this->response_status = 1;
		$this->response_html = '';
	}
	
	private function validateEmail(){
		$regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
	
		if($this->email == '') {
			return false;
		} else {
			$string = preg_replace($regex, '', $this->email);
		}
	
		return empty($string) ? true : false;
	}

	private function validateFields(){
		// Check mdp
		if(!$this->mdp)
		{
			$this->response_html .= '<p>Saisir mot de passe</p>';
			$this->response_status = 0;
		}

		// Check email
		if(!$this->email)
		{
			$this->response_html .= '<p>Saisir e-mail</p>';
			$this->response_status = 0;
		}
		
		// Check valid email
		if($this->email && !$this->validateEmail())
		{
			$this->response_html .= '<p>Saisir un e-mail valide</p>';
			$this->response_status = 0;
		}
	}
	
	private function authentification(){
		//TODO Faire enregistrement en base et tester le retour connection
		require_once 'modele/Membre.php';
		$manager = new MembresManager(null);
		$membre = $manager->authentifier($this->email, $this->mdp);
		
		
		if($membre)
		{
			$manager->chargerVehicule($membre);
			$_SESSION['Membre'] = $membre;
			$this->response_status = 1;
			$this->response_html = '<div class="info-block"><div class="info-text"><p>Identifié: Cool '.$membre->prenom().', prêt pour une session ...</p></div></div>';
		}
		else
		{
			session_unset();
			session_destroy();
			$this->response_status = 0;
			$this->response_html = '<p>Pas Cool, email inconnu ou mot de passe invalide.</p>';			
		}
	}

	function sendRequest(){
		$this->validateFields();
		
		if($this->response_status)
		{
			$this->authentification();
		}

		$response = array();
		$response['status'] = $this->response_status;	
		$response['html'] = $this->response_html;
		
		echo json_encode($response);
	}
}


/*$response = array();
$response['status'] = 0;
if ($_REQUEST['choix']=='connection')
	$response['html'] = '<p>APPEL OK CONNECTION</p>';
else
	$response['html'] = '<p>APPEL OK DECONNECTION</p>';
echo json_encode($response);*/

if ($_REQUEST['choix']=='deconnection')		
{
			session_unset();
			session_destroy();
			$response['status'] = 1;
			$response['html'] = '<div class="info-block"><div class="info-text"><p>Deconnecté...</p></div></div>';	
			echo json_encode($response);
}
else
{
	$auth_form = new Auth_Form($_REQUEST);
	$auth_form->sendRequest();
}


?>