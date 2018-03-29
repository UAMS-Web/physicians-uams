<?php get_header(); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uams-body">

  <div class="row">

    <div <?php uams_content_class(); ?> role='main'>

      <?php uams_site_title(); ?>

      <?php get_template_part( 'menu', 'mobile' ); ?>

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

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post(); ?>
            <h2>
              <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a>
            </h2>
            <?php
             if ( has_post_thumbnail() ) :
              the_post_thumbnail( 'thumbnail' , 'style=margin-bottom:5px;');
             endif;
            ?>
            <?php the_excerpt(); ?>
            <hr>

        <?php
          endwhile;
        ?>
        </br>
        <?php posts_nav_link(' ', 'Previous page', 'Next page'); ?>

      </div>

    </div>

    <?php get_sidebar() ?>

  </div>

</div>

<?php get_footer(); ?>
