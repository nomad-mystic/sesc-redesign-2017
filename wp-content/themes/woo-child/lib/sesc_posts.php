<?php

global $wp_query;

class SESCPosts {


    public function init() {

    }

    /**
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
    * @summary Builds HTML for post with category 'home-slider-post'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_slider( $post_type, $category_name, $number = '-1' ) {
        // The Query
        $args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<div class="entry-content row">';

                echo '<figure>';
                echo    '<div class="col-s-12 sesc-slider-container">';
                echo        get_the_post_thumbnail( $query->get( 'ID' ) );
                echo        '<div class="sesc-slider-excerpt">';
                echo            '<h1>' . get_the_title( $query->get( 'ID' ) ) . '</h1>';
                // echo            '<h3>' . get_the_excerpt( $query->get( 'ID' ) ) . '</h3>';
                echo        '</div>';
                echo    '</div>';
                echo '</figure>';


 		  		echo '</div>';
			}
		} else {
            echo '<div class="entry-content">';
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';
		}
    }

    /**
    * @summary Builds HTML for post with category 'news-post'
    * @param string post_type 'post' - Type of post ie post, resources_post
    * @param string category_name 'home-slider-post'  - Type of post ie resources-families-post
    * @param string $number  - Number of posts
    */
    public function sesc_build_home_page_news_aside( $post_type, $category_name, $number = '-1' ) {
        // The Query
        $args = $this->sesc_posts_factory( $post_type, $category_name, $number );
        $query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<div class="entry-content row">';
                echo    '<div class="col-xs-12 sesc-home-news-post-container">';
                echo        '<h1>' . get_the_title() . '</h1>';
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
            echo '  <h1>Sorry! No Posts Found.</h1>';
            echo '</div>';
		}
    }


    /**
    * Category home-news-widget
    */
    public function sesc_build_home_news_widget( $post_type, $category_name, $number = '-1') {



    }
}// End class
