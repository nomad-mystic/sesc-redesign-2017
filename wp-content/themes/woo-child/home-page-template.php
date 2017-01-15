<?php
/**
 * Template Name: Home Page Template
 * @author Keith Murphy - nomad
 *
 * @package WooFramework
 * @subpackage Template
 */


require_once( 'lib/sesc_posts.php' );
// global $woo_options;
$sesc_posts = new SESCPosts();

// Gets all of the header area
get_header();

// $page_template = woo_get_page_template();
?>

    <div class="contanier">

            <section>
                <article>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12" style="border: solid #000 1px;">
                                  <div class="sesc-home-slider">
                                      <?php
                                      /**
                                      * @param string post_type - Type of post ie post, resources_post
                                      * @param string category_name  - Type of post ie resources-families-post
                                      */
                                      if ( class_exists( 'SESCPosts' ) ) {
                                           $sesc_posts->SESC_build_home_slider( 'post', 'home-slider-post' );
                                      }
                                      ?>
                                  </div>
                                </div>

                                <div class="col-xs-12 col-sm-12" style="border: solid #000 1px;">
                                  <div class="sesc-home-posts">
                                      <?php
                                      /**
                                      * @param string post_type - Type of post ie post, resources_post
                                      * @param string category_name  - Type of post ie resources-families-post
                                      */
                                      if ( class_exists( 'SESCPosts' ) ) {
                                           $sesc_posts->SESC_build_home_posts( 'post', 'home-post' );
                                      }
                                      ?>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <aside class="sesc-home-aside">
                            <!-- <div class="row"> -->
                                <div class="col-xs-12 col-sm-4" style="border: solid #000 1px; height: 100vh;">
                                    <p>testing</p>
                                </div>
                            <!-- </div> -->
                        </aside>
                    </div><!--end row-->
                </article>
            </section>


    </div><!--end contanier-->



    <!-- #content Starts -->
	<!-- <?php woo_content_before(); ?> -->
	<?php
	// if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'true' == $woo_options['woo_slider_biz_full'] ) ) {
	// 	$saved = $wp_query;
	// 	woo_slider_biz();
	// 	$wp_query = $saved;
	// }
	?>
    <!-- <div id="content" class="col-full business">

    	<div id="main-sidebar-container">

            #main Starts -->
            <!-- <?php woo_main_before(); ?> -->

	<?php
	// if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'false' == $woo_options['woo_slider_biz_full'] ) ) {
	// 	$saved = $wp_query;
	// 	woo_slider_biz();
	// 	$wp_query = $saved;
	// }
	?>

            <!-- <section id="main"> -->
<?php
	// woo_loop_before();

	// if ( have_posts() ) { $count = 0;
		// while ( have_posts() ) { the_post(); $count++;
			// woo_get_template_part( 'content', 'page-template-business' ); // Get the page content template file, contextually.
		// }
	// }

	// woo_loop_after();
?>
            <!-- </section><!/#main -->
            <!-- <?php woo_main_after(); ?> -->

			<!-- <?php get_sidebar(); ?> -->

		<!-- </div><!/#main-sidebar-container -->
		<!---Added by nomad for widget area-->

		<?php
		// wp_nav_menu( array( 'theme_location' => 'resources_menu', 'container_class' => 'primary-sidebar widget-area leftColNav', 'container_id' => 'resourceSidebarNav' ) );
		// wp_nav_menu([
		// 	'container' =>false,
		// 	'menu_class' => 'nav',
		// 	'echo' => true,
		// 	'before' => '',
		// 	'after' => '',
		// 	'link_before' => '',
		// 	'link_after' => '',
		// 	'depth' => 0,
		// 	'walker' => new SESC_menus()
		// ]);
		?>
		<!-- <?php if ( is_active_sidebar( 'resource_page' ) ) : ?> -->
			<!-- <aside id="resourceSidebarNav" class="primary-sidebar widget-area leftColNav" role="complementary"> -->
				<!-- <?php dynamic_sidebar( 'resource_page' ); ?> -->
			<!-- </aside><!#primary-sidebar -->
		<!-- <?php endif; ?> -->

    <!-- </div><!/#content -->
	<!-- <?php woo_content_after(); ?> -->

<?php get_footer(); ?>
