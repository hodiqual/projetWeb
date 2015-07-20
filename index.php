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
?>

<!-- Je cherche Section -->
<div id="cherche" class="page">
	<div class="container">
		<!-- Title Page -->
		<div class="row">
			<div class="span12">
				<div class="title-page">
					<h2 class="title">Je cherche une session</h2>
					<h3 class="title-description">Rejoignez une équipe de glisse.</h3>
				</div>
			</div>
		</div>
		<!-- End Title Page -->

		<!-- Portfolio Projects -->
		<div class="row">
			<div class="span3">
				<!-- Filter -->
				<nav id="options" class="work-nav">
					<ul id="filters" class="option-set" data-option-key="filter">
						<li class="type-work">Les Spots</li>
						<li><a href="#filter" data-option-value="*" class="selected">Tous
								les spots</a></li>
            			<?php
								require_once("./modele/spot.php");
								$spotsManager = new SpotsManager(null);
								$spots = $spotsManager->getAll();
								foreach($spots as $spot)
								{
									echo '<li><a href="#filter" data-option-value=".'.str_replace(' ','',strtolower($spot->nomSpot())).'">'.$spot->nomSpot().'</a></li>';
								}
						?>
                    </ul>
				</nav>
				<!-- End Filter -->
			</div>

			<div class="span9">
				<div class="row">
					<section id="projects">
						<ul id="thumbs">
                    		<?php 
                    			$managerSessionSurf = new SessionSurfsManager(null);
                    			$allSessionsSurfs = $managerSessionSurf->getAll();
                    			foreach ($allSessionsSurfs as $sessionsurf) {
                    				$session_title = $sessionsurf->lieuDep().' -> '.$sessionsurf->spot()->nomSpot().' - '.count($sessionsurf->listeParticipants()).' pax';
                    				$session_id = 'session-'.$sessionsurf->noSes();
                    				$session_date = 'Du '.$sessionsurf->dateAller().' au '.$sessionsurf->dateRetour();
                    				$session_class = str_replace(' ','',strtolower($sessionsurf->spot()->nomSpot()));
                    				?>
                    				<!-- Item SessionSurf and Filter Name -->
							<li class="item-thumbs span3 <?php echo $session_class;?>">
                        				<?php echo $session_title;?>	
                             			<!-- Fancybox - Gallery Enabled - Title - Full Image -->
								<a class="hover-wrap fancybox-session"
								data-fancybox-group="gallery"
								title="<?php echo $session_title;?>"
								href="#<?php echo $session_id;?>"> <span class="overlay-img"></span>
									<span class="overlay-img-thumb font-icon-plus"></span>
							</a> <!-- Thumb Image and Description --> <img
								src="<?php echo $sessionsurf->spot()->photoSpot();?>"
								alt="<?php echo $session_title;?>">

								<div style="display: none"> 
									<form id="<?php echo $session_id;?>" class="session-inscription" method="post" action="">
										<input type="hidden" name="noSes" value="3"> 
										<input type="hidden" name="choix" value="session-inscription">
										<p id="status">Je pars ...</p>
										<p>
											<label for="avecPlanche">Avec ma board: </label> <input
												type="checkbox" id="avecPlanche" name="avecPlanche"
												size="30" />
										</p>
										<?php
						            	if (isset($_SESSION['Membre'])) {
						            	?>
										<p>
											<label for="avecVehicule">Je prends mon véhicule </label> <select
												id="avecVehicule" name="noVeh">
												<option value='-1'>Je ne prends pas ma voiture</option>
						            			<?php
						            				$membre=$_SESSION['Membre'];
						            				foreach ($membre->listeVehicules() as $tuture)
						            				{
						            					$titre_voiture = $tuture->marqueVeh().' '.$tuture->modeleVeh();
						            					echo '<option value="'.$tuture->noVeh().'">'.$titre_voiture.'</option>';
						            				}						  
												?>
						            		</select>
										</p>
								
										<p>
											<label for="nbrPlacesDispo">Nombre de places dispo</label>
											<input type="text" pattern="[1-9]"
												placeholder="Nombre de places dispo" id="nbrPlacesDispo"
												name="nbrPlacesDispo" size="3">
										</p>
										<p>
											<label for="nbrPlanchesDispo">Nombre de places pour planches dispo</label>
											<input type="text" pattern="[1-9]"
												placeholder="Nombre de places pour planches dispo"
												id="nbrPlanchesDispo" name="nbrPlanchesDispo" size="3">
										</p>
										<?php } ?>
										<p>
											<input type="submit" value="Je pars avec vous ..." />
										</p>
										<p>
											<em>Leave empty so see resizing</em>
										</p>
									</form>
								</div>
								
                                		<?php echo $session_date;?>                       			
                        			</li>
							<!-- End Item SessionSurf -->
                    		<?php
								} 
							?>
                    	
							
						</ul>
					</section>

				</div>
			</div>
		</div>
		<!-- End Portfolio Projects -->
	</div>
</div>
<!-- End Je cherche Section -->

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