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
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
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

			})(jQuery);
			</script>

		    <div class="margin-bottom-one search-box-lg"><?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?></div>
		    <?php while ( have_posts() ) : the_post(); ?>	    	
		    	<div class="row">
			    	<div class="col-md-6">
			    		<h1><?php the_title(); ?></h1>
							<?php $map = rwmb_get_value('location_map'); ?>
					        <p><?php echo rwmb_meta('location_address_1', $args, get_the_ID() ); ?><br/>
					            <?php echo ( rwmb_meta('location_address_2', $args ) ? rwmb_meta('location_address_2', $args) . '<br/>' : ''); ?>
					            <?php echo rwmb_meta('location_city', $args); ?>, <?php echo rwmb_meta('location_state', $args); ?> <?php echo rwmb_meta('location_zip', $args, get_the_ID()); ?><br/>
					            <?php echo rwmb_meta('location_phone', $args); ?>
					            <?php echo ( rwmb_meta('location_fax', $args) ? '<br/>Fax: ' . rwmb_meta('location_fax', $args) . '' : ''); ?>
					            <?php echo ( rwmb_meta('location_email', $args ) ? '<br/><a href="mailto:"' . rwmb_meta('location_email', $args ) . '">' . rwmb_meta('location_email', $args ) . '</a>' : ''); ?></p>
					            
					            <?php echo ( rwmb_meta('location_web_name', $args ) ? '<p><a class="uams-btn btn-blue btn-sm" href="' . rwmb_meta( 'location_url', $args ) . '" title="'. rwmb_meta('location_web_name', $args ) . '">Clinic Webpage</a></p>' : ''); ?>
					            <p><a class="uams-btn btn-red btn-sm btn-external" href="https://www.google.com/maps/dir/Current+Location/<?php echo $map['latitude'] ?>,<?php echo $map['longitude'] ?>" target="_blank">Get Directions</a>
					        </p>
					        <?php echo ( rwmb_meta('location_appointments', $args ) ? '<h3>Appointments</h3><p>' . rwmb_meta('location_appointments', $args) . '</p>' : ''); ?>
							<h3>Hours of Operation</h3>
					        <?php echo ( rwmb_meta('location_mon_open', $args ) ? '<p>Mon: ' . rwmb_meta('location_mon_open', $args) . ' - ' . rwmb_meta('location_mon_close', $args) . '</p>' : ''); ?>
							<?php echo ( rwmb_meta('location_tues_open', $args ) ? '<p>Tues: ' . rwmb_meta('location_tues_open', $args) . ' - ' . rwmb_meta('location_tues_close', $args) . '</p>' : ''); ?>	
							<?php echo ( rwmb_meta('location_wed_open', $args ) ? '<p>Wed: ' . rwmb_meta('location_wed_open', $args) . ' - ' . rwmb_meta('location_wed_close', $args) . '</p>' : ''); ?>	
							<?php echo ( rwmb_meta('location_thurs_open', $args ) ? '<p>Thur: ' . rwmb_meta('location_thurs_open', $args) . ' - ' . rwmb_meta('location_thurs_close', $args) . '</p>' : ''); ?>	
							<?php echo ( rwmb_meta('location_fri_open', $args ) ? '<p>Fri: ' . rwmb_meta('location_fri_open', $args) . ' - ' . rwmb_meta('location_fri_close', $args) . '</p>' : ''); ?>	
							<?php echo ( rwmb_meta('location_sat_open', $args ) ? '<p>Sat: ' . rwmb_meta('location_sat_open', $args) . ' - ' . rwmb_meta('location_sat_close', $args) . '</p>' : ''); ?>	
							<?php echo ( rwmb_meta('location_sun_open', $args ) ? '<p>Sun: ' . rwmb_meta('location_sun_open', $args) . ' - ' . rwmb_meta('location_sunn_close', $args) . '</p>' : ''); ?>	
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
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $map['latitude']; ?>" data-lng="<?php echo $map['longitude']; ?>"></div>
							</div>
		    	
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