<?php
/*
* Contact Form Class
*/


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
		// Check dateAller
		if(!$this->proposition)
		{
			$this->response_html .= '<p>Proposition Unset</p>';
			$this->response_status = 0;
		}
	}
	
	private function enregistrerSession(){
		//TODO Faire enregistrement en base et tester le retour connection 
		if($this->proposition)
		{
			$this->response_status = 1;
			$this->response_html = '<p>Ok, Proposition enregistrée! RAJOUTER LE VEHICULE ET NB PLACE DISPO</p>';
		}
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