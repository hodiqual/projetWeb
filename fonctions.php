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
	require_once("./modele/spot.php");
	$spotsManager = new SpotsManager(null);
	$spot = $spotsManager->getAll()[$idSpot];
	echo '<li>'.$spot->urlGoogleMap().'</li>';
	?>
	<li><div id="previsions_fsi_gratuites"></div></li>
	<script type="text/javascript">
	<!--
	var _fsi = _fsi || [];
	var _config = {};
	
	// début variables modifiables
	_config.target = 'previsions_fsi_gratuites'; // id de l'élément ou la réponse sera affichée automatiquement
	_config.callback = function(response){
		// traitement de la réponse
	};
	// fin variables modifiables
	
	// NE PAS MODIFIER
	_fsi.push([
			_config,
			['_setAuthCode', '9JJx-ULjHH-zrNM'],
			['_setSpot', '<?php echo $spot->idFSI() ?>'],
			['_setTypeExport', 'W_300'],
			['_showAll', false]
	]);
	
	(function() {
		var fsip = document.createElement('script'); fsip.type = 'text/javascript'; fsip.async = true;
		fsip.src = 'http://www.francesurfinfo.com/affiliation/js/fsip_free_builder.php?iFsi='+_fsi.length;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fsip, s);
	})();
	// -->
	</script>
<?php
}
?>

