<?php if ( 'post' == get_post_type() || 'page' == get_post_type() ) { the_date('F j, Y', '<p class="date">', '</p>'); } ?>
<h2>
  <a href="<?php echo uams_get_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a>
</h2>
<?php
if (get_option('show_byline_on_posts')) :
?>
<div class="author-info">
    <?php the_author(); ?>
    <p class="author-desc"> <small><?php the_author_meta(); ?></small></p>
</div>
<?php
endif;
  if ( ! is_home() && ! is_search() && ! is_archive() ) :
    uams_mobile_menu();
  endif; ?>
 <div class="row">
<?php if ( has_post_thumbnail() ) : ?>
 <div class="col-md-3">
 <?php	the_post_thumbnail( 'thumbnail' , 'style=margin-bottom:5px;'); ?>
 </div><div class="col-md-9">
<?php else: ?>
 <div class="col-md-12">
<?php endif; ?>
<?php if ( 'physicians' == get_post_type() ) { ?>
	<p><?php echo ( rwmb_meta('physician_short_clinical_bio') ? rwmb_meta( 'physician_short_clinical_bio') : wp_trim_words( rwmb_meta( 'physician_clinical_bio' ), 30, ' &hellip;' ) ); ?></p>
	<a class="uams-btn btn-blue btn-sm" target="_self" title="View Profile" href="<?php echo get_permalink($post->ID); ?>">View Profile</a>
<?php } elseif ( 'locations' == get_post_type() ) { ?>
	<p><?php echo rwmb_meta('location_address_1', $args, get_the_ID() ); ?><br/>
		            <?php echo ( rwmb_meta('location_address_2', $args ) ? rwmb_meta('location_address_2', $args) . '<br/>' : ''); ?>
		            <?php echo rwmb_meta('location_city', $args); ?>, <?php echo rwmb_meta('location_state', $args); ?> <?php echo rwmb_meta('location_zip', $args, get_the_ID()); ?><p/>
		        <p><a class="uams-btn btn-sm btn-external" href="https://www.google.com/maps/dir/Current+Location/<?php echo $map['latitude'] ?>,<?php echo $map['longitude'] ?>" target="_blank">Get Directions</a>
				</p>
<?php } else {
 		the_excerpt();
 	}
 ?>
 </div>
 </div>
<hr>
