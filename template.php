<?php
require_once 'modele/Membre.php';

function ecrireHead()
{
	?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="fr-FR">
<!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Co-Glisse | Le partage de session de surf avec la communauté</title>

<meta name="description"
	content="Partager vos sessions avec la communauté" />

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- Google Font -->
<link
	href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900'
	rel='stylesheet' type='text/css'>

<!-- Fav Icon -->
<link rel="shortcut icon" href="#">

<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">

<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>

<!-- Analytics -->
<script type="text/javascript">
	
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'Insert Your Code']);
	_gaq.push(['_trackPageview']);
	
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
	</script>


<!-- End Analytics -->

</head>

<body>
	
	<?php
}

function ecrireFooter()
{
	?>

	<!-- Footer -->
	<footer>
		<p class="credits">
		IESSA14 - <a href="#CV" title="Co Gliss">HODIQUET Alexis</a>
			et <a href="#CV" title="Co Gliss">THOMAS Raimana</a>
		</p>
	</footer>
	<!-- End Footer -->

	<!-- Back To Top -->
	<a id="back-to-top" href="#"> <i class="font-icon-arrow-simple-up"></i>
	</a>
	<!-- End Back to Top -->
<?php
ecrireScript(); ?>
<script type="text/javascript" src="js/co_glisse.js"></script>
<?php 
ecrireFermeturePage();
}
?>

<?php 
function ecrireScript() {
	?>

	<!-- Script Maison -->
	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	<!-- jQuery Core -->

	<!-- Js -->
	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- jQuery Core -->
	<script src="_include/js/bootstrap.min.js"></script>
	<!-- Bootstrap -->
	<script src="_include/js/supersized.3.2.7.min.js"></script>
	<!-- Slider -->
	<script src="_include/js/waypoints.js"></script>
	<!-- WayPoints -->
	<script src="_include/js/waypoints-sticky.js"></script>
	<!-- Waypoints for Header -->
	<script src="_include/js/jquery.isotope.js"></script>
	<!-- Isotope Filter -->
	<script src="_include/js/jquery.fancybox.pack.js"></script>
	<!-- Fancybox -->
	<script src="_include/js/jquery.fancybox-media.js"></script>
	<!-- Fancybox for Media -->
	<script src="_include/js/jquery.tweet.js"></script>
	<!-- Tweet -->
	<script src="_include/js/plugins.js"></script>
	<!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
	<script src="_include/js/main.js"></script>
	<!-- Default JS -->
	<!-- End Js -->

	<?php
}?>

<?php function ecrireFermeturePage() {
	?>
	</body>
</html>
<?php 
}?>

<?php 
function ecrireSlider()
{
?>
<!-- This section is for Splash Screen -->
<div class="ole">
	<section id="jSplash">
		<div id="circle"></div>
	</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">
	<div class="overlay"></div>

	<div class="slider-text">
		<div id="slidecaption"></div>
	</div>

	<div class="control-nav">
		<a id="prevslide" class="load-item"><i
			class="font-icon-arrow-simple-left"></i></a> <a id="nextslide"
			class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
		<ul id="slide-list"></ul>

		<a id="nextsection" href="#cherche"><i
			class="font-icon-arrow-simple-down"></i></a>
	</div>
</div>
<!-- End Homepage Slider -->


<?php
}
?>

<?php 
function ecrireNav()
{
?>
<!-- Header -->
<header>
	<div class="sticky-nav">
		<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

		<div id="logo">
			<a id="goUp" href="#home-slider"
				title="CO GLISSE | Partagez vos sessions">COGLISSE</a>
		</div>

		<nav id="menu">
			<ul id="menu-nav">
				<li class="current"><a href="#home-slider">Accueil</a></li>
				<li><a href="#cherche">Je cherche</a></li>
				<li><a href="#propose">Je propose</a></li>
				<li><a href="#CV">CV</a></li>
				<li><a href="auth_form.php"
					class="fancybox-conn_profil font-icon-user-border">
					<?php 
					if (isset($_SESSION['Membre'])) {
								echo $_SESSION['Membre']->prenom();
							}
					?></a></li>
			</ul>
		</nav>

	</div>
</header>
<!-- End Header -->
<?php
}
?>

