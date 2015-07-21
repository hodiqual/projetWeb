<?php
require_once 'template.php';
session_start();
ecrireHead();
?>

<div id="conn_profil"> <?php //TODO style="display: none; width: 300px;" ?>
					<div class="tabbable">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#connection" data-toggle="tab">Connexion</a></li>
			<li <?php if (isset($_SESSION['Membre'])) {echo 'style="display:none"';}?>>
				<a href="#profil" data-toggle="tab">Inscription</a></li>
			<li style="display: none;"><a href="#deconnection" data-toggle="tab">Deconnection</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="connection">
					<?php require_once 'template.php';
					      ecrireConnexionForm(); 
					 ?>
			</div>
			<div class="tab-pane fade in" id="profil">
					<?php require_once 'template.php';
					      ecrireInscriptionForm(); 
					 ?>
			</div>
		</div>
	</div>
</div>

<?php 
require_once 'template.php';
ecrireScript(); ?>
<script type="text/javascript">
$(document).ready(function(){

	console.log('DEBUG charge le script');
	
$("#connexion_submit").click(function(){
	console.log('DEBUG connexion_submit la ca marche');
	
	$auth_form = $('#connexion-form');
	var fields = $auth_form.serialize();
	
	$.ajax({
		type: "GET",
		url: "auth.php",
		data: fields,
		dataType: 'json',
		success: function(response) {
			console.log('DEBUG propose_submit SUCCESS');
			if(response.status){
				$('#connexion-form input').val('');
				$('#conn_profil').empty().html(response.html);
			}
			else
				$('#connexion-response').empty().html(response.html);
		}
	});
	
	console.log('DEBUG  connexion_submit ca marche jusqua la fin');
	});

$("#inscription_submit").click(function(){
	console.log('DEBUG inscription_submit la ca marche');
	
	$auth_form = $('#inscription-form');
	var fields = $auth_form.serialize();
	
	$.ajax({
		type: "GET",
		url: "inscription.php",
		data: fields,
		dataType: 'json',
		success: function(response) {
			console.log('DEBUG inscription_submit SUCCESS');
			if(response.status){
				$('#inscription-form input').val('');
				$('#conn_profil').empty().html(response.html);
			}
			else
				$('#inscription-response').empty().html(response.html);
		}
	});
	
	console.log('DEBUG  inscription_submit ca marche jusqua la fin');
	});

});
</script>
<?php 
ecrireFermeturePage();
?>
