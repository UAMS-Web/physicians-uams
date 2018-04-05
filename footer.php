    <div role="contentinfo" class="uams-footer">

        <div id="footer-widgets" class="secondary">
            <div class="flexible-widgets widget-area container<?php echo footer_widget_area_class( 'footer-flex-widget' ); ?>">
                <?php
                if(is_active_sidebar('footer-flex-widget')){
                dynamic_sidebar('footer-flex-widget');
                }
                ?>
            </div>
        </div>


        <a href="http://www.uams.edu" class="footer-wordmark">University of Arkansas for Medical Sciences</a> 

        <nav aria-label="footer links">
            <ul class="footer-links">
<!--                 <li><a href="http://www.uams.edu/accessibility">Accessibility</a></li> -->
                <li><a href="http://uamshealth.com/disclaimer/">Disclaimer</a></li>
                <li><a href="http://jobs.uams.edu">Jobs</a></li>
                <li><a href="http://uamshealth.com/privacy/#legal">Copyright Statement</a></li>
                <li><a href="http://uamshealth.com/privacy/">Privacy</a></li>
                <li><a href="http://uamshealth.com/termsofuse/">Terms</a></li>
            </ul>
        </nav>
        <?php if ( has_nav_menu( 'nondiscrimination-menu' ) ) { ?>
        <nav class="nondiscrimination-menu" role="navigation" aria-label="<?php _e( 'Non-discrimination Notice', 'textdomain' ); ?>">
        <h5>Non-discrimination Notice</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'nondiscrimination-menu', 'container' => false, 'menu_class' => 'nondiscrimination-links' ) ); ?>
        </nav>
        <?php } ?>

        <p>&copy; <?php echo date("Y"); ?> University of Arkansas for Medical Sciences  |  Little Rock, AR</p>

    </div>

    </div><!-- #uams-container-inner -->
    </div><!-- #uams-container -->

<?php wp_footer(); ?>

<?php
    if ( get_post_meta( get_the_ID() , 'custom_footer_script' , 'true' ) )
		echo get_post_meta( get_the_ID() , 'custom_footer_script' , 'true' );
    ?>

</body>
</html>
