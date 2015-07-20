<?php
require_once 'modele/Membre.php';
require_once 'modele/SessionSurf.php';
session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$admin_email = 'your@yourdomain.com'; // Your Email
$message_min_length = 5; // Min Message Length


class Propose_Form{
	function __construct($details){
		
		/*$this->name = stripslashes($details['name']);
		$this->email = trim($details['email']);
		$this->subject = 'Contact from Your Website'; // Subject 
		$this->message = stripslashes($details['message']);
	
		$this->email_admin = $email_admin;
		$this->message_min_length = $message_min_length; */
		
		$this->response_status = 1;
		$this->response_html = '';
		$this->proposition = array();
		$this->proposition = $details;
	}

	private function validateFields(){
		if(!$this->proposition)
		{
			$this->response_html .= '<p style="color:red">Proposition Unset</p>';
			$this->response_status = 0;
		}
		
		if (!isset($this->proposition['nomSpot'])) 
		{
			$this->response_html .= '<p style="color:red">Manque le Spot - Bizarre</p>';
			$this->response_status = 0;
		}
		

		if (strlen($this->proposition['lieuDep'])==0)
		{
			$this->response_html .= '<p style="color:red">Saisir le lieu de départ.</p>';
			$this->response_status = 0;
		}
		
		if (!isset($this->proposition['dateAller'])) 
		{
			$this->response_html .= '<p style="color:red">Saisir date aller.</p>';
			$this->response_status = 0;
		}else if (!isset($this->proposition['heureAller']))
		{
			$this->response_html .= '<p style="color:red">Saisir heure aller.</p>';
			$this->response_status = 0;
		}else
		{
			$this->proposition['dateAller'] = date('Y-m-d G:i:s',strtotime($this->proposition['dateAller'].' '.$this->proposition['heureAller']));	
		
			$dateAtester = new DateTime($this->proposition['dateAller']);
			if ($dateAtester<=date_add(date_create(), new DateInterval('P1D'))) {
				$this->response_status = 0;
				$this->response_html .= '<p style="color:red">Saisir une date posterieure à la date du jour</p>';
			}
		}
		
		if (!isset($this->proposition['dateRetour']) )
		{
			$this->response_html .= '<p style="color:red">Saisir date retour</p>';
			$this->response_status = 0;
		} else 
		{
			$this->proposition['dateRetour'] = date('Y-m-d G:i:s',strtotime($this->proposition['dateRetour']));	
	
			if (isset($this->proposition['dateAller'])) {
				$dateAllerObj = new DateTime($this->proposition['dateAller']);
				$dateRetourObj = new DateTime($this->proposition['dateRetour']);
				if ($dateAllerObj>$dateRetourObj) {
					$this->response_html .= '<p style="color:red">Saisir date retour postérieure à la date de départ</p>';
					$this->response_status = 0;
				}
			}
		}
		
		if ($this->proposition['noVeh']>-1) {
			if ($this->proposition['nbrPlacesDispo']<=0) {
				$this->response_html .= '<p style="color:red">Saisir nombre de places dispo supérieur à 0</p>';
				$this->response_status = 0;
			}

			if ($this->proposition['nbrPlanchesDispo']<=0) {
				$this->response_html .= '<p style="color:red">Saisir nombre de places pour les planches dispo supérieur à 0</p>';
				$this->response_status = 0;
			}
		}
	}
	
	private function enregistrerSession(){
		require_once 'modele/SessionSurf.php';
		require_once 'modele/Membre.php';
		$sessionSurf = new SessionSurf($this->proposition);
		$sessionSurf->setOrganisateur($_SESSION['Membre']);
		$manager = new SessionSurfsManager(null);
		$manager->ajoutSession($sessionSurf,$this->proposition['nomSpot'],$this->proposition['noVeh'],$this->proposition['nbrPlacesDispo'],$this->proposition['nbrPlanchesDispo']);
		$this->response_status = 1;
		$this->response_html = '<p>Ok, Proposition enregistrée! RAJOUTER LE VEHICULE ET NB PLACE DISPO</p>';
	
		
		//$date = preg_replace( "/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/i", "$3-$2-$1", $_POST['date']);
		//$sql = "INSERT INTO blog SET date=now()";
	}

	function sendRequest(){
		$this->validateFields();
		
		if($this->response_status)
		{
			$this->enregistrerSession();
		}

		$response = array();
		$response['status'] = $this->response_status;	
		$response['html'] = $this->response_html;
		
		echo json_encode($response);
	}
}


$propose_form = new Propose_Form($_REQUEST);
$propose_form->sendRequest();

?>