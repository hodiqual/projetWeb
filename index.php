<?php
	include "modele/Membre.php";
	include "modele/createur.php";
	include "modele/spot.php";
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
                    	<li class="type-work">Critères</li>
                        <li><a href="#filter" data-option-value="*" class="selected">All Projects</a></li>
                        <li><a href="#filter" data-option-value=".design">Design</a></li>
                        <li><a href="#filter" data-option-value=".photography">Photography</a></li>
                        <li><a href="#filter" data-option-value=".video">Video</a></li>
                    </ul>
                </nav>
                <!-- End Filter -->
            </div>
            
            <div class="span9">
            	<div class="row">
                	<section id="projects">
                    	<ul id="thumbs">
                        
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 design">
                        	
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox-session" data-fancybox-group="gallery" title="Paris -> Lacanau - 23/12/2015" href="#session-3">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>    
                                </a>
                                <!-- Thumb Image and Description -->
                                Paris -> Lacanau - 23/12/2015
                                <img src="_include/img/work/thumbs/image-01.jpg" alt="&lt;a href=&quot;&quot;&gt;PROUT&lt;/a&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                                3 pax sur 5
                                
                                <div style="display:none"> <?php //TODO ?>
									<form id="session-3" class="session-inscription" method="post" action="">
										<input type="hidden" name="noSes" value="3">
										<input type="hidden" name="choix" value="session-inscription">
									    <p id="status">Je pars ...</p>
										<p>
											<label for="avecPlanche">Avec ma board: </label>
											<input type="checkbox" id="avecPlanche" name="avecPlanche" size="30" />
										</p>
										<p>
											<label for="avecVehicule">Je prends mon véhicule </label>
											<select id="avecVehicule" name="noVeh">
												<option value='-1'>Je ne prends pas ma voiture</option>
						            			<?php
														/*require_once("./modele/spo.php");
														$spotsManager = new SpotsManager(null);
														$spots = $spotsManager->getAll();
														foreach($spots as $spot)
														{
															echo '<option value="'.$spot->nomSpot().'">'.$spot->nomSpot().'</option>';
														}*/
												?>
						            		</select>
										</p>
										<p>
											<input type="text" pattern="[1-4]" placeholder="Nombre de places dispo" id="nbrPlacesDispo" name="nbrPlacesDispo">
										</p>
										<p>
											<input type="text" pattern="[1-4]" placeholder="Nombre de places pour planches dispo" id="nbrPlanchesDispo" name="nbrPlanchesDispo">
										</p>
										<p>
											<input type="submit" value="Je pars avec vous ..." />
										</p>
										<p>
										    <em>Leave empty so see resizing</em>
										</p>
									</form>
								</div>
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Office" href="_include/img/work/full/image-02-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-02.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Mountains" href="_include/img/work/full/image-03-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-03.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 video">
                            	<!-- Fancybox Media - Gallery Enabled - Title - Link to Video -->
                            	<a class="hover-wrap fancybox-media" data-fancybox-group="video" title="Video Content From Vimeo" href="http://vimeo.com/51460511">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-08.jpg" alt="Video">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Sea" href="_include/img/work/full/image-04-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-04.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 photography">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Clouds" href="_include/img/work/full/image-05-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-05.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 video">
                            	<!-- Fancybox Media - Gallery Enabled - Title - Link to Video -->
                            	<a class="hover-wrap fancybox-media" data-fancybox-group="video" title="Video Content From Vimeo" href="http://vimeo.com/50834315">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-09.jpg" alt="Video">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Dark" href="_include/img/work/full/image-06-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-06.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
                            
							<!-- Item Project and Filter Name -->
                        	<li class="item-thumbs span3 design">
                            	<!-- Fancybox - Gallery Enabled - Title - Full Image -->
                            	<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="The Beach" href="_include/img/work/full/image-07-full.jpg">
                                	<span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="_include/img/work/thumbs/image-07.jpg" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                            </li>
                        	<!-- End Item Project -->
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
                <h3 class="title-description">Tu sens qu'un spot va capter la houle, partage ta session avec les potes de glisse.</h3>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Contact Form -->
    <div class="row">
    	<div class="span9">
        	<form id="propose-form" class="contact-form" action="#">
            	<p class="contact-name">
            		Spot:
            		<select id="idSpot" name="idSpot">
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
            		Aller:
            		<input id="propose-dateAller" type="date" placeholder="Full Name" value="" name="dateAller" />
            		<input id="propose-heureAller" type="time" placeholder="18:00" value="" name="heureAller" />
                </p>
            	<p class="contact-name">
            		Retour:
            		<input id="propose-dateRetour" type="date" placeholder="Full Name" value="" name="dateRetour" />
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
                <ul id="photoSpot" >             
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