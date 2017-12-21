<?php
/**
 * Template Name: SESC Our Team Template
 *
 * The business page template displays your posts with a "business"-style
 * content slider at the top.
 *
 * @package WooFramework
 * @subpackage Template
 */

require_once( __DIR__ . '/lib/sesc_posts.php');


if ( class_exists('SESCPosts' ) ) {

	$sesc_posts = new SESCPosts();

}

global $woo_options, $wp_query;
get_header();

$page_template = woo_get_page_template();
?>
    <!-- #content Starts -->
<?php woo_content_before(); ?>
<?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'true' == $woo_options['woo_slider_biz_full'] ) ) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>
    <div id="content" class="col-full business">

        <div id="main-sidebar-container">

            <!-- #main Starts -->
			<?php woo_main_before(); ?>

			<?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'false' == $woo_options['woo_slider_biz_full'] ) ) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>

            <section id="main">
                <div id="ourTeamPage" class="aboutPageParentPage">
                    <h2>Our Team</h2>
				<?php
				woo_loop_before();

				/**
				 * @author Keith Murphy - nomad - nomadmystics@gmail.com
				 * @param string post_type - Type of post ie post, resources_post, our_team
				 * @param string category_name  - Type of post ie resources-families-post
				 * @param string $number  - Number of posts
				 */

				if ( class_exists( 'SESCPosts' ) ) {
					$sesc_posts->sesc_build_our_team_posts( 'our_team', null );
//					$sesc_posts->sesc_build_our_team_posts( 'our_team', 'special-ed-cadre' );
//					$sesc_posts->sesc_build_our_team_posts( 'our_team', 'consultants' );
				}

				woo_loop_after();
				?>
                </div>
            </section><!-- /#main -->
			<?php woo_main_after(); ?>

			<?php get_sidebar(); ?>

        </div><!-- /#main-sidebar-container -->

        <!---Added by nomad for widget area-->
		<?php if ( is_active_sidebar( 'about_page' ) ) : ?>
            <aside id="aboutPageNAV" class="primary-sidebar widget-area leftColNav" role="complementary">
				<?php dynamic_sidebar( 'about_page' ); ?>
            </aside><!-- #primary-sidebar -->
		<?php endif; ?>

    </div><!-- /#content -->
<?php woo_content_after(); ?>

<?php get_footer(); ?>