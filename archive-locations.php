<?php get_header();

  add_filter( 'facetwp_template_use_archive', '__return_true' );

  get_template_part( 'header', 'image' ); ?>

  <div class="container uams-body">

    <div class="row">

      <div class="col-md-12 uams-content" role='main'>

        <?php uams_site_title(); ?>

      <?php // Hard coded breadcrumbs ?>
      <nav class="uams-breadcrumbs" role="navigation" aria-label="breadcrumbs">
        <ul>
          <li><a href="http://www.uams.edu" title="University of Arkansas for Medical Scineces">Home</a></li>
          <li><a href="/" title="<?php echo str_replace('   ', ' ', get_bloginfo('title')); ?>"><?php echo str_replace('   ', ' ', get_bloginfo('title')); ?></a></li>
          <li class="current" title="Locations"><span>Locations</span></li>
        </ul>
      </nav>

        <div id='main_content' class="uams-body-copy" tabindex="-1">

          <h1>Clinical Locations</h1><hr>

        <div class="row">
              <div class="col-md-4">
                <?php echo do_shortcode( '[wpdreams_ajaxsearchpro id=1]' ); ?>
                <?php echo do_shortcode( '[accordion]
                              [section title="Advanced Filter" active="true"]     
                              <div class="fwp-filter">[facetwp facet="specialties"]</div>
                            <button onclick="FWP.reset()">Reset</button>
                            [/section]
                          [/accordion]' ); ?>
              </div>
          <div class="col-md-8 people">
            <?php //echo facetwp_display( 'facet', 'alpha' ); ?>
            <div class="row">
              <div class="col-md-8 text-center fwp-counts">
                <?php echo facetwp_display( 'counts' ); ?> Locations
              </div>
              <div class="col-md-4 text-right">
                <?php echo facetwp_display( 'sort' ); ?>
              </div>
            </div>
            <hr>
            <?php echo facetwp_display( 'template', 'locations' ); ?>
            <?php //get_template_part( 'templates/physician-loop' ); ?>
            <?php //echo facetwp_display( 'pager' ); ?>
            <?php //echo do_shortcode('[facetwp load_more="true" label="Load more"]'); ?>
          </div><!-- .col -->
        </div><!-- .row -->

        </div><!-- main_content -->

      </div><!-- uams-content -->
    <div id="sidebar"></div>

  </div>

</div>

<?php get_footer(); ?>