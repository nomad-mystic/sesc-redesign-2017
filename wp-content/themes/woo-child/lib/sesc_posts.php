<?php

global $wp_query;

class SESCPosts {


    public function init() {

    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Factory for WP_QUERY global
    * @param string post_type - Type of post ie post, resources_post
    * @param string category_name  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_posts_factory( $post_type = 'post', $category_name = null, $number ) {
        // WP_Query arguments
		$args = array (
			'post_type'              => array( $post_type ),
			'category_name'          => $category_name,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order title',
			'posts_per_page'         =>  $number
		);

        return $args;
    }


    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds HTMl for posts with home category 'home-post'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-post' - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_posts( $post_type, $category_name, $number = '-1') {
        // The Query
        $sesc_home_posts_args = $this->sesc_posts_factory($post_type, $category_name, $number);
        $sesc_home_posts_query = new WP_Query( $sesc_home_posts_args );

		// The Loop
		if ( $sesc_home_posts_query->have_posts() ) {
			while ( $sesc_home_posts_query->have_posts() ) {

				$sesc_home_posts_query->the_post();

				echo '<div class="entry-content row">';
                echo    '<div class="col-xs-12 sesc-home-post-container">';
                // echo        '<h1>' . get_the_title() . '</h1>';
                echo        '<figure>';
                echo            '<div class="floatLeft featured">';
                echo                get_the_post_thumbnail( $sesc_home_posts_query->get( 'ID' ) );
                echo            '</div>';
                echo        '</figure>';
		  		the_content();
 		  		echo     '</div>';
 		  		echo '</div>';

			}
            wp_reset_postdata();

		} else {

            echo '<div class="entry-content">';
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';

		}
    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds HTML for post with category 'home-slider-post'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_slider( $post_type, $category_name, $number = '4' ) {

        // The Query
        $sesc_slider_args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $sesc_slider_query = new WP_Query( $sesc_slider_args );

        ?>
        <div class="entry-content row" role="presentation">
            <div class="col-s-12 sesc-slider-container">
                <div id="sesc-home-slider" class="carousel slide" data-ride="carousel" data-interval="100000">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#sesc-home-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#sesc-home-slider" data-slide-to="1"></li>
                        <li data-target="#sesc-home-slider" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    <?php
                    if ( $sesc_slider_query->have_posts() ) {
            			while ( $sesc_slider_query->have_posts() ) {

            				$sesc_slider_query->the_post();

                            echo '<div class="sesc-slide-item item">';
                            echo '  <a href="' . get_permalink() . '" role="presentation">';
                            echo        get_the_post_thumbnail( $sesc_slider_query->get( 'ID' ) );
                            echo '  </a>';
                            echo '  <div class="sesc-slider-excerpt carousel-caption">';
                            echo '      <h1>' . get_the_title( $sesc_slider_query->get( 'ID' ) ) . '</h1>';
                            echo '  </div>';
                            echo '</div>';

            			}
                        wp_reset_postdata();
            		} else {

                        echo '<div class="entry-content">';
                        echo '  <h1>Sorry! No Posts Found.</h1>';
                        echo '</div>';

            		}
                    ?>
                    </div><!-- end carousel-inner-->
                </div><!-- end carousel-->
            </div><!--end sesc-slider-container-->
        </div><!--end row-->
        <?php

    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds HTML for post with category 'home-news-widget'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_news_widget( $post_type, $category_name, $number = '-1' ) {
        // The Query
        // $sesc_home_news_args = $this->sesc_posts_factory( $post_type, $category_name, $number );

        $sesc_home_news_args = array (
			'post_type'              => $post_type,
			// 'category_name'          => $category_name,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order title',
			'posts_per_page'         =>  $number
		);

        $sesc_home_news_query = new WP_Query( $sesc_home_news_args );

        $site_url = get_site_url();

        echo '<div class="entry-content row sesc-home-news-post-container">';

		if ( $sesc_home_news_query->have_posts() ) {
			while ( $sesc_home_news_query->have_posts() ) {

				$sesc_home_news_query->the_post();

                echo    '<div class="col-xs-12 news-item">';
                echo        '<a href="' . get_permalink() . '">';
                echo            '<h1 class="title">' . get_the_title() . '</h1>';
                echo        '</a>';
                echo    '<p>';

                // substr( the_content(), 0, 30 );
                the_excerpt();

                echo    '</p>';
 		  		echo     '</div>';

			}
            wp_reset_postdata();

		} else {

            echo '<div class="entry-content">';
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';

		}

        echo '</div>'; // row
        echo     '<div class="home-subscribe-button">';
        echo        '<a href="' . $site_url . '/stay-current/news/" role="button">View Archives</a>';
        echo     '</div>';

    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds the google calendar for the aside
    * Category home-news-widget
    */
    public function sesc_build_home_aside_google_calendar() {

        echo    '<div class="col-xs-12 sesc-home-calendar-container embed-responsive embed-responsive-4by3">';
        echo        '<iframe src="https://calendar.google.com/calendar/embed?src=do2v2kmb9p6o2ilis9345qc9dk%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>';
        echo     '</div>';

    }
}// End class
