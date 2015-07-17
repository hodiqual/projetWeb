// Fichier javascript (JQuery) utilisÈ par monsite.com

// fonction exÈcutÈe automatiquement au chargement de la page dans le navigateur 
// initialisation du comportement dynamique gÈrÈ en javascript
// on associe ici ÈlÈment-ÈvÈnement-appel de fonction js
$(document).ready(function() {     // alert( "ready" );
     
	console.log("DEBUG DANS READY");
	if ( $( "#idSpot" ).length ) {
		// initialisations des captures d'evenements javascript
		$("#idSpot").get(0).selectedIndex = 0; // positionne le select sur le premier <option>
		afficherPhoto($("#idSpot"));     // affiche la photo du premier <option>
		console.log("DEBUG DANS READY-IF");
		// associe l'event chagement d'option au rechrgt de la photo
		$("#idSpot").change(function(){	afficherPhoto($(this));});  //$(this) permet de rÈcupÈrer en para l'objet select particulier sur lequel survient le changement	
	}	
	
	$(".fancybox-conn_profil").fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		afterLoad   : function() {
			console.log("DEBUG fancybox");
			this.inner.prepend( '<h4>1. My custom title</h4>' );
			this.content = '<h4>2. My custom title</h4>' + this.content.html();
		}
	});
	
	// gestion de l'affichage du tab des clients
	//$("#entete").mouseover(function(){ afficherTableauClient();});  
	//$("#entete").mouseleave(function(){ $("#zone3").empty(); });  

});	  


// fonction permettant de recupÈrer puis d'afficher la photo du contact selectionne
// parametres : 
// 1->element select qui a dÈclenche l'appel (sur change) 
function afficherPhoto(sel) {  //alert('afficherPhoto');
	console.log("DEBUG APPEL AFFICHE PHOTO");
   $.ajax({
		type:"get",
		url:'fonctions.php',   // script php appelÈ
		data: 'choix=getImgSpot&idSpot='+sel.val(),  // parametres passes a ce script (reÁu  dans $_REQUEST)
		success:function(reponse){  // recup dans reponse du echo fait par la fonction getImg
			$("#photoSpot").html(reponse);   // envoi la rÈponse dans la div photo => maj photo sur la page 
		},
		error:function(){ alert("erreur serveur lors de la recuperation de la photo");}
	});	   
}

$(".fancybox-open").fancybox({
	openEffect  : 'none',
	closeEffect : 'none',
	afterLoad   : function() {
		this.inner.prepend( '<h1>1. My custom title</h1>' );
		this.content = '<h1>2. My custom title</h1>' + this.content.html();
	}
});


/*

function afficherTableauClient() { 
   $.ajax({
		type:"get",
		url:'fonctions.php',   // script php appelÈ
		data: 'choix=getTabClientJSon',  
		success:function(reponse){  // recup dans reponse du echo fait par la fonction getTabClient

			//alert(reponse);	
			// transformation chaine de car en objet JSon (tab ‡ 2 dimensions)
			var jsonobj = eval("(" + reponse + ")");
			
			var out = "<table>";
			// constitution du tableau html ‡ afficher
			for(var i=0; i<jsonobj.length; i++) {
					obj = jsonobj[i];
					out += "<tr><td>" +	obj.id +
							"</td><td>" + obj.nom +
							"</td><td>" + obj.mail +
							"</td></tr>";		
			}
			out += "</table>";
			
			$("#zone3").html(out); // affichage du tableau dans la div id=zone3	
		},
		error:function(){ alert("erreur serveur lors de la recuperation du tableau client");}
	});	   
}

*/
