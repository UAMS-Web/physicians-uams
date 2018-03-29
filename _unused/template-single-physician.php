<?php
	/**
	 *  Template Name: Physician
	 *  Designed for person single, where type == physicians
	 */
?>
		   <style type="text/css">

			.acf-map {
				width: 100%;
				height: 400px;
				border: #ccc solid 1px;
				margin: 20px 0;
			}

			/* fixes potential theme css conflict */
			.acf-map img {
			   max-width: inherit !important;
			}

			</style>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyLHe_sPO96k-dsBtTR69iEDQlgpIJOIg&v=3.exp&sensor=false"></script>
			<script type="text/javascript">
			(function($) {

			/*
			*  new_map
			*
			*  This function will render a Google Map onto the selected jQuery element
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$el (jQuery element)
			*  @return	n/a
			*/

			function new_map( $el ) {

				// var
				var $markers = $el.find('.marker');


				// vars
				var args = {
					zoom		: 16,
					center		: new google.maps.LatLng(0, 0),
					mapTypeId	: google.maps.MapTypeId.ROADMAP
				};


				// create map
				var map = new google.maps.Map( $el[0], args);


				// add a markers reference
				map.markers = [];


				// add markers
				$markers.each(function(){

			    	add_marker( $(this), map );

				});


				// center map
				center_map( map );


				// return
				return map;

			}

			/*
			*  add_marker
			*
			*  This function will add a marker to the selected Google Map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$marker (jQuery element)
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function add_marker( $marker, map ) {

				// var
				var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

				// create marker
				var marker = new google.maps.Marker({
					position	: latlng,
					label		: $marker.attr('data-label'),
					map			: map
				});

				// add to array
				map.markers.push( marker );

				// if marker contains HTML, add it to an infoWindow
				if( $marker.html() )
				{
					// create info window
					var infowindow = new google.maps.InfoWindow({
						content		: $marker.html()
					});

					// show info window when marker is clicked
					google.maps.event.addListener(marker, 'click', function() {

						infowindow.open( map, marker );

					});
				}

			}

			/*
			*  center_map
			*
			*  This function will center the map, showing all markers attached to this map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function center_map( map ) {

				// vars
				var bounds = new google.maps.LatLngBounds();

				// loop through all markers and create bounds
				$.each( map.markers, function( i, marker ){

					var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

					bounds.extend( latlng );

				});

				// only 1 marker?
				if( map.markers.length == 1 )
				{
					// set center of map
				    map.setCenter( bounds.getCenter() );
				    map.setZoom( 16 );
				}
				else
				{
					// fit to bounds
					map.fitBounds( bounds );
				}

			}

			/*
			*  document ready
			*
			*  This function will render each map when the document is ready (page has loaded)
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	5.0.0
			*
			*  @param	n/a
			*  @return	n/a
			*/
			// global var
			var map = null;

			$(document).ready(function(){

				$('.acf-map').each(function(){

					// create map
					map = new_map( $(this) );

				});

			});

			$(document).ready(function(){

			  $( '#label_tab-location' ).click( function() {

			  		google.maps.event.trigger(map, 'resize');
			  		center_map(map);

               });

			  $( '#label_tab-location' ).focus( function() {

			  		google.maps.event.trigger(map, 'resize');
			  		center_map(map);

               });

			});

			})(jQuery);
			</script>
<!-- 			<h2>Physician</h2> -->
			<div style="margin-bottom: 10px; max-width: 450px;"><?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?></div>
	        <div class="row">
		        <div class="col-md-8">
	                <h1 class="title-heading-left" data-fontsize="34" data-lineheight="48"><?php echo rwmb_meta('person_first_name'); ?> <?php echo (rwmb_meta('person_middle_name') ? rwmb_meta('person_middle_name') : ''); ?> <?php echo rwmb_meta('person_last_name'); ?><?php echo (rwmb_meta('person_degree') ? ', ' . rwmb_meta('person_degree') : ''); ?></h1>
	                    <?php echo (rwmb_meta('physician_title') ? '<h4>' . rwmb_meta('physician_title') .'</h4>' : ''); ?>
	            </div>
				<div class="col-md-4" style="padding-top: 42px;">
	                <div class="fusion-button-wrapper">
	                    <a class="uams-btn btn-lg" target="_self" title="Make an Appointment" href="<?php echo rwmb_meta('physician_appointment_link'); ?>">Make an Appointment</a>
	                </div>
	            </div>
	        </div>
			<div class="row">
				<div class="col-md-3">
	                <div style="padding-bottom: 1em;">
	                    <?php the_post_thumbnail( 'medium' ); ?>
	                </div>
