<?php
   	get_header();

	function custom_field_excerpt($title) {
			global $post;
			$text = get_field($title);
			if ( '' != $text ) {
				$text = strip_shortcodes( $text );
				$text = apply_filters('the_content', $text);
				$text = str_replace(']]>', ']]>', $text);
				$excerpt_length = 35; // 35 words
				$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
				$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
			}
			return apply_filters('the_excerpt', $text);
		}
	function wpdocs_custom_excerpt_length( $length ) {
	    return 35; // 35 words
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	add_filter( 'facetwp_template_use_archive', '__return_true' );

	get_template_part( 'header', 'image' ); ?>

	<div class="container uams-body">

	  <div class="row">

	    <div class="col-md-12 uams-content" role='main'>

	      <?php // Hard coded breadcrumbs 
	      		$tax = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") )
	      ?>
	    <nav class="uams-breadcrumbs" role="navigation" aria-label="breadcrumbs">
	    	<ul>
	    		<li><a href="http://www.uams.edu" title="University of Arkansas for Medical Scineces">Home</a></li>
	    		<li><a href="/" title="<?php echo str_replace('   ', ' ', get_bloginfo('title')); ?>"><?php echo str_replace('   ', ' ', get_bloginfo('title')); ?></a></li>
	    		<li><a href="/physicians/" title="Physicians">Physicians</a></li>
	    		<li class="current"><span><?php echo $tax->name; ?></span>
	    	</ul>
	    </nav>

	      <div id='main_content' class="uams-body-copy" tabindex="-1">

				<div class="row">

					<div class="col-md-8 people">

						<h1>Specialty: <?php echo single_cat_title( '', false ); ?></h1><hr>

					    <?php echo (term_description( '', false ) ? '<p>' .term_description( '', false ) . '</p>' : '' ); ?>

					    <?php
					    		$specialty_url = rwmb_meta( 'specialty_url', array( 'object_type' => 'term' ), $term->term_id );
					     		echo ($specialty_url ? '<p><a href="' . $specialty_url . '">More Information</a></p>' : '' ); ?>

					     <?php echo facetwp_display( 'facet', 'alpha' ); ?>

					    <?php echo facetwp_display( 'template', 'physician' ); ?>

					    <?php //echo do_shortcode('[facetwp load_more="true" label="Load more"]'); ?>
						<script src="https://www.docscores.com/widget/v2/uams/npi/lotw.js" async></script>
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
						</script>

					</div><!-- .col -->
					<div class="col-md-4">
			        	<?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); // based on install ?>
			        	<?php echo do_shortcode( '[accordion]
													    [section title="Advanced Filter"]
														<div class="fwp-filter">[facetwp facet="primary_care"]</div>
														<div class="fwp-filter">[facetwp facet="conditions"]</div>
														<div class="fwp-filter">[facetwp facet="patient_types"]</div>
														<div class="fwp-filter">[facetwp facet="physician_gender"]</div>
														<div class="fwp-filter">[facetwp facet="physician_language"]</div>
														<div class="fwp-filter specialty-filter">[facetwp facet="specialty_checkbox"]</div>
														<button onclick="FWP.reset();">Reset</button>
														[/section]
													[/accordion]' ); ?>
		        	</div>
				</div><!-- .row -->
   			</div><!-- main_content -->

    	</div><!-- uams-content -->
    <div id="sidebar"></div>

  </div>

</div>

<?php get_footer(); ?>
