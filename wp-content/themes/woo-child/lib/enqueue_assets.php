<?php



class SESC_enqueue {

    public function init() {
        add_action( 'wp_enqueue_scripts', [ $this, 'sesc_enqueue_scripts_and_styles' ] );
    }

    public function sesc_enqueue_scripts_and_styles( ) {

        // css
        wp_enqueue_style( 'bootstrap_libary-css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', '3.3.7' );
        // wp_enqueue_style( 'bootstrap_libary-css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', '3.3.7' );
        wp_enqueue_style( 'sesc_custom_styles', get_stylesheet_directory_uri() . '/build/css/sesc_custom_styles.css', '1.0.0' );

        // javascript
        wp_deregister_script('jquery');
		wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', [], '1.3.2', true );
        wp_register_script( 'jquery_ui', get_stylesheet_directory_uri() . '/vendor/jquery-ui.min.js', ['jquery'], '', true );

        wp_register_script( 'bootstrap_libary_js', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js', ['jquery'], '3.3.7', true );

        wp_register_script( 'sesc_custom_scripts' , get_stylesheet_directory_uri() . '/build/js/scripts.js', ['jquery', 'jquery_ui'], '1.0.0', true );

        wp_register_script( 'sesc_home_page_scripts' , get_stylesheet_directory_uri() . '/build/js/sesc_home_page_scripts.js', ['jquery', 'jquery_ui'], '1.0.0', true );

        wp_register_script( 'aria_walker_scripts' , get_stylesheet_directory_uri() . '/vendor/aria_walker.js', ['jquery', 'jquery_ui'], '1.0.0', true );

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui' );
        wp_enqueue_script( 'bootstrap_libary_js' );
        wp_enqueue_script( 'aria_walker_scripts' );
        wp_enqueue_script( 'sesc_custom_scripts' );
        wp_enqueue_script( 'sesc_home_page_scripts' );

        /**
        * @author nomadmystics@gmail.com
        * @summary only load these styles if the page is home for now 4-6-2017
        */
        if ( is_home() || get_home_path() == '/var/www/html/sesc/' ) {
            wp_enqueue_style( 'sesc_custom_styles' );
        }

    }
}
