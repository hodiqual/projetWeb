<?php
require_once 'modele/Membre.php';
//session_start();

class Participe_Form{
	function __construct($details){
		
		$this->noSes = (int) $details['noSes'];
		$this->avecPlanche = array_key_exists('avecPlanche', $details) ? true : false;
		$this->noVeh = (int) $details['noVeh'];
		$this->nbrPlacesDispo = (int) trim($details['nbrPlacesDispo']);
		$this->nbrPlanchesDispo = (int) trim($details['nbrPlanchesDispo']);
		
		$this->response_status = 1;
		$this->response_html = '';
	}

	private function validateFields(){
		// Check SessionId
		if(!$this->noSes)
		{
			$this->response_html .= '<p>Probleme sur le noSes.</p>';
			$this->response_status = 0;
		}

		// Check avecPlanche
		if(!is_bool($this->avecPlanche))
		{
			$this->response_html .= '<p>Probleme sur le checkbox avec planche.</p>';
			$this->response_status = 0;
		}
		
	}
	
	private function checkAuth() {
		if (!isset($_SESSION['Membre'])) {
			$this->response_html .= '<p>Il faut être connecté.</p>';
			$this->response_status = 0;
		}
	}
	
	private function enregistrement(){
		//TODO Faire enregistrement en base et tester le retour connection
		require_once 'modele/Membre.php';
		require_once 'modele/SessionSurf.php';
		$manager = new SessionSurfsManager(null);
		$sessionSurf = $manager->loadComplet($this->noSes);
		
		//Si propose pas de vehicule on verifie le nombre de place disponible
		if ($this->noVeh == -1) {
			//echo ' DEBUG participe.php dispototal '.$sessionSurf->nbPlacesTotal().' ';
			if(!($sessionSurf->disponibilitePlace()))
			{
				//echo ' DEBUG participe.php boolPlace '.$sessionSurf->disponibilitePlace().' ';
				$this->response_html .= '<p>Pas de place disponible dans les vehicules, vous pouvez proposer un vehicule.</p>';
				$this->response_status = 0;
			}
			
			if($this->avecPlanche && !$sessionSurf->disponibilitePlacePlanche())
			{
				$this->response_html .= '<p>Pas de place disponible pour ta planche, tu peux louer sur-place.</p>';
				$this->response_status = 0;
			}	
		}
		
		if($this->response_status)
		{
			require_once 'modele/Membre.php';
			$membre = $_SESSION['Membre'];
			$manager->ajoutParticipant($sessionSurf, $membre->noMem(), $this->avecPlanche);
			$this->response_status = 1;
			$this->response_html = '<p>Cool '.$_SESSION['Membre']->prenom().', inscris dans ton agenda:</p>';
			$dateAllerObj = new DateTime($sessionSurf->dateAller());
			$this->response_html .= '<p>RDV: '.$sessionSurf->lieuDep().' pour '.$sessionSurf->spot()->nomSpot().' le '.$dateAllerObj->format('d/m/Y à H:m').'</p>';
		}
	}

	function sendRequest(){
		
		$this->checkAuth();
		
		if($this->response_status)
		{
			$this->validateFields();	
		}
		
		if($this->response_status)
		{
			$this->enregistrement();
		}

		$response = array();
		$response['status'] = $this->response_status;	
		$response['html'] = $this->response_html;
		$response['tick'] = '';
		
		//echo json_encode($response);
		
		echo $this->response_html;

		
	}
}


//$participe_form = new Participe_Form($_REQUEST);
//$participe_form->sendRequest();

?>