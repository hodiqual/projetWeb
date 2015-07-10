<?php
// Ce fichier contient les fonctions php

// aiguillage vers la bonne fonction en fonction du choix
if (isset($_REQUEST['choix'])) {
	switch ($_REQUEST['choix']) {
		case 'getImgSpot' : 
			getImgSpot($_REQUEST['idSpot']); 
			break;
		//case 'getTabClientJSon' : getTabClient(true); break;
		// insÈrer ici les autres cas...
	}
}

// ************** FONCTIONS APPELEES PAR AJAX

// Retrouve l'image correspondant au spot
function getImgSpot($idSpot) {
	$urlFichier='photo/'.$idSpot.'.jpg';  // constitue nom du fichier photo
	//$ret='<img src="'.$urlFichier.'" alt="" />';  // constitue contenu html <img .../>
	switch ($idSpot)
	{
		case 0 :
			$urlFichier = 'LACANAU';
			break;
		case 1 :
			$urlFichier = 'LA TORCHE';
			break;
		case 2 :
			$urlFichier = 'BISCAROSSE';
			break;	
	}

	$ret='<a href="#">'.$urlFichier.'</a>';
	echo $ret;
}

?>