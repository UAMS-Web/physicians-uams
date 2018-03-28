<?php
	// get the currently queried taxonomy term, for use later in the template file
	$term = get_queried_object();

	// Define the query
	$args = array(
	    'post_type' => 'physicians',
	    'medical_procedures' => $term->slug,
	);
	$the_query = new WP_Query( $args );

   	get_header();
   	$sidebar = get_post_meta($post->ID, "sidebar");
   	$breadcrumbs = get_post_meta($post->ID, "breadcrumb");
 ?>
<?php
	function custom_field_excerpt($title) {
			global $post;
			$text = rwmb_meta($title);
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

	?>
	<?php get_template_part( 'header', 'image' ); ?>

	<!--<div class="col-md-12 mobile-menu"> <?php get_template_part( 'menu', 'mobile' ); ?> </div>-->
	<div class="container uams-body">

	  <div class="row">

	    <div class="col-md-12 uams-content" role='main'>

	      <?php
		      if((!isset($breadcrumbs[0]) || $breadcrumbs[0]!="on")) {
		      	get_template_part( 'breadcrumbs' );
		      }
		  ?>

	      <div id='main_content' class="uams-body-copy" tabindex="-1">

		      <style>
				    .whiteBackground { background-color: #fff; }
					.grayBackground { background-color: #fafafa; }
				</style>

				<script>
(function($) {
    $(document).on('facetwp-loaded', function() {
        $.each(FWP.settings.num_choices, function(key, val) {
            var $parent = $('.facetwp-facet-' + key).closest('.fwp-widget');
            (0 === val) ? $parent.hide() : $parent.show();
        });
    });
})(jQuery);
</script>
				<div class="row">

					<div class="col-md-8 facetwp-template">

					    <h1>Medical Procedure: <?php echo single_cat_title( '', false ); ?></h1><hr>

					    <?php echo (term_description( '', false ) ? '<p>' .term_description( '', false ) . '</p>' : '' ); ?>

					    <?php echo facetwp_display( 'template', 'procedures' ); ?>

					    <?php echo do_shortcode('[facetwp load_more="true" label="Load more"]'); ?>

					</div><!-- .col -->
					<div class="col-md-4">
			        	<?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?>
			        	<?php echo do_shortcode( '[accordion]
													    [section title="Advanced Filter"]
														<div class="fwp-filter">[facetwp facet="primary_care"]</div>
														<div class="fwp-filter">[facetwp facet="conditions"]</div>
														<div class="fwp-filter">[facetwp facet="patient_types"]</div>
														<div class="fwp-filter">[facetwp facet="physician_gender"]</div>
														<div class="fwp-filter">[facetwp facet="physician_language"]</div>
														<div class="fwp-filter">[facetwp facet="alpha"]</div>
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
