// Fichier javascript (JQuery) utilisÈ par monsite.com

// fonction exÈcutÈe automatiquement au chargement de la page dans le navigateur 
// initialisation du comportement dynamique gÈrÈ en javascript
// on associe ici ÈlÈment-ÈvÈnement-appel de fonction js
$(document).ready(function() {     // alert( "ready" );
     
	console.log("DEBUG DANS READY");
	if ( $( "#nomSpot" ).length ) {
		// initialisations des captures d'evenements javascript
		$("#nomSpot").get(0).selectedIndex = 0; // positionne le select sur le premier <option>
		afficherPhoto($("#nomSpot"));     // affiche la photo du premier <option>
		console.log("DEBUG DANS READY-IF");
		// associe l'event chagement d'option au rechrgt de la photo
		$("#nomSpot").change(function(){	afficherPhoto($(this));});  //$(this) permet de rÈcupÈrer en para l'objet select particulier sur lequel survient le changement	
	}	
	
	/*$(".fancybox-conn_profil").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		afterLoad   : function() {
			console.log("DEBUG fancybox");
			this.inner.prepend( '<h4>1. My custom title</h4>' );
			this.content = '<h4>2. My custom title</h4>' + this.content.html();
		}
	});*/
	
	$(".fancybox-conn_profil").fancybox({ 			
		'hideOnContentClick'		: true,
		'padding'			: 0,
		'overlayColor'			:'#D3D3D3',
		'transitionIn'			:'elastic',
		'transitionOut'			:'elastic',
		'overlayOpacity'		: 0.7,
		'zoomSpeedIn'			: 300,
		'zoomSpeedOut'			: 300,
		'width'				: 950,
		'height'			: 400,
		'type'				:'iframe',
		'afterClose' : function() {
	        location.reload();
	        return;
	    }
		});
	
	$(".fancybox-session").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() {
		    $("#login_error").hide();
		}
	});
	
	$(".session-inscription").bind("submit", function() {
		console.log("DEBUG PROUT");

		//$(this).serializeArray()
		console.log("DEBUG APRES SERIALIZE");
		
		$.ajax({
			type		: "GET",
			cache	: false,
			url		: "index.php?choix=participe",
			data		: $(this).serializeArray(),
			success: function(data) {
				console.log("DEBUG SUCCESS STORY");
				$.fancybox(data);
			},
			error:function(){ console.log("DEBUG ERROR STORY") }
		});

		console.log("DEBUG NOT A SUCCESS STORY");
		return false;
	});
	
	$("#propose_submit").click(function(){
		console.log('DEBUG propose_submit la ca marche');
		
		$contact_form = $('#propose-form');
		var fields = $contact_form.serialize();
		
		$.ajax({
			type: "GET",
			url: "propose.php",
			data: fields,
			dataType: 'json',
			success: function(response) {
				console.log('DEBUG propose_submit SUCCESS');
				if(response.status){
					$('#propose-form input').val('');
					//$('#cherche').append(response.JeChercheSection);
					//BRUSHED.filter();
				}
				
				$('#propose-response').empty().html(response.html);
			}
		});
		
		console.log('DEBUG  propose_submitla ca marche jusqua la fin');
		});

});	  


// fonction permettant de recupÈrer puis d'afficher les infos et les previsions du spot
function afficherPhoto(sel) {  //alert('afficherPhoto');
	console.log("DEBUG APPEL AFFICHE PHOTO");
   $.ajax({
		type:"get",
		url:'fonctions.php',   // script php appelÈ
		data: 'choix=getImgSpot&idSpot='+sel.val(),  // parametres passes a ce script (reÁu  dans $_REQUEST)
		success:function(reponse){  // recup dans reponse du echo fait par la fonction getImg
			$("#photoSpot").html(reponse);   // envoi la rÈponse dans la div photo => maj photo sur la page 
		},
		error:function(){ alert("erreur serveur lors de la recuperation des infos");}
	});	   
}

