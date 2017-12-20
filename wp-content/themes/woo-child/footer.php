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

$site_permalink = get_permalink();
$site_base_url = get_site_url();
$local_home_page_url = 'http://localhost/sesc_new/home-page-redesign/';

require_once(__DIR__ . '/lib/sesc_menus.php');

if ( $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' && $site_permalink !== $local_home_page_url ) {
    woo_footer_top();
    woo_footer_before();

}

?>
	<footer id="footer" class="col-full">

        <?php

        /**
         * @summary this is the footer for the home page and the whole site at some time
         */
        if ( $site_permalink === $local_home_page_url || $site_permalink === 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {

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
		if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
			woo_footer_inside();
		}

		?>

		<div id="copyright" class="col-left">
			<?php
			if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
				woo_footer_left();
			}

			?>


		</div>

		<div id="credit" class="col-right">
			<?php
			if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
				woo_footer_right();
		 	}

			?>
		</div>
	</footer>

	<?php
	if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		woo_footer_after();
 	}

	?>

	</div><!-- /#inner-wrapper -->

</div><!-- /#wrapper -->
<!-- <script src="<?php echo $jquer_ui_min ?>" charset="utf-8"></script>
<script src="<?php echo $bootstrap_js_min ?>" charset="utf-8"></script>
<script src="<?php echo $aria_walker_scritps ?>" charset="utf-8"></script>
<script src="<?php echo $sesc_home_scripts ?>" charset="utf-8"></script> -->
<div class="fix"></div><!--/.fix-->

<?php
	 if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
		wp_footer();
	 }
 ?>
 <?php
 	 if ( $site_permalink !== $local_home_page_url && $site_permalink != 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
 		woo_foot();
 	 }
	?>

	<?php

	if ( $site_permalink == 'http://specialeducationsupportcenter.org/home-page-redesign/' || $site_base_url === $local_home_page_url ) {
		$sesc_home_scripts = get_stylesheet_directory_uri() . '/build/js/sesc_home_page_scripts.js';
		$aria_walker_scritps = get_stylesheet_directory_uri() . '/vendor/aria_walker.js';
		$bootstrap_js_min = get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js';
		$jquer_ui_min = get_stylesheet_directory_uri() . '/vendor/jquery-ui.min.js';
	?>


	<?php
	}
	?>
</body>
</html>
