<?php
/*
* Contact Form Class
*/
//session_start();

/*header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');*/


class Inscription_Form{
	function __construct($details){
		
		$this->mdp = stripslashes($details['mdp']);
		$this->email = trim($details['email']);
		$this->nom = trim($details['nom']);
		$this->prenom = trim($details['prenom']);
		$this->marqueVeh = trim($details['marqueVeh']);
		$this->modeleVeh = trim($details['modeleVeh']);
		$this->couleurVeh = trim($details['couleurVeh']);
		$this->nbrPlaces = (int)$details['nbrPlaces'];
		$this->nbrPlanches = (int)$details['nbrPlanches'];
		
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
		}else //Check if email est dispo
		{
			require_once 'modele/Membre.php';
			$manager = new MembresManager(null);
			if(!$manager->checkEmailDispo($this->email))
			{
				$this->response_html .= '<p>Email déjà existant pour un autre utilisateur.</p>';
				$this->response_status = 0;
			}
		}
		
		if(strlen($this->marqueVeh) > 0)
		{
			if ( (strlen($this->modeleVeh) <= 0) || (strlen($this->couleurVeh) <= 0) || !is_int($this->nbrPlaces) || !is_int($this->nbrPlaces) )
			{
				$this->response_html .= '<p>Si la marque est renseignée, bien renseignée tous les champs concernant le véhicule.</p>';
				$this->response_status = 0;
			}
			
		}
			
	}
	
	private function enregistrement(){
		require_once 'modele/Membre.php';
		$donneesMembre = array();
		$donneesMembre['prenom'] = $this->prenom;
		$donneesMembre['nom'] = $this->nom;
		$donneesMembre['mdp'] = $this->mdp;
		$donneesMembre['email'] = $this->email;
		$membre = new Membre($donneesMembre);
		
		$manager = new MembresManager(null);
		$manager->sauvegarder($membre);
		

		if (strlen($this->marqueVeh)>0) {
			require_once 'modele/Vehicule.php';
			$donneesVeh = array();
			$donneesVeh['marqueVeh'] = $this->marqueVeh;
			$donneesVeh['modeleVeh'] = $this->modeleVeh;
			$donneesVeh['couleurVeh'] = $this->couleurVeh;
			$donneesVeh['nbrPlaces'] = $this->nbrPlaces;
			$donneesVeh['nbrPlanches'] = $this->nbrPlanches;
			$vehicule = new Vehicule($donneesVeh);
			$managerVeh = new VehiculesManager(null);
			$managerVeh->sauvegarder($vehicule,$membre->noMem());
		}
		
		if($membre)
		{
			$manager->chargerVehicule($membre);
			$_SESSION['Membre'] = $membre;
			$this->response_status = 1;
			$this->response_html = '<p>Identifié: Cool '.$membre->prenom().', prêt pour une session ...</p>';
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
			$this->enregistrement();
		}

		$response = array();
		$response['status'] = $this->response_status;	
		$response['html'] = '<div class="info-block"><div class="info-text" style="color:red">'.$this->response_html.'</div></div>';
		
		echo json_encode($response);
	}
}

/*
$insc_form = new Inscription_Form($_REQUEST);
$insc_form->sendRequest();
*/



?>