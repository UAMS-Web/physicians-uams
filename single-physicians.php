<?php
	/**
	 *  Template Name: People
	 *  Designed for people single
	 */


	get_header();
	$sidebar = get_post_meta($post->ID, "sidebar");
	$breadcrumbs = get_post_meta($post->ID, "breadcrumb");
 ?>
	<?php get_template_part( 'header', 'image' ); ?>

	<div class="container uams-body">

	  <div class="row">

	    <div class="col-md-12 uams-content" role='main'>

	      <?php //uams_page_title(); ?>

	      <?php //get_template_part( 'menu', 'mobile' ); ?>

	      <?php
		      if((!isset($breadcrumbs[0]) || $breadcrumbs[0]!="on")) {
		      	get_template_part( 'breadcrumbs' );
		      }
		  ?>

	      <div id='main_content' class="uams-body-copy" tabindex="-1">
			<div class="margin-bottom-one search-box-lg"><?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?></div>
	        <div class="row">
		        <div class="col-md-8">
	                <h1 class="title-heading-left" data-fontsize="34" data-lineheight="48"><?php echo rwmb_meta('physician_first_name'); ?> <?php echo (rwmb_meta('physician_middle_name') ? rwmb_meta('physician_middle_name') : ''); ?> <?php echo rwmb_meta('physician_last_name'); ?><?php echo (rwmb_meta('physician_degree') ? ', ' . rwmb_meta('physician_degree') : ''); ?></h1>
	                    <?php echo (rwmb_meta('physician_title') ? '<h4>' . rwmb_meta('physician_title') .'</h4>' : ''); ?>
	            </div>
				<div class="col-md-4 margin-bottom-two">
	                <div>
	                    <a class="uams-btn btn-lg" target="_self" title="Make an Appointment" href="<?php echo rwmb_meta('physician_appointment_link'); ?>">Make an Appointment</a>
	                </div>
	            </div>
	        </div>
			<div class="row">
				<div class="col-md-3">
	                <div class="margin-bottom-two">
	                    <?php the_post_thumbnail( 'medium' ); ?>
	                </div>