<?php if(rwmb_meta('physician_youtube_link')) { ?>
	                <div>
	                    <a class="uams-btn btn-red btn-play btn-md" target="_self" title="Watch Video" href="<?php echo rwmb_meta('physician_youtube_link'); ?>">Watch Video</a>
	                </div>
<?php } ?>
	                <div class="fusion-button-wrapper">
	                    <a class="uams-btn btn-blue btn-plus btn-md" target="_self" title="Visit MyChart" href="https://mychart.uamshealth.com/">MyChart</a>
	                </div>
	                <?php if(rwmb_meta('physician_npi')) { ?>
					<div class="ds-summary" data-ds-id="<?php echo rwmb_meta( 'physician_npi' ); ?>"></div>
					<?php } ?>
	                <div class="fusion-sep-clear"></div>

	                <div class="fusion-separator fusion-full-width-sep sep-single" style="border-color:#e0dede;border-top-width:1px;margin-left: auto;margin-right: auto;margin-top:10px;margin-bottom:10px;"></div>
						<?php

						$locations = rwmb_meta('physician_locations');
						// Returns Array of ID only
						?>
						<?php if( $locations ): ?>
						<h3 data-fontsize="16" data-lineheight="24"><i class="fa fa-medkit"></i> Clinic(s)</h3>
							<ul>
							<?php foreach( $locations as $location ): ?>
								<li>
									<a href="<?php echo get_permalink( $location ); ?>">
										<?php echo get_the_title( $location ); ?>
									</a>
								</li>
							<?php endforeach; ?>
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
	                        <li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-academics" id="label_tab-academics" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Academics
		                        </a>
	                        </li>
	                        <li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-location" id="label_tab-location" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Location
		                        </a>
	                        </li>
	                    <?php if( !empty(rwmb_meta('person_research_bio')) || !empty(rwmb_meta('person_research_interests'))): ?>
	                    	<li class="js-tablist__item tabs__uams__li">
	                            <a href="#tab-research" id="label_tab-research" class="js-tablist__link tabs__uams__a" data-toggle="tab">
		                            Research
		                        </a>
	                        </li>
	                    <?php endif; ?>
	                    <?php if( !empty (rwmb_meta('person_awards')) || rwmb_meta('person_additional_info')): ?>
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
						<?php if(rwmb_meta('person_academic_appointment')||rwmb_meta('person_education')||rwmb_meta('physician_boards')||rwmb_meta('person_publications')||rwmb_meta('person_pubmed_author_id')): ?>
	                        <div id="tab-academics" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php 
	                            	$academic_appointments = rwmb_meta('person_academic_appointment');
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
									$schools = rwmb_meta('person_education');
								 	if( !empty ( $schools ) ): ?>
	                            	<h3>Education</h3>
								    <ul>
								    <?php foreach( $schools as $school ): 
								    	$school_name = get_term( $school['person_education_school'], 'schools');
								    ?>
								        <li><?php echo $school['person_education_type']; ?> - <?php echo ($school['person_education_description'] ? '' . $school['person_education_description'] .'<br/>' : ''); ?><?php echo $school_name->name; ?></li>
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
									$publications = rwmb_meta('person_publications');
									if( !empty ( $publications ) ): ?>
	                            	<h3>Selected Publications</h3>
								    <ul>
								    <?php foreach( $publications as $publication ): ?>
								        <li><?php echo $publication['publication_pubmed_info']; ?></li>
								    <?php endforeach; ?>
								    </ul>
								<?php endif; ?>
								<?php if( rwmb_meta('person_pubmed_author_id') ): ?>
									<?php
										$pubmedid = trim(rwmb_meta('person_pubmed_author_id'));
										$pubmedcount = (rwmb_meta('pubmed_author_number') ? rwmb_meta('pubmed_author_number') : '3')

									?>
	                            	<h3>Latest Publications</h3>
								    <?php echo do_shortcode( '[pubmed terms="' . urlencode($pubmedid) .'%5BAuthor%5D" count="' . $pubmedcount .'"]' ); ?>
								<?php endif; ?>
								<?php if( rwmb_meta('person_research_profiles_link') ): ?>
	                            	More information is available on <a href="<?php echo rwmb_meta('person_research_profiles_link'); ?>">UAMS Profile Page</a>
								<?php endif; ?>
	                        </div>
	                    <?php endif; ?>
	                        <div id="tab-location" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php

								$physician_locations = rwmb_meta('physician_locations');
								//$map = rwmb_get_value('location_map', $physician_locations);
								//print_r($physician_locations);
								if( !empty($physician_locations) ): ?>
									<div class="acf-map">
									<?php $i = 1; ?>
                                    <?php foreach( $physician_locations as $post ): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>
                                        <?php //global $wpdb; ?>
                                        <?php //$args = array( 'storage_type' => 'custom_table', 'table' => "{$wpdb->prefix}uams_locations" ); ?>
                                        <?php $map = rwmb_get_value('location_map'); ?>
                                        <div class="marker" data-lat="<?php echo $map['latitude']; ?>" data-lng="<?php echo $map['longitude']; ?>" data-label="<?php echo $i ?>"></div>
                                        <?php //print_r(rwmb_get_value('location_map', $args, $post)); ?>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    </div>
                                    <ol>
                                        <?php foreach ($physician_locations as $post): setup_postdata($post); ?>
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
								    <?php endforeach; ?>
                                    </ol>
								    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
	                        </div>
	                        <?php if( !empty(rwmb_meta('person_research_bio')) || !empty(rwmb_meta('person_research_interests')) ): ?>
	                        <div id="tab-research" class="js-tabcontent tabs__uams__tabcontent">
	                            <?php
		                            if(rwmb_meta('person_research_bio'))
									{
										echo rwmb_meta('person_research_bio');
									}
		                        ?>
								<?php
									if(rwmb_meta('person_research_interests'))
									{ ?>
									<h3>Research Interests</h3>
								<?php
										echo rwmb_meta('person_research_interests');
									}
								?>
								<?php
									if(rwmb_meta('person_research_profiles_link'))
									{ ?>
										<a href="<?php echo rwmb_meta('person_research_profiles_link'); ?>" target="_blank">UAMS TRI Profiles</a>
								<?php }
								?>
	                        </div>
	                    <?php endif; ?>
						<?php 
							$awards = rwmb_meta('person_awards');
							if(! empty( $awards ) || rwmb_meta('person_additional_info')): ?>
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
									if(rwmb_meta('person_additional_info'))
									{
										echo rwmb_meta('person_additional_info');
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