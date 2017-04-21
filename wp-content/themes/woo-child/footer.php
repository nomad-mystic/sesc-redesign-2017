<?php

/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options;


require_once(__DIR__ . '/lib/sesc_menus.php');


woo_footer_top();
woo_footer_before();

?>
	<footer id="footer" class='col-full "' . <?php do_action( 'sesc_active_page', $post ); ?> . ''>

        <?php
        function sesc_footer_classes( $post ) {
            if ( is_home() || get_home_path() == '/var/www/html/sesc/' ) {
                echo 'testing';
            }
        }
        add_action( 'sesc_active_page', 'sesc_footer_classes');

        if ( is_home() || get_home_path() === '/var/www/html/sesc/') {

            if ( class_exists( 'SESC_menus' ) ) {
                $sesc_menus = new SESC_menus();
                $sesc_menus->sesc_build_custom_footer_menu();
            }
        }
        ?>
		<?php woo_footer_inside(); ?>

		<div id="copyright" class="col-left">

			<?php woo_footer_left(); ?>

		</div>

		<div id="credit" class="col-right">

			<?php woo_footer_right(); ?>

		</div>

	</footer>

	<?php woo_footer_after(); ?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->

<div class="fix"></div><!--/.fix-->

<?php wp_footer(); ?>

<?php woo_foot(); ?>

</body>
</html>
