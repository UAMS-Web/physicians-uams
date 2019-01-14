<?php get_header(); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uams-body">

  <div class="row">

    <div <?php uams_content_class(); ?> role='main'>

      <?php uams_site_title(); ?>

      <?php get_template_part('menu', 'mobile'); ?>

      <?php get_template_part( 'breadcrumbs' ); ?>

      <div id='main_content' class="uams-body-copy" tabindex="-1">

	  <h2>Search Results for <?php /* Search Count */ $allsearch = new SWP_Query("s=$s&posts_per_page=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); ?></h2>

        <?php
          if ( have_posts() ) :
            echo '<p>'. $count . ' results found</p>';
            while ( have_posts() ) : the_post();
              get_template_part( 'content', 'archive' );
            endwhile;
			  echo '<p>' . $count . ' results found.</p>';
          else :
            echo '<h3 class=\'no-results\'>Sorry, no results matched your criteria.</h3>';
          endif;
        ?>


        <?php posts_nav_link(' '); ?>

      </div>

    </div>

    <?php get_sidebar() ?>

  </div>

</div>
<style>
	.search-terms { font-style: italic; }
</style>

<?php get_footer(); ?>