<?php
function ecrireCreateurs($tabCreateurs) {
	?>

<!-- CV Section -->
<div id="CV" class="page">
	<div class="container">
		<!-- Title Page -->
		<div class="row">
			<div class="span12">
				<div class="title-page">
					<h2 class="title">Curriculum Vitae</h2>
					<h3 class="title-description">Quelques mots sur nous. A faire en
						dynamique une fonction avec paramètre de chaque personne</h3>
				</div>
			</div>
		</div>
		<!-- End Title Page -->

		<!-- People -->
		<div class="row">
		<?php 
			foreach ($tabCreateurs as $createur)
			{
		?>
			<!-- Start Profile -->
			<div class="span4 profile">
				<div class="image-wrap">
					<div class="hover-wrap">
						<span class="overlay-img"></span> <span class="overlay-text-thumb"><?php echo $createur->_surnom ?></span>
					</div>
					<img src="<?php echo $createur->_avatar?>"
						alt="<?php echo $createur->_nom?>">
				</div>
				<h3 class="profile-name"><?php echo $createur->_nom?></h3>
				<p class="profile-description">
					<?php echo $createur->_description?>
				</p>

				<div class="social">
					<ul class="social-icons">
						<?php foreach ( $createur->_profil as $social_type => $social_url)
						{ ?> 
							<li><a href="<?php echo $social_url?>"><i
								class="font-icon-social-<?php echo $social_type?>"></i></a></li>
				  <?php } ?>
					</ul>
				</div>
			</div>
			<!-- End Profile -->
			
		<?php 
			}
		?>

		</div>
		<!-- End People -->
	</div>
</div>
<!-- End CV Section -->

<?php
}
?>

<?php
function ecrireConnexionForm() {
	?>
<div class="row">
	<div class="span9">
		<form id="connexion-form" class="contact-form" action="#">
			<?php if (!isset($_SESSION['Membre'])) { ?>
			<input type="hidden" name="choix" value="connection">	
			<p class="contact-email">
				<input id="connexion_email" type="text" placeholder="Email" value=""
					name="email" />
			</p>
			<p class="contact-name">
				<input id="connexion_name" type="password"
					placeholder="Mot de passe" value="" name="mdp" />
			</p>
			
			<p class="contact-submit">
				<a id="connexion_submit" class="button button-small" href="#">Connexion</a>
			</p>
				
			<?php 
			}else{?>
				<input type="hidden" name="choix" value="deconnection">
				<p class="contact-submit">
					<a id="connexion_submit" class="button button-small" href="#">Deconnection</a>
				</p>
			<?php
			}
			?>

			<div id="connexion-response"></div>
		</form>
	</div>
</div>
<?php
}
?>

<?php
function ecrireInscriptionForm() {
?>
<div class="row">
	<div class="span9">
		<form id="inscription-form" class="contact-form" action="#">
			<input type="hidden" name="choix" value="inscription">
			<h4>Mes coordonnées</h4>
			<p class="contact-name">
				<input id="inscription_nom" type="text" placeholder="Nom" value=""
					name="nom" required />
			</p>
			<p class="contact-name">
				<input id="inscription_prenom" type="text" placeholder="Prenom"
					value="" name="prenom" required />
			</p>
			<p class="contact-email">
				<input id="inscription_email" type="text" placeholder="Email"
					value="" name="email" required />
			</p>
			<p class="contact-name">
				<input id="inscription_mdp" type="password"
					placeholder="Mot de passe" value="" name="mdp" required />
			</p>

			<h4>Mon véhicule</h4>
			<p class="contact-name">
				<input id="inscription_marqueVeh" type="text" placeholder="Marque"
					value="" name="marqueVeh" />
			</p>
			<p class="contact-name">
				<input id="inscription_modeleVeh" type="text" placeholder="Modele"
					value="" name="modeleVeh" />
			</p>
			<p class="contact-name">
				<input id="inscription_couleurVeh" type="text" placeholder="Couleur"
					value="" name="couleurVeh" />
			</p>
			<p class="contact-name">
				<select id="inscription_nbrPlaces" name="nbrPlaces" required>
					<option value="">Nombre de places</option>
					<?php
						for($i=1 ; $i<=100 ; $i++) {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
			</p>
			<p class="contact-name">
				<select id="inscription_nbrPlanches" name="nbrPlanches" required>
					<option value="">Nombre de planches possible</option>
					<?php
						for($i=1 ; $i<=100 ; $i++) {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
				</select>
			</p>

			<p class="contact-submit">
				<a id="inscription_submit" class="button button-small" href="#">Inscription</a>
			</p>

			<div id="inscription-response"></div>
		</form>
	</div>
</div>

<?php
}
?>

<?php 
function ecrireJeChercheSection() {
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
	require_once ("./modele/spot.php");
	$spotsManager = new SpotsManager ( null );
	$spots = $spotsManager->getAll ();
	foreach ( $spots as $spot ) {
		echo '<li><a href="#filter" data-option-value=".' . str_replace ( ' ', '', strtolower ( $spot->nomSpot () ) ) . '">' . $spot->nomSpot () . '</a></li>';
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
	$managerSessionSurf = new SessionSurfsManager ( null );
	$allSessionsSurfs = $managerSessionSurf->getAll ();
	foreach ( $allSessionsSurfs as $sessionsurf ) {
		ecrireJeChercheItemSessionSurf($sessionsurf);
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
<?php
}
?>

<?php 
function getTickClass() {
	return  "class=\"font-icon-ok\"";
}?>

<?php 
function ecrireJeChercheItemSessionSurf(SessionSurf $sessionsurf)
{
	$session_title = $sessionsurf->lieuDep () . ' -> ' . $sessionsurf->spot ()->nomSpot () . ' - ' . count ( $sessionsurf->listeParticipants () ) . ' pax';
	$session_id = 'session-' . $sessionsurf->noSes ();
	$dateAllerObj = new DateTime($sessionsurf->dateAller());
	$dateRetourObj = new DateTime($sessionsurf->dateRetour());
	$session_date = 'Du ' . $dateAllerObj->format('d-m-Y H:m') . ' au ' . $dateRetourObj->format('d-m-Y');
	$session_class = str_replace ( ' ', '', strtolower ( $sessionsurf->spot ()->nomSpot () ) );
	$tick = '';
	if(isset($_SESSION['Membre']) && ($sessionsurf->estParticipant($_SESSION['Membre'])) )
	{
				$tick = "class=\"font-icon-ok\"";
	}
			
	 
	?>
		                    				<!-- Item SessionSurf and Filter Name -->
								<li id="item-<?php echo $session_id;?>" class="item-thumbs span3 <?php echo $session_class;?>">
		                        				<div align="center" <?php echo $tick?>> <?php echo $session_title;?>	</div>
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
										<form id="<?php echo $session_id;?>"
											class="session-inscription" method="post" action="">
											<input type="hidden" name="noSes" value="<?php echo $sessionsurf->noSes();?>"> <input
												type="hidden" name="choix" value="session-inscription">
											<div id="item-form-<?php echo $session_id;?>">
<?php
	if (!isset ( $_SESSION ['Membre'] )) {											
?>
											<div class="info-block">
												<div class="info-text">
													<p>Il faut se connecter pour participer à la session.</p>
												</div>
											</div>
<?php
	} else if (strlen($tick)<=0) {
?>
											<p id="status">Je pars ...</p>
											<p>
												<label for="avecPlanche">Avec ma board: </label> <input
													type="checkbox" id="avecPlanche" name="avecPlanche"
													size="30" />
											</p>
												<p>
												<label for="avecVehicule">Je prends mon véhicule </label> <select
													id="avecVehicule" name="noVeh">
													<option value='-1'>Je ne prends pas ma voiture</option>
								            			<?php
																$membre = $_SESSION ['Membre'];
															foreach ( $membre->listeVehicules () as $tuture ) {
																$titre_voiture = $tuture->marqueVeh () . ' ' . $tuture->modeleVeh ();
																echo '<option value="' . $tuture->noVeh () . '">' . $titre_voiture . '</option>';
															}
															?>
								            		</select>
											</p>
	
											<p>
												<label for="nbrPlacesDispo">Nombre de places dispo</label> <input
													type="text" pattern="[1-9]"
													placeholder="Nombre de places dispo" id="nbrPlacesDispo"
													name="nbrPlacesDispo" size="3">
											</p>
											<p>
												<label for="nbrPlanchesDispo">Nombre de places pour planches
													dispo</label> <input type="text" pattern="[1-9]"
													placeholder="Nombre de places pour planches dispo"
													id="nbrPlanchesDispo" name="nbrPlanchesDispo" size="3">
											</p>
												
												<p>
												<input type="submit" value="Je pars avec vous ..." />
											</p>
<?php } else  {											
?>
											<div class="info-block">
												<div class="info-text">
													<p>Tu es déjà inscris à cette session.</p>
												</div>
											</div>
<?php
	} 
?>
										</div>
										</form>
									</div>
										
		                                		<div align="center"><?php echo $session_date;?></div>                   			
		                        			</li>
								<!-- End Item SessionSurf -->
<?php
}
?>

<?php 
function ecrireJeProposeSection() {
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

		<?php if (isset($_SESSION['Membre'])) {
				ecrireJeProposeConnecte();
			}else
				ecrireJeProposeDeconnecte();?>
		
	</div>
</div>
<!-- End Je propose Section -->
	
<?php
}?>

<?php 
function ecrireJeProposeConnecte() {
?>
		<!-- Contact Form -->
		<div class="row">
			<div class="span9">
				<form id="propose-form" class="contact-form" action="#">
					<input type="hidden" name="choix" value="je_propose">
					<p class="contact-name">
						Spot: <select id="nomSpot" name="nomSpot">
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
            		
            		<p class="contact-name">
						Lieu départ:
						<input type="text" pattern="[1-9]"
							   placeholder="Lieu de rdv pour le départ"
							  name="lieuDep" required>
					</p>
					
					</p>
					<p class="contact-name">
						Aller: <input id="propose-dateAller" type="date"
							placeholder="Full Name" value="" name="dateAller" required/> 
							<input id="propose-heureAller" type="time" placeholder="18:00" value=""
							name="heureAller" required/>
					</p>
					<p class="contact-name">
						Retour: <input id="propose-dateRetour" type="date"
							placeholder="Full Name" value="" name="dateRetour" required/>
					</p>
					
					<p class="contact-name">
						Je prends mon véhicule:
						<select id="avecVehicule" name="noVeh">
							<option value='-1'>Je ne prends pas ma voiture</option>
							<?php
							$membre = $_SESSION ['Membre'];
							foreach ( $membre->listeVehicules () as $tuture ) {
								$titre_voiture = $tuture->marqueVeh () . ' ' . $tuture->modeleVeh ();
								echo '<option value="' . $tuture->noVeh () . '">' . $titre_voiture . '</option>';
							}
							?>
						</select>
					</p>

					<p class="contact-name">
						Nombre de places dispo dans la voiture:
						<input type="text" pattern="[1-9]"
							   placeholder="Nombre de places dispo" id="nbrPlacesDispo"
							  name="nbrPlacesDispo" size="3">
					</p>
					<p class="contact-name">
						Nombre de places pour planches dispo:
							<input type="text" pattern="[1-9]"
							placeholder="Nombre de places pour planches dispo"
							id="nbrPlanchesDispo" name="nbrPlanchesDispo" size="3">
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
<?php
}?>

<?php 
function ecrireJeProposeDeconnecte() {
?>
			<div class="row">
				<div class="span9">
				 <h4 style="color:red">IL FAUT SE CONNECTER.</h3>
				</div>
			</div>
<?php
}?>

