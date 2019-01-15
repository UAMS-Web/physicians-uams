<?php get_header();

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

	    <?php // Hard coded breadcrumbs ?>
	    <nav class="uams-breadcrumbs" role="navigation" aria-label="breadcrumbs">
	    	<ul>
	    		<li><a href="http://www.uams.edu" title="University of Arkansas for Medical Scineces">Home</a></li>
	    		<li><a href="/" title="<?php echo str_replace('   ', ' ', get_bloginfo('title')); ?>"><?php echo str_replace('   ', ' ', get_bloginfo('title')); ?></a></li>
	    		<li class="current"><span>Physicians</span></li>
	    	</ul>
	    </nav>

	      <div id='main_content' class="uams-body-copy" tabindex="-1">

	      		<?php
					$fwp_filter = '';
					$uri = $_SERVER["REQUEST_URI"];
					if( strpos($uri, 'fwp_') !== false ) {
						$fwp_filter = 'active="true"';
					}
				 ?>

				<div class="row">
		        	<div class="col-md-4">
			        	<?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?>
			        	<?php echo do_shortcode( '[accordion]
													    [section title="Advanced Filter" '. $fwp_filter .']
													    <div class="fwp-filter">[facetwp facet="primary_care"]</div>
														<div class="fwp-filter">[facetwp facet="conditions"]</div>
														<div class="fwp-filter">[facetwp facet="patient_types"]</div>
														<div class="fwp-filter">[facetwp facet="physician_gender"]</div>
														<div class="fwp-filter">[facetwp facet="physician_language"]</div>
														<!--<div class="fwp-filter">[facetwp facet="alpha"]</div>-->
														<div class="fwp-filter">[facetwp facet="regional"]</div>
														<button onclick="FWP.reset()">Reset</button>
														[/section]
													[/accordion]' ); ?>
		        	</div>
					<div class="col-md-8 people">
						<?php echo facetwp_display( 'facet', 'alpha' ); ?>
						<div class="row">
				        	<div class="col-md-8 text-center">
								<?php echo facetwp_display( 'counts' ); ?> Doctors
							</div>
				        	<div class="col-md-4 text-right">
								<?php echo facetwp_display( 'sort' ); ?>
							</div>
						</div>
						<hr>
						<?php echo facetwp_display( 'template', 'physician' ); ?>
						<?php //get_template_part( 'templates/physician-loop' ); ?>
						<?php //echo facetwp_display( 'pager' ); ?>
						<?php //echo do_shortcode('[facetwp load_more="true" label="Load more"]'); ?>

						<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-accessible-modal-window-aria.js"></script>
						<div id="why_not_modal" class="hidden">
							There is no publicly available rating for this medical professional for one of two reasons: 1) he or she does not see patients or 2) he or she sees patients but has not yet received the minimum number of Patient Satisfaction Reviews. To be eligible for display, we require a minimum of 30 surveys. This ensures that the rating is statistically reliable and a true reflection of patient satisfaction.
						</div>
					</div><!-- .col -->
				</div><!-- .row -->
   			</div><!-- main_content -->

    	</div><!-- uams-content -->
    <div id="sidebar"></div>

  </div>

</div>

<?php get_footer(); ?>
