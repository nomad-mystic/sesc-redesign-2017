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
        $args = $this->sesc_posts_factory($post_type, $category_name, $number);
        $query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<div class="entry-content row">';
                echo    '<div class="col-xs-12 sesc-home-post-container">';
                // echo        '<h1>' . get_the_title() . '</h1>';
                echo        '<figure>';
                echo            '<div class="floatLeft featured">';
                echo                get_the_post_thumbnail( $query->get( 'ID' ) );
                echo            '</div>';
                echo        '</figure>';
		  		the_content();
 		  		echo     '</div>';
 		  		echo '</div>';
			}
		} else {
            echo '<div class="entry-content">';
            echo '<h1>Sorry! No Posts Found.';
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
        $args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $query = new WP_Query( $args );
        $permalink = get_the_permalink();

        echo '<div class="entry-content row">';
        echo '<div class="col-s-12 sesc-slider-container">';

        if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();


                // echo '<figure>';
                // echo    '<a href="' . $permalink . '" role="presentation">';
                // echo        get_the_post_thumbnail( $query->get( 'ID' ) );
                // echo    '</a>';
                // echo '</figure>';
                // echo '<div class="sesc-slider-excerpt">';
                // echo '  <h1>' . get_the_title( $query->get( 'ID' ) ) . '</h1>';
                // echo '</div>';
                // echo '</div>';

			}
		} else {
            echo '<div class="entry-content">';
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';
		}

        // echo '</div>';


        echo    '<div class="container">';
        echo    '   <div class="image-slider-wrapper">';
        echo    '       <ul id="image_slider">';
        echo    '           <li><img src="http://localhost/sesc/wp-content/uploads/2017/01/slider_image_2-1.jpg"></li>';
        echo    '           <li><img src="http://localhost/sesc/wp-content/uploads/2017/01/slider_image_3-1.jpg"></li>';
        echo    '           <li><img src="http://localhost/sesc/wp-content/uploads/2017/01/slider_image_2-1.jpg"></li>';
        echo    '           <li><img src="http://localhost/sesc/wp-content/uploads/2017/01/slider_image_3-1.jpg"></li>';
        echo    '       </ul>';
        echo    '   </div>';
        echo    '</div>';

        echo    '</div>';
        echo    '</div>';

    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds HTML for post with category 'news-post'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_news_widget( $post_type, $category_name, $number = '-1' ) {
        // The Query
        $args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $query = new WP_Query( $args );
        // print_r($query);
        $site_url = get_site_url();

        echo '<div class="entry-content row sesc-home-news-post-container">';

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
                $truncated_content = '';
				$query->the_post();
                // print_r(get_the_content());
                // $truncated_content = substr( get_the_content(), 0, 30 );

                echo    '<div class="col-xs-12 news-item">';
                echo        '<a href="' . get_permalink() . '">';
                echo            '<h1 class="title">' . get_the_title() . '</h1>';
                echo        '</a>';
                echo    '<p>';

                substr( the_content(), 0, 30 );

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
        echo        '<a href="' . $site_url . '/subscribe-to-newsletter/" role="button">Subscribe to Newsletter</a>';
        echo     '</div>';

    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gmail.com
    * @summary Builds the google calendar for the aside
    * Category home-news-widget
    */
    public function sesc_build_home_aside_google_calendar() {

        // echo '<div class="entry-content row">';
        echo    '<div class="col-xs-12 sesc-home-calendar-container embed-responsive embed-responsive-4by3">';
        echo        '<iframe src="https://calendar.google.com/calendar/embed?src=do2v2kmb9p6o2ilis9345qc9dk%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>';
        echo     '</div>';
        // echo '</div>';

    }
}// End class
