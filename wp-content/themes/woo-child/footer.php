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


	if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		woo_footer_top();
 	   	woo_footer_before();

	}

?>
	<footer id="footer" class="col-full">

        <?php
        // function sesc_footer_classes( $post ) {
        //     if ( is_home() || get_home_path() == '/var/www/html/sesc/' ) {
        //         echo 'testing';
        //     }
        // }
        // add_action( 'sesc_active_page', 'sesc_footer_classes');
		// var_dump(is_home());
		// die(is_home());
        if ( get_permalink() === 'http://localhost/sesc/' || get_permalink() == 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {

            if ( class_exists( 'SESC_menus' ) ) {
                $sesc_menus = new SESC_menus();
                $sesc_menus->sesc_build_custom_footer_menu();
            }
			?>
			<div class="row">
			  	<div class="col-md-12 col-lg-6 sesc-footer-copyright">
			  		<h4>&copy;2017, Washington Education Association</h4>
			  	</div>
			</div>
			<?php
        }
        ?>

		<?php
		if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
			woo_footer_inside();
		}

		?>

		<div id="copyright" class="col-left">
			<?php
			if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
				woo_footer_left();
			}

			?>


		</div>

		<div id="credit" class="col-right">
			<?php
			if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
				woo_footer_right();
		 	}

			?>
		</div>

	</footer>

	<?php
	if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		woo_footer_after();
 	}

	?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->

<div class="fix"></div><!--/.fix-->

<?php
	 if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		wp_footer();
	 }
 ?>
 <?php
 	 if ( get_permalink() != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
 		woo_foot();
 	 }
	?>

	<?php

	if ( get_permalink() == 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		$sesc_home_scripts = get_stylesheet_directory_uri() . '/build/js/sesc_home_page_scripts.js';
		$aria_walker_scritps = get_stylesheet_directory_uri() . '/vendor/aria_walker.js';
		$bootstrap_js_min = get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js';
	?>
		<script src="<?php echo $bootstrap_js_min ?>" charset="utf-8"></script>
		<script src="<?php echo $aria_walker_scritps ?>" charset="utf-8"></script>
		<script src="<?php echo $sesc_home_scripts ?>" charset="utf-8"></script>

	<?php
	}
	?>
</body>
</html>