<?php if(rwmb_meta('physician_youtube_link')) { ?>
	                <div>
	                    <a class="uams-btn btn-red btn-play btn-md" target="_self" title="Watch Video" href="<?php echo rwmb_meta('physician_youtube_link'); ?>">Watch Video</a>
	                </div>
<?php } ?>
	                <div>
	                    <a class="uams-btn btn-blue btn-plus btn-md" target="_self" title="Visit MyChart" href="https://mychart.uamshealth.com/">MyChart</a>
	                </div>
	                <?php if(rwmb_meta('physician_npi')) { ?>
					<div class="ds-summary" data-ds-id="<?php echo rwmb_meta( 'physician_npi' ); ?>"></div>
					<?php }

						$locations = new WP_Query( array(
						    'relationship' => array(
						        'id'   => 'physicians_to_locations',
						        'from' => get_the_ID(), // You can pass object ID or full object
						    ),
						    'nopaging'     => true,
						) );
						
						if( $locations ): ?>
						<h3 data-fontsize="16" data-lineheight="24"><i class="fa fa-medkit"></i> Clinic(s)</h3>
							<ul>
							<?php while ( $locations->have_posts() ) : $locations->the_post(); ?>
								<li>
									<a href="<?php echo get_permalink( ); ?>">
										<?php echo get_the_title( ); ?>
									</a>
								</li>
							<?php endwhile;
								wp_reset_postdata(); ?>
							</ul>
						<?php endif; ?>
	            </div>
				<div class="col-md-9">
	                <div class="js-tabs tabs__uams">
		                <ul class="js-tablist tabs__uams_ul" data-hx="h2">
	                    	<li class="js-tablist__item tabs__uams__li">
	                    		<a href="#tab-overview" id="label_tab-overview" class="js-tablist__link tabs__uams__a" data-toggle="tab">
	                            	Overview
	                            </a>
	                        </li>
	                        <?php if(rwmb_meta('physician_academic_appointment')||rwmb_meta('physician_education')||rwmb_meta('physician_boards')||rwmb_meta('physician_publications')||rwmb_meta('physician_pubmed_author_id')||rwmb_meta('physician_research_profiles_link')): ?>
	                        <li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-academics" id="label_tab-academics" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Academics
		                        </a>
	                        </li>
	                        <?php endif; ?>
	                        <li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-location" id="label_tab-location" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Location
		                        </a>
	                        </li>
	                    <?php if( !empty(rwmb_meta('physician_research_bio')) || !empty(rwmb_meta('physician_research_interests'))): ?>
	                    	<li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-research" id="label_tab-research" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Research
		                        </a>
	                        </li>
	                    <?php endif; ?>
	                    <?php if( !empty (rwmb_meta('physician_awards')) || rwmb_meta('physician_additional_info')): ?>
	                    	<li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-info" id="label_tab-info" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Additional Info
		                        </a>
	                        </li>
	                    <?php endif; ?>
                        </ul>
                        <div class="uams-tab-content">
	                        <div id="tab-overview" class="js-tabcontent tabs__uams__tabcontent">
			                    <?php echo rwmb_meta('physician_clinical_bio'); ?>
			                    <?php // load all 'specialties' terms for the post
									$specialties = rwmb_meta('medical_specialties');

									// we will use the first term to load ACF data from
									if( $specialties ): ?>
									<h3>Specialties</h3>
										<ul>
											<?php foreach( $specialties as $specialty ): ?>
												<li>
													<a href="<?php echo get_term_link( $specialty ); ?>">
													<?php $specialty_name = get_term( $specialty, 'specialty');
														echo $specialty_name->name;
													?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
								<?php endif; ?>
								<?php // load all 'specialties' terms for the post
									$conditions = rwmb_meta('physician-conditions');

									// we will use the first term to load ACF data from
									if( $conditions ): ?>
									<h3>Conditions/Diseases Treated</h3>
									<p><em>UAMS doctors treat a broad range of conditions some of which may not be listed below.</em></p>
										<ul>
											<?php foreach( $conditions as $condition ): ?>
												<li>
													<?php $condition_name = get_term( $condition, 'condition');
														echo $condition_name->name;
													?>
												</li>
											<?php endforeach; ?>
										</ul>
								<?php endif; ?>
								<?php // load all 'specialties' terms for the post
									$procedures = rwmb_meta('medical_procedures');

									// we will use the first term to load ACF data from
									if( $procedures ): ?>
									<h3>Tests/Procedures Performed</h3>
									<p><em>The following list represents some, but not all, of the procedures offered by this doctor.</em></p>
										<ul>
											<?php foreach( $procedures as $procedure ): ?>
												<li>
													<?php $procedure_name = get_term( $procedure, 'medical_procedures');
														echo $procedure_name->name;
													?>
												</li>
											<?php endforeach; ?>
										</ul>
								<?php endif; ?>
								<?php if(rwmb_meta('physician_npi')) { ?>
								<div id="div_PatientRatings">
                                	<h2 id="PatientRatings">Patient Ratings &amp; Reviews</h2>
									<div class="ds-breakdown"></div>
									<div class="ds-comments" data-ds-pagesize="10"></div>
                            	</div>
								<?php } ?>
							</div>
						<?php if(rwmb_meta('physician_academic_appointment')||rwmb_meta('physician_education')||rwmb_meta('physician_boards')||rwmb_meta('physician_publications')||rwmb_meta('physician_pubmed_author_id')||rwmb_meta('physician_research_profiles_link')): ?>
	                        <div id="tab-academics" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php 
	                            	$academic_appointments = rwmb_meta('physician_academic_appointment');
	                            	if( !empty ( $academic_appointments ) ): ?>
	                            	<h3>Academic Appointments</h3>
								    <ul>
								    <?php foreach( $academic_appointments as $academic_appointment ): 
								    		$academic_department_name = get_term($academic_appointment['academic_department'], 'academic_department');
								    	?>
								        <li><?php echo $academic_appointment['academic_title']; ?>, <?php echo $academic_department_name->name; ?></li>
								    <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
								<?php
									$schools = rwmb_meta('physician_education');
								 	if( !empty ( $schools ) ): ?>
	                            	<h3>Education</h3>
								    <ul>
								    <?php foreach( $schools as $school ):
								    	$school_name = get_term( $school['physician_education_school'], 'schools');
								    	$education_type = get_term($school['physician_education_type'], 'educationtype');
								    ?>
								        <li><?php echo $education_type->name; ?> - <?php echo ($school['physician_education_description'] ? '' . $school['physician_education_description'] .'<br/>' : ''); ?><?php echo $school_name->name; ?></li>
								    <?php endforeach; ?>
								    </ul>
								<?php //endif; ?>
								<?php 
								// $specialties = rwmb_meta('medical_specialties');

									// we will use the first term to load ACF data from
									// if( $specialties ): ?>
									<!-- <h3>Specialties</h3>
										<ul>
											<?php foreach( $specialties as $specialty ): ?>
												<li>
													<a href="<?php echo get_term_link( $specialty ); ?>">
													<?php $specialty_name = get_term( $specialty, 'specialty');
														echo $specialty_name->name;
													?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul> -->
								<?php endif;
									$boards = rwmb_meta( 'physician_boards' );
									if( ! empty( $boards ) ): ?>
	                            	<h3>Professional Certifications</h3>
								    <ul>
								    <?php foreach ( $boards as $board ) :
								    		$board_name = get_term( $board, 'boards'); ?>
								        		<li><?php echo $board_name->name; ?></li>
								        	<?php // }; ?>
								    <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
								<?php 
									$publications = rwmb_meta('physician_publications');
									if( !empty ( $publications ) ): ?>
	                            	<h3>Selected Publications</h3>
								    <ul>
								    <?php foreach( $publications as $publication ): ?>
								        <li><?php echo $publication['publication_pubmed_info']; ?></li>
								    <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
								<?php if( rwmb_meta('physician_pubmed_author_id') ): ?>
									<?php
										$pubmedid = trim(rwmb_meta('physician_pubmed_author_id'));
										$pubmedcount = (rwmb_meta('pubmed_author_number') ? rwmb_meta('pubmed_author_number') : '3')

									?>
	                            	<h3>Latest Publications</h3>
								    <?php echo do_shortcode( '[pubmed terms="' . urlencode($pubmedid) .'%5BAuthor%5D" count="' . $pubmedcount .'"]' ); ?>
								<?php endif; ?>
								<?php if( rwmb_meta('physician_research_profiles_link') ): ?>
	                            	More information is available on <a href="<?php echo rwmb_meta('physician_research_profiles_link'); ?>">UAMS Profile Page</a>
								<?php endif; ?>
	                        </div>
	                    <?php endif; ?>
	                        <div id="tab-location" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php

	                            $physician_locations = new WP_Query( array(
								    'relationship' => array(
								        'id'   => 'physicians_to_locations',
								        'from' => get_the_ID(), // You can pass object ID or full object
								    ),
								    'nopaging'     => true,
								) );

								if( !empty($physician_locations) ): ?>
									<div style="width:100%; height:480px;" id="map"></div>
									<script type='text/javascript'>
										/*-- Function to create encode SVG  --*/
										/* colors needd to be hex code without # */
										// createSVGIcon("9d2235", "222", "whitetext", "1"); 
										var createSVGIcon = function(fillColor,strokeColor,labelClass,labelText) {
											var svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 27.77" aria-labelledby="pinTitle" role="img"><title id="mapTitle">Basic Map Pin</title><path d="M9.5,26.26l.57-.65c.29-.4,7.93-9.54,7.93-15.67A8.75,8.75,0,0,0,9.5,1,8.75,8.75,0,0,0,1,9.94c0,6,7.54,15.27,7.93,15.67l.57.65Z" fill="#'+ fillColor +'" stroke="#'+ strokeColor +'" stroke-miterlimit="10" stroke-width="1"/></svg>';      
											var encoded = window.btoa(svg);
											var backgroundImage = "background-image: url(data:image/svg+xml;base64,"+encoded+")";
											return '<div style="'+ backgroundImage +'" class="'+ labelClass +'">'+ labelText +'</div>';
										}
										/* Function to create divIcon for leaflet map */
										// createLabelIcon("leaflet-icon","A");
										var createLabelIcon = function(labelClass,labelText){
											return L.divIcon({ 
												className: labelClass,
												html: labelText,
												iconSize: new L.Point(28, 41),
												iconAnchor: new L.Point(14, 43),
												popupAnchor: [0, -43]
											})
										}
										var markers = [  
											// example [ 34.74376029995541, -92.31828863640054, "00F","000","white","A","I am a blue icon." ],
											<?php $i = 1; ?>
											<?php while ( $locations->have_posts() ) : $locations->the_post(); // variable must be called $post (IMPORTANT) ?>
											<?php $map = rwmb_get_value('location_map'); ?>
											[ <?php echo $map['latitude']; ?>, <?php echo $map['longitude'] ?>, "9d2235","222", "white", "<?php echo $i ?>", '<strong><?php the_title() ?></strong><br /><a href="https://www.google.com/maps/dir/Current+Location/<?php echo $map["latitude"] ?>,<?php echo $map["longitude"] ?>" target="_blank">Directions</a>' ],
											<?php $i++; ?>
											<?php endwhile; ?>
										]
										var map = new L.Map('map', {center: new L.LatLng(<?php echo $map['latitude']; ?>, <?php echo $map['longitude'] ?>), zoom: 16 });
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										map.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text.
										// for all possible values and explanations see "Template Parameters" in https://msdn.microsoft.com/en-us/library/ff701716.aspx
										var imagerySet = "Road"; // AerialWithLabels | Birdseye | BirdseyeWithLabels | Road
										var bing = new L.BingLayer("AnCRy0VpPMDzYT6rOBqqqCNvNbUWvdSOv8zrQloRCGFnJZU28JK3c6cQkCMAHtCd", {type: imagerySet});
										map.addLayer(bing);
										/* [lat, lon, fillColor, strokeColor, labelClass, iconText, popupText] */
										
										//Loop through the markers array
										var markerArray = [];
										for (var i=0; i<markers.length; i++) {
										
											var lat = markers[i][0];
											var lon = markers[i][1];
											var fillColor = markers[i][2];
											var strokeColor = markers[i][3];
											var labelClass = markers[i][4];
											var iconText = markers[i][5];
											var popupText = markers[i][6];

											var markerLocation = new L.LatLng(lat, lon);
											marker = new L.marker([lat, lon], { icon: createLabelIcon("leaflet-icon", createSVGIcon(fillColor,strokeColor,labelClass,iconText))});
											if (popupText)
												marker.bindPopup(popupText, { maxWidth: '240' });
											marker.addTo(map);

											markerArray.push(markerLocation);
										}

										group = new L.LatLngBounds(markerArray);
										if (markers.length > 1){
											map.fitBounds(group, {padding: [100, 75]});
										}
									</script>
                                    <ol>
                                        <?php while ( $locations->have_posts() ) : $locations->the_post(); ?>
                                        <li>
								        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								            <p><?php echo rwmb_meta('location_address_1', $args, get_the_ID() ); ?><br/>
								            <?php echo ( rwmb_meta('location_address_2', $args ) ? rwmb_meta('location_address_2', $args) . '<br/>' : ''); ?>
								            <?php echo rwmb_meta('location_city', $args); ?>, <?php echo rwmb_meta('location_state', $args); ?> <?php echo rwmb_meta('location_zip', $args, get_the_ID()); ?><br/>
								            <?php echo rwmb_meta('location_phone', $args); ?>
								            <?php echo ( rwmb_meta('location_fax', $args) ? '<br/>Fax: ' . rwmb_meta('location_fax', $args) . '' : ''); ?>
								            <?php echo ( rwmb_meta('location_email', $args ) ? '<br/><a href="mailto:"' . rwmb_meta('location_email', $args ) . '">' . rwmb_meta('location_email', $args ) . '</a>' : ''); ?>
								            <?php echo ( rwmb_meta('location_web_name', $args ) ? '<br/><a href="' . rwmb_meta( 'location_url', $args ) . '">' . rwmb_meta('location_web_name', $args ) . '</a>' : ''); ?>
								            <br /><a href="https://www.google.com/maps/dir/Current+Location/<?php echo $map['latitude'] ?>,<?php echo $map['longitude'] ?>" target="_blank">Directions</a> [Opens in New Window]
								        </p>
                                        </li>
								    <?php endwhile; ?>
                                    </ol>
								    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
	                        </div>
	                        <?php if( !empty(rwmb_meta('physician_research_bio')) || !empty(rwmb_meta('physician_research_interests')) ): ?>
	                        <div id="tab-research" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php
		                            if(rwmb_meta('physician_research_bio'))
									{
										echo rwmb_meta('physician_research_bio');
									}
		                        ?>
								<?php
									if(rwmb_meta('physician_research_interests'))
									{ ?>
									<h3>Research Interests</h3>
								<?php
										echo rwmb_meta('physician_research_interests');
									}
								?>
								<?php
									if(rwmb_meta('physician_research_profiles_link'))
									{ ?>
										<a href="<?php echo rwmb_meta('physician_research_profiles_link'); ?>" target="_blank">UAMS TRI Profiles</a>
								<?php }
								?>
	                        </div>
	                    <?php endif; ?>
						<?php 
							$awards = rwmb_meta('physician_awards');
							if(! empty( $awards ) || rwmb_meta('physician_additional_info')): ?>
	                        <div id="tab-info" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php if(! empty( $awards ) ): ?>
	                            	<h3>Awards</h3>
								    <ul>
								    <?php foreach ( $awards as $award ) { ?>
								        <li><?php echo $award['award_title']; ?> (<?php echo $award['award_year']; ?>)<?php echo ($award['award_infor'] ? '<br/>' . $award['award_infor'] : ''); ?></li>
								    <?php } ?>
								    </ul>
								<?php endif; ?>
								<?php
									if(rwmb_meta('physician_additional_info'))
									{
										echo rwmb_meta('physician_additional_info');
									}
								?>
	                        </div>
	                    <?php endif; ?>
	            		</div><!-- uams-tab-content -->
	                </div><!-- js-tabs -->
	    		</div><!-- col-md-9 -->
	    		<?php if(rwmb_meta('physician_npi')) { ?>
	    		<script src="https://www.docscores.com/widget/v2/uams/npi/<?php echo rwmb_meta( 'physician_npi' ); ?>/lotw.js" async=""></script>
	    		<?php } ?>
	    		<script src="<?php echo get_template_directory_uri(); ?>/js/uams.tabs.min.js" type="text/javascript"></script>
	    		<script type="text/javascript">
						(function ($, window) {

						var intervals = {};
						var removeListener = function(selector) {

							if (intervals[selector]) {

								window.clearInterval(intervals[selector]);
								intervals[selector] = null;
							}
						};
						var found = 'waitUntilExists.found';

						/**
						 * @function
						 * @property {object} jQuery plugin which runs handler function once specified
						 *           element is inserted into the DOM
						 * @param {function|string} handler
						 *            A function to execute at the time when the element is inserted or
						 *            string "remove" to remove the listener from the given selector
						 * @param {bool} shouldRunHandlerOnce
						 *            Optional: if true, handler is unbound after its first invocation
						 * @example jQuery(selector).waitUntilExists(function);
						 */

						$.fn.waitUntilExists = function(handler, shouldRunHandlerOnce, isChild) {

							var selector = this.selector;
							var $this = $(selector);
							var $elements = $this.not(function() { return $(this).data(found); });

							if (handler === 'remove') {

								// Hijack and remove interval immediately if the code requests
								removeListener(selector);
							}
							else {

								// Run the handler on all found elements and mark as found
								$elements.each(handler).data(found, true);

								if (shouldRunHandlerOnce && $this.length) {

									// Element was found, implying the handler already ran for all
									// matched elements
									removeListener(selector);
								}
								else if (!isChild) {

									// If this is a recurring search or if the target has not yet been
									// found, create an interval to continue searching for the target
									intervals[selector] = window.setInterval(function () {

										$this.waitUntilExists(handler, shouldRunHandlerOnce, true);
									}, 500);
								}
							}

							return $this;
						};

						}(jQuery, window));
					(function($) {
						$(document).ready(function(){
							$('.ds-average').waitUntilExists( function(){

								$('.ds-average').attr('itemprop', 'ratingValue');
								$('.ds-ratingcount').attr('itemprop', 'ratingCount');
								$('.ds-summary').attr('itemtype', 'http://schema.org/AggregateRating');
								$('.ds-summary').attr('itemprop', 'aggregateRating');
								$('.ds-comments').wrapInner('<a href="#PatientRatings"></a>');
							});
						});
					})(jQuery);
		    	</script>
				<?php wp_reset_query(); ?>
			</div>

		  </div><!-- #main_content -->

    	</div><!-- uams-content -->

		<div id="sidebar"></div>

  </div><!-- row -->

</div>

<?php get_footer(); ?>
