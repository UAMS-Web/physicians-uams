<?php get_header();

 get_template_part( 'header', 'image' ); ?>

	<!--<div class="col-md-12 mobile-menu"> <?php get_template_part( 'menu', 'mobile' ); ?> </div>-->
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
			<!-- <script type="text/javascript">

			</script> -->

		    <div class="margin-bottom-one search-box-lg"><?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?></div>
		    <?php while ( have_posts() ) : the_post(); ?>
		    	<div class="row">
			    	<div class="col-md-6">
			    		<h1><?php the_title(); ?></h1>
							<?php $map = rwmb_get_value('location_map'); ?>
					        <p><?php echo rwmb_meta('location_address_1', $args, get_the_ID() ); ?><br/>
					            <?php echo ( rwmb_meta('location_address_2', $args ) ? rwmb_meta('location_address_2', $args) . '<br/>' : ''); ?>
					            <?php echo rwmb_meta('location_city', $args); ?>, <?php echo rwmb_meta('location_state', $args); ?> <?php echo rwmb_meta('location_zip', $args, get_the_ID()); ?><br/>
					            <?php echo rwmb_meta('location_phone', $args) ? '<a href="tel:'. rwmb_meta('location_phone', $args) . '" class="icon-phone">' . rwmb_meta('location_phone', $args) . '</a>' : ''; ?>
					            <?php echo ( rwmb_meta('location_fax', $args) ? '<br/>Fax: ' . rwmb_meta('location_fax', $args) . '' : ''); ?>
					            <?php echo ( rwmb_meta('location_email', $args ) ? '<br/><a href="mailto:"' . rwmb_meta('location_email', $args ) . '" class="icon-email">' . rwmb_meta('location_email', $args ) . '</a>' : ''); ?></p>

					            <?php echo ( rwmb_meta('location_web_name', $args ) ? '<p><a class="uams-btn btn-blue btn-sm" href="' . rwmb_meta( 'location_url', $args ) . '" title="'. rwmb_meta('location_web_name', $args ) . '">Clinic Webpage</a></p>' : ''); ?>
					            <p><a class="uams-btn btn-red btn-sm btn-external" href="https://www.google.com/maps/dir/Current+Location/<?php echo $map['latitude'] ?>,<?php echo $map['longitude'] ?>" target="_blank">Get Directions</a>
					        </p>
					        <?php
						        $phone_numbers = rwmb_meta('location_appointments');
						        if ( ! empty( $phone_numbers ) && ! empty( $phone_numbers[0]['number'] ) ) {
							        echo '<h3>Additional Phone Numbers:</h3>';
								    foreach ( $phone_numbers as $phone_number ) {
									    if (! empty($phone_number['text']) && ! empty($phone_number['number']) ) {
								        	echo '<p><strong>' . $phone_number['text'] . '</strong>: <a href="tel:'. $phone_number['number'] .'" class="icon-phone">'. $phone_number['number'] .'</a> ' . $phone_number['after'] .'</p>'; // Display sub-field value
								        }
								    }
								}
						        //echo ( rwmb_meta('location_appointments', $args ) ? '<h3>Additional Phone Numbers:</h3><p>' . rwmb_meta('location_appointments', $args) . '</p>' : ''); ?>
							<h3>Hours of Operation</h3>
							<?php
								if (rwmb_meta('location_24_7', $args)):
									echo 'Open 24/7';
								else:
						        	echo '<p>Mon: ' . ( rwmb_meta('location_mon_open', $args ) && "00:00:00" != rwmb_meta('location_mon_open', $args ) ? '' . rwmb_meta('location_mon_open', $args) . ' - ' . rwmb_meta('location_mon_close', $args) . '' : 'Closed') . '</p>';
							        echo '<p>Tues: ' . ( rwmb_meta('location_tues_open', $args ) && "00:00:00" != rwmb_meta('location_tues_open', $args ) ? '' . rwmb_meta('location_tues_open', $args) . ' - ' . rwmb_meta('location_tues_close', $args) . '' : 'Closed') . '</p>';
								    echo '<p>Wed: ' . ( rwmb_meta('location_wed_open', $args ) && "00:00:00" != rwmb_meta('location_wed_open', $args ) ? '' . rwmb_meta('location_wed_open', $args) . ' - ' . rwmb_meta('location_wed_close', $args) . '' : 'Closed') . '</p>';
									echo '<p>Thur: ' . ( rwmb_meta('location_thurs_open', $args ) && "00:00:00" != rwmb_meta('location_thurs_open', $args ) ? '' . rwmb_meta('location_thurs_open', $args) . ' - ' . rwmb_meta('location_thurs_close', $args) . '' : 'Closed') . '</p>';
									echo '<p>Fri: ' . ( rwmb_meta('location_fri_open', $args ) && "00:00:00" != rwmb_meta('location_fri_open', $args ) ? '' . rwmb_meta('location_fri_open', $args) . ' - ' . rwmb_meta('location_fri_close', $args) . '' : 'Closed') . '</p>';
									echo '<p>Sat: ' . ( rwmb_meta('location_sat_open', $args ) && "00:00:00" != rwmb_meta('location_sat_open', $args ) ? '' . rwmb_meta('location_sat_open', $args) . ' - ' . rwmb_meta('location_sat_close', $args) . '' : 'Closed') . '</p>';
									echo '<p>Sun: ' .( rwmb_meta('location_sun_open', $args ) && "00:00:00" != rwmb_meta('location_sun_open', $args ) ? '' . rwmb_meta('location_sun_open', $args) . ' - ' . rwmb_meta('location_sunn_close', $args) . '' : 'Closed') . '</p>';
								endif; ?>
			    	</div>
			    	<div class="col-md-6 margin-bottom-two">
			    		<?php if ( has_post_thumbnail() ) { ?>
					            	<p>
								    <?php the_post_thumbnail('medium-large', ['class' => 'img-responsive']); ?>
									</p>
								<?php } ?>
			    	<?php
							if( !empty($map) ):
							?>
							<!-- <div class="acf-map">
							<?php
							// $args = array(
							// 	'width'        => '100%',
							// 	'height'       => '480px',
							// 	// 'zoom'         => '14',
							// 	'marker'       => true,
							// 	'js_options' => array(
							// 		'zoom'         => '16',
							// 	)
							// 	// 'marker_icon'  => 'https://url_to_icon.png',
							// 	// 'marker_title' => 'Click me',
							// 	// 'info_window'  => '<h3>Title</h3><p>Content</p>.',
							// );
							// echo rwmb_meta( 'location_map', $args ); ?>
								<div class="marker" data-lat="<?php echo $map['latitude']; ?>" data-lng="<?php echo $map['longitude']; ?>"></div>
								<?php// echo do_shortcode( '[mapsmarker lat="'. $map['latitude'] .'" lon="'. $map['longitude'] .'" zoom="16" icon="hospital-building.png"]' ); ?>
								<?php// echo do_shortcode( '[mapsmarker marker="1"]' ); ?>
								<?php //echo do_shortcode( '[leaflet-map lat="'. $map['latitude'] .'" lon="'. $map['longitude'] .'" zoom="16"]' ); ?>
							</div> -->
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
									var map = new L.Map('map', {center: new L.LatLng(<?php echo $map['latitude']; ?>, <?php echo $map['longitude'] ?>), zoom: 16 });
									map.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text.
									// for all possible values and explanations see "Template Parameters" in https://msdn.microsoft.com/en-us/library/ff701716.aspx
									var imagerySet = "Road"; // AerialWithLabels | Birdseye | BirdseyeWithLabels | Road
									var bing = new L.BingLayer("AnCRy0VpPMDzYT6rOBqqqCNvNbUWvdSOv8zrQloRCGFnJZU28JK3c6cQkCMAHtCd", {type: imagerySet});
									map.addLayer(bing);
									/* [lat, lon, fillColor, strokeColor, labelClass, iconText, popupText] */
									var markers = [
										// example [ 34.74376029995541, -92.31828863640054, "00F","000","white","A","I am a blue icon." ],
										[ <?php echo $map['latitude']; ?>, <?php echo $map['longitude'] ?>, "9d2235","222", "transparentwhite", '<i class="fas fa-circle fa-sm"></i>', "" ]
									]
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
					<?php endif; ?>
					</div><!-- .col -->
			   	</div><!-- .row -->
			   	<?php $specialties = rwmb_meta('medical_specialties');
			   		if( $specialties ):
			   		$specialtiescols = partition( $specialties, 3 ); ?>
					<h3>Specialties at this Location</h3>
					<div class="row">
						<?php for ( $i = 0 ; $i < 3 ; $i++ ) { ?>
			    		<div class="col-md-4">
						<?php
						 	foreach( $specialtiescols[$i] as $specialty ):
							 $specialty_name = get_term( $specialty, 'specialty');
								echo $specialty_name->name . '<br/>';
						 	endforeach; ?>
			    		</div>
			    		<?php } // endfor?>
			    	</div>
			    <?php endif; ?>
			    <?php
				    $physicians = array();
				    $connected = new WP_Query( array(
						    'relationship' => array(
						        'id' => 'physicians_to_locations',
						        'to' => get_the_ID(), // You can pass object ID or full object
						    ),
						    'nopaging'     => true,

						) );

					while ( $connected->have_posts() ) : $connected->the_post();
					    $full_name = rwmb_meta('physician_first_name') .' ' .(rwmb_meta('physician_middle_name') ? rwmb_meta('physician_middle_name') . ' ' : '') . rwmb_meta('physician_last_name') . (rwmb_meta('physician_degree') ? ', ' . rwmb_meta('physician_degree') : '');
					    $physicians[get_post_meta(get_the_ID(), 'physician_full_name_meta', true)] = '<a href="'. get_the_permalink() .'">'. $full_name .'</a>';
					endwhile;
					ksort($physicians);
					$count = count($physicians);
					$c = 3;
					if ($count < 6) {
						$c = 2;
					}
					wp_reset_postdata();
			   		if( $physicians ):
			   		$physiciancols = partition( $physicians, $c ); ?>
					<h3>Physicians at this Location</h3>
					<div class="row">
						<?php for ( $i = 0 ; $i < $c ; $i++ ) { ?>
			    		<div class="col-md-<?php echo (12 / $c); ?>">
						<?php
						 	foreach( $physiciancols[$i] as $physician ):
								echo $physician . '<br/>';
						 	endforeach; ?>
			    		</div>
			    		<?php } // endfor?>
			    	</div>
			    <?php endif; ?>
		    <?php endwhile; // end of the loop. ?>

		</div>
		<?php wp_reset_query(); ?>
	</div>

    <div id="sidebar"></div>

  </div>

</div>

<?php get_footer(); ?>

<?php

function partition( $list, $p ) {
    $listlen = count( $list );
    $partlen = floor( $listlen / $p );
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice( $list, $mark, $incr );
        $mark += $incr;
    }
    return $partition;
}
?>