<?php
	include "modele/Membre.php";
	include "modele/createur.php";
	include "modele/spot.php";
	include "modele/SessionSurf.php";
	include "template.php";
	session_start();
	ecrireHead();
	ecrireSlider();
	ecrireNav();
	ecrireJeChercheSection();
?>


<!-- Je propose Section -->
<div id="propose" class="page-alternate">
	<div class="container">
		<!-- Title Page -->
		<div class="row">
			<div class="span12">
				<div class="title-page">
					<h2 class="title">Je propose</h2>
					<h3 class="title-description">Tu sens qu'un spot va capter la
						houle, partage ta session avec les potes de glisse.</h3>
				</div>
			</div>
		</div>
		<!-- End Title Page -->

		<!-- Contact Form -->
		<div class="row">
			<div class="span9">
				<form id="propose-form" class="contact-form" action="#">
					<p class="contact-name">
						Spot: <select id="idSpot" name="idSpot">
            			<?php
								require_once("./modele/spot.php");
								$spotsManager = new SpotsManager(null);
								$spots = $spotsManager->getAll();
								foreach($spots as $spot)
								{
									echo '<option value="'.$spot->nomSpot().'">'.$spot->nomSpot().'</option>';
								}
						?>
            		</select>
					</p>
					<p class="contact-name">
						Aller: <input id="propose-dateAller" type="date"
							placeholder="Full Name" value="" name="dateAller" /> <input
							id="propose-heureAller" type="time" placeholder="18:00" value=""
							name="heureAller" />
					</p>
					<p class="contact-name">
						Retour: <input id="propose-dateRetour" type="date"
							placeholder="Full Name" value="" name="dateRetour" />
					</p>

					<p class="contact-submit">
						<a id="propose_submit" class="button" href="#propose">Je Propose</a>
					</p>

					<div id="propose-response"></div>
				</form>

			</div>

			<div class="span3">
				<div class="contact-details">
					<h3>INFOS SPOT</h3>
					<ul id="photoSpot">
					</ul>
				</div>
			</div>
		</div>
		<!-- End Contact Form -->
	</div>
</div>
<!-- End Je propose Section -->


<?php
	// section CV
	$tabCreateur = Createur::getCreateurArray();
	ecrireCreateurs($tabCreateur);
	// fin section CV

	ecrireFooter();
?>