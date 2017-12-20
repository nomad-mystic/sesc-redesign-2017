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
     * @param string $menu_order  - The order posts will be desplay
     * @return array $args
    */
    public function sesc_posts_factory( $post_type = 'post', $category_name = null, $number = '3', $menu_order = 'menu_order title') {
        // WP_Query arguments
		$args = [
			'post_type'              => [ $post_type ],
			'category_name'          => $category_name,
			'order'                  => 'ASC',
			'orderby'                => $menu_order,
			'posts_per_page'         => $number
		];

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
    public function sesc_build_home_slider( $post_type, $category_name, $number = '3', $menu_order ) {

        // The Query
        $sesc_slider_args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $sesc_slider_query = new WP_Query( $sesc_slider_args );

        ?>
        <div class="entry-content row" role="presentation">
            <div class="col-s-12 sesc-slider-container">
                <div id="sesc-home-slider" class="carousel slide" data-ride="carousel" data-interval="100000">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#sesc-home-slider" data-// padding: 2em;slide-to="0" class="active"></li>
                        <li data-target="#sesc-home-slider" data-slide-to="1"></li>
                        <li data-target="#sesc-home-slider" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    <?php
                    if ( $sesc_slider_query->have_posts() ) {
            			while ( $sesc_slider_query->have_posts() ) {

            				$sesc_slider_query->the_post();

                            echo '<div class="sesc-slide-item item" role="presentation">';
                            // echo '  <a href="' . get_permalink() . '" role="presentation">';
                            echo        get_the_post_thumbnail( $sesc_slider_query->get( 'ID' ) );
                            // echo '  </a>';
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
                    ?>CtG Sta
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

        $sesc_home_news_args = [
            'post_type'              => $post_type,
            // 'category_name'          => $category_name,
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'posts_per_page'         => $number,
        ];

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
    * @author Keith Murphy - nomad - nomadmystics@gmail.com// padding: 2em;
    * @summary Builds the google calendar for the aside
    *
    */
    public function sesc_build_home_aside_google_calendar() {

        $calendar_url = '';
        $user_pat = get_user_by( 'email', 'patti3jo@aol.com' );
        $user_gary = get_user_by( 'email', 'obee@learningoptions.net' );
        $user_keith = get_user_by( 'email', 'nomadmystics@gmail.com' );
        $user_jill = get_user_by( 'email', 'jdahlen@washingtonea.org' );
        $user_molly = get_user_by( 'email', 'mbaasch@washingtonea.org' );

        $calendar_public_url = 'https://calendar.google.com/calendar/embed?src=vk2hqql34cpfcnmfcco3vh6jm4%40group.calendar.google.com&ctz=America/Los_Angeles';
        $calendar_ctg_url = 'https://calendar.google.com/calendar/embed?src=36jkpartq77t8n9b15p5iaqc9o%40group.calendar.google.com&ctz=America/Los_Angeles';
        $calendar_cadre_url = 'https://calendar.google.com/calendar/embed?src=1v3dohds13bc2427jlkptpljgg%40group.calendar.google.com&ctz=America/Los_Angeles';

        // <!-- Nav tabs -->

        echo '<ul class="nav nav-tabs" role="tablist">';

        // for
        if ( !empty($user_pat) && 'pat' === $user_pat->user_nicename ) {

            echo    '<li role="presentation" class="active"><a href="#ctg-events" aria-controls="ctg-events" role="tab" data-toggle="tab">CTG Events</a></li>';

        } else if ( !empty($user_keith) && 'nomad' === $user_keith->user_nicename ) {

            echo    '<li role="presentation" class="active"><a href="#ctg-events" aria-controls="ctg-events" role="tab" data-toggle="tab">CTG Events</a></li>';

        } else if ( !empty($user_gary) && 'obee' === $user_gary->user_nicename ) {

            echo    '<li role="presentation" class="active"><a href="#ctg-events" aria-controls="ctg-events" role="tab" data-toggle="tab">CTG Events</a></li>';

        } else if ( !empty($user_jill) && 'jill' === $user_jill->user_nicename ) {

            echo    '<li role="presentation" class="active"><a href="#ctg-events" aria-controls="ctg-events" role="tab" data-toggle="tab">CTG Events</a></li>';

        } else if ( !empty($user_molly) && 'mollybaasch' === $user_molly->user_nicename ) {

            echo    '<li role="presentation" class="active"><a href="#ctg-events" aria-controls="ctg-events" role="tab" data-toggle="tab">CTG Events</a></li>';

        }

        // for cadre staff
        if ( is_user_logged_in() || current_user_can( 'author' ) ) {

            echo    '<li role="presentation"><a href="#cadre-events" aria-controls="cadre-events" role="tab" data-toggle="tab">Cadre Events</a></li>';

        }

        // all users
        if ( !is_user_logged_in() || current_user_can( 'subscriber' ) ) {

            echo    '<li role="presentation"><a href="#events" aria-controls="events" class="active" role="tab" data-toggle="tab">Events</a></li>';

        }


        echo '</ul>';

        echo '<div class="tab-content">';

        if ( !empty($user_pat) && 'pat' === $user_pat->user_nicename ) {

            echo '<div role="tabpanel" class="tab-pane" id="ctg-events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_ctg_url );
            echo '</div>';

        } else if ( !empty($user_keith) && 'nomad' === $user_keith->user_nicename ) {

            echo '<div role="tabpanel" class="tab-pane" id="ctg-events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_ctg_url );
            echo '</div>';

        } else if ( !empty($user_gary) && 'obee' === $user_gary->user_nicename ) {

            echo '<div role="tabpanel" class="tab-pane" id="ctg-events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_ctg_url );
            echo '</div>';

        } else if ( !empty($user_jill) && 'jill' === $user_jill->user_nicename ) {

            echo '<div role="tabpanel" class="tab-pane" id="ctg-events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_ctg_url );
            echo '</div>';

        } else if ( !empty($user_molly) && 'mollybaasch' === $user_molly->user_nicename ) {

            echo '<div role="tabpanel" class="tab-pane" id="ctg-events">';
            die('testing logic');
                SESCPosts::sesc_build_home_calendar_html( $calendar_ctg_url );
            echo '</div>';

        }

        // Tab content for anyone that is editor or greater
        if ( is_user_logged_in() || current_user_can( 'editor' ) ) {
            echo '<div role="tabpanel" class="tab-pane active" id="cadre-events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_cadre_url );
            echo '</div>';
        }

        // Tab content for anyone that is public
        if ( current_user_can( 'subscriber' ) ) {
            echo '<div role="tabpanel" class="tab-pane" id="events">';
                SESCPosts::sesc_build_home_calendar_html( $calendar_public_url );
            echo '</div>';
        }

        echo '</div>';

    }


    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Build home page calendar HTML
    * @param string $calendar_url
    **/

    static public function sesc_build_home_calendar_html( $calendar_url ) {
        die('testing logic');
        echo    '<div class="col-xs-12 sesc-home-calendar-container embed-responsive embed-responsive-4by3">';
        echo        '<iframe src="' . $calendar_url .'" style="border: 0" width="800" height="600" scrolling="no"></iframe>';
        echo     '</div>';

    }


    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds HTML for posts on the stay current page
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */

    public function sesc_build_stay_current_posts( $post_type, $category_name, $number ) {

        // The Query
        $sesc_stay_current_posts_args = [
            'post_type'              => $post_type,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'posts_per_page'         =>  $number,
        ];

        $sesc_stay_current_posts_query = new WP_Query( $sesc_stay_current_posts_args );

		// The Loop
		if ( $sesc_stay_current_posts_query->have_posts() ) {
			while ( $sesc_stay_current_posts_query->have_posts() ) {

				$sesc_stay_current_posts_query->the_post();

				echo '<div class="entry-content row">';
                echo    '<div class="col-xs-12">';
                echo '       <div class="post hentry ivycat-post">';
                echo           '<h2 class="entry-title"><a href="' . get_permalink( $sesc_stay_current_posts_query->ID ) .'">' . get_the_title() .'</a></h2>';
                echo               '<div class="entry-summary">';
                echo	                '<p>Registration for the 2017 Special Education Boot Camp, is now closed.&nbsp; Theres always a possibility of last-minute cancellations.&nbsp; Contact Jill […]</p>';
                echo                '</div>';
                	    //                <div class="entry-utility">
                		// 				<span class="comments-link"><a href="http://specialeducationsupportcenter.org/news/2017-special-ed-boot-camp-filled/#respond">Leave a comment</a></span>
                		// <span class="meta-sep">|</span> <span class="edit-link"><a class="post-edit-link" href="http://specialeducationsupportcenter.org/wp-admin/post.php?post=2134&amp;action=edit">Edit</a></span>	</div>
                echo           '</div>';
		  		the_excerpt();
 		  		echo     '</div>';
 		  		echo '</div>';

			}
            wp_reset_postdata();

		} else {

            echo '<div class="entry-content">';
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';

		}

    } // end sesc_build_stay_current_posts


}// End class
