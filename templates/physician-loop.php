<?php
	/**
	 *  Template Name: Physician Loop
	 *  Designed for physicians
	 */
?>
	<?php $i = 0; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $class = ($i%2 == 0)? 'whiteBackground': 'grayBackground'; ?>
	<?php $full_name = rwmb_meta('physician_first_name') .' ' .(rwmb_meta('physician_middle_name') ? rwmb_meta('physician_middle_name') . ' ' : '') . rwmb_meta('physician_last_name') . (rwmb_meta('physician_degree') ? ', ' . rwmb_meta('physician_degree') : '');
	      //$profileurl = '/directory/physician/' . $post->post_name .'/';
	?>
	<div class="<?php echo $class; ?> archive-box">
	    <div class="row">
	        <div class="col-md-12"><a href="<?php echo get_permalink($post->ID); ?>"><h2 class="mt0"><?php echo $full_name; ?></h2></a></div>
		</div>
		<div class="row">
	        <div class="col-md-3" class="margin-top-none margin-bottom-two">
	            <div class="margin-bottom-two">
	            	<span><a href="<?php echo get_permalink($post->ID); ?>" target="_self"><?php the_post_thumbnail( 'medium' ); ?></a></span>
	            </div>
				
				<?php if(rwmb_meta('physician_npi')) { 
					$request = wp_remote_get( 'https://transparency.nrchealth.com/widget/api/org-profile/uams/npi/' . rwmb_meta( 'physician_npi' ) . '/0?pretty' );

					if( is_wp_error( $request ) ) {
						return false; // Bail early
					}

					$body = wp_remote_retrieve_body( $request );

					$data = json_decode( $body );

					if( ! empty( $data ) ) {

						echo '<script>';
						print_r($data);
						echo '</script>';
						
						//foreach( $data->profile as $rating ) {
							echo '<div itemtype="http://schema.org/AggregateRating" itemprop="aggregateRating" itemscope="">';
							echo '<div class="ds-title">Patient Rating</div>';
							echo '<div><span class="ds-stars ds-stars'. $data->profile->averageStarRatingStr .'"></span></div>';
							echo '<div class="ds-xofy"><span class="ds-average" itemprop="ratingValue">'. $data->profile->averageRatingStr .'</span><span class="ds-average-max">out of 5</span></div>';
							echo '<div class="ds-ratings"><span class="ds-ratingcount" itemprop="ratingCount">'. $data->profile->reviewcount .'</span> Ratings</div>';
							echo '<div class="ds-comments"><span class="ds-commentcount">'. $data->profile->bodycount .'</span> Comments</div>';
							echo '</div>';
							//echo '<a href="' . esc_url( $rating->info->link ) . '">' . $product->info->title . '</a>';
						//}
					} ?>
				<!-- <div class="ds-summary" data-ds-id="<?php echo rwmb_meta( 'physician_npi' ); ?>"></div> -->
				<?php } ?>
	        </div>
	        <div class="col-md-9" class="margin-top-none margin-bottom-none">
	                <div class="row" class="margin-top-none margin-bottom-none">
	                    <div class="col-md-6">

	                        <p><?php echo ( rwmb_meta('physician_short_clinical_bio') ? rwmb_meta( 'physician_short_clinical_bio') : wp_trim_words( rwmb_meta( 'physician_clinical_bio' ), 30, ' &hellip;' ) ); ?></p>

	                         <a class="uams-btn btn-blue btn-sm" target="_self" title="View Profile" href="<?php echo get_permalink($post->ID); ?>">View Profile</a>
	                        <!-- <a class="more" target="_self" title="View Profile" href="<?php //echo $profileurl; ?>">View Profile</a> -->
							<?php if(rwmb_meta('physician_youtube_link')) { ?>
								<a class="uams-btn btn-red btn-play btn-sm" target="_self" title="View Physician Video" href="<?php echo rwmb_meta('physician_youtube_link'); ?>">View Video</a>
							<?php } ?>
	                        <p></p>

	                    </div>
	                    <div class="col-md-6">

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
							<?php

							$locations = new WP_Query( array(
							    'relationship' => array(
							        'id'   => 'physicians_to_locations',
							        'from' => get_the_ID(), // You can pass object ID or full object
							    ),
							    'nopaging'     => true,
							) );
							
							?>
							<?php if( $locations ): ?>
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

	                    </div><!-- .col-6 -->
	                </div><!-- .row -->

	        </div><!-- .col-9 -->
	    </div><!-- .row -->
	</div><!-- .color -->
	<?php $i++; ?>
	<?php endwhile; ?>
	<link rel="stylesheet" type="text/css" href="https://www.docscores.com/resources/css/docscores-lotw.v1330-2018121714.css" />
	<!-- <script src="https://www.docscores.com/widget/v2/uams/npi/lotw.js" async></script>
	<script>
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
				//$('.ds-comments').wrapInner('<a href="#PatientRatings"></a>');
			});
		});
	})(jQuery);
	</script> -->
	<?php else : ?>
	<p><?php _e( 'Sorry, no physicians matched your criteria.' ); ?></p>
	<?php endif; ?>