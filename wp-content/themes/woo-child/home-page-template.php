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
        <article class="sesc-home-main-article">
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

                        <div class="col-xs-12 col-sm-12 sesc-home-post-parent-col">
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
                                   $sesc_posts->sesc_build_home_news_widget( 'news', 'home-news-widget', '4');
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
                <div class="col-sm-12 col-md-3 sesc-footer-teachers button">
                    <a href="#" role="button">Teachers</a>
                </div>
                <div class="col-sm-12 col-md-3 sesc-footer-admin button">
                    <a href="#" role="button">Administrators</a>
                </div>
                <div class="col-sm-12 col-md-3 sesc-footer-families button">
                    <a href="http://specialeducationsupportcenter.org/resources/resources-families/" role="button">Families</a>
                </div>
                    <div class="col-sm-12 col-md-3 sesc-footer-partners button">
                        <a href="#" role="button">Partners</a>
                    </div>
                </div>
            </div>
        </article>
    </section>
</div><!--end contanier-->

<?php get_footer(); ?>
