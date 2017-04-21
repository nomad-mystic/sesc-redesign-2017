<?php
/**
 * Template Name: Home Page Template
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
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

<div class="container-fluid sesc-no-padding">
    <section>
        <article>
            <div class="row sesc-no-margin" role="main">
                <div class="col-xs-12 col-sm-8 sesc-section">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="sesc-home-slider">
                            <?php
                            /**
                            * @author Keith Murphy - nomad - nomadmystics@gmail.com
                            * @param string $post_type - Type of post ie post, resources_post
                            * @param string $category_name  - Type of post ie resources-families-post
                            * @param string $number  - Number of posts
                            */
                            if ( class_exists( 'SESCPosts' ) ) {
                               $sesc_posts->sesc_build_home_slider( 'post', 'home-slider-post' );
                            }
                            ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12">
                            <div class="sesc-home-posts">
                            <?php
                            /**
                            * @author Keith Murphy - nomad - nomadmystics@gmail.com
                            * @param string post_type - Type of post ie post, resources_post
                            * @param string category_name  - Type of post ie resources-families-post
                            * @param string $number  - Number of posts
                            */
                            if ( class_exists( 'SESCPosts' ) ) {
                               $sesc_posts->sesc_build_home_posts( 'post', 'home-post' );
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="sesc-home-aside" role="complementary">
                    <!-- <div class="row"> -->
                        <div class="col-xs-12 col-sm-4">
                            <div class="row">
                                <div class="col-xs-12">
                                <?php
                                /**
                                * @author Keith Murphy - nomad - nomadmystics@gmail.com
                                * @param string post_type - Type of post ie post, resources_post
                                * @param string category_name  - Type of post ie resources-families-post
                                * @param string $number  - Number of posts
                                */
                                if ( class_exists( 'SESCPosts' ) ) {
                                   $sesc_posts->sesc_build_home_news_widget( 'post', 'news-post', '4');
                                }
                                ?>
                                </div>
                                <div class="col-xs-12">
                                <?php
                                /**
                                * @author Keith Murphy - nomad - nomadmystics@gmail.com
                                * @summary Builds HTML for the google calander
                                */
                                if ( class_exists( 'SESCPosts' ) ) {
                                   $sesc_posts->sesc_build_home_aside_google_calendar();
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                </aside>
            </div><!--end row-->
        </article>
    </section>
    <section>
        <article class="sesc-call-to-action-footer" role="menu" aria-label="Secondary">
            <div class="row">
                <div class="col-sm-12 col-md-3 sesc-footer-teachers">
                    <a href="#" role="button">Teachers</a>
                </div>
                <div class="col-sm-12 col-md-3 sesc-footer-admin">
                    <a href="#" role="button">Administrators</a>
                </div>
                <div class="col-sm-12 col-md-3 sesc-footer-families">
                    <a href="http://specialeducationsupportcenter.org/resources/resources-families/" role="button">Families</a>
                </div>
                    <div class="col-sm-12 col-md-3 sesc-footer-partners">
                        <a href="#" role="button">Partners</a>
                    </div>
                </div>
            </div>
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
