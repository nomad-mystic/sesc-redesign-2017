<?php

/**
* @author Keith Murphy - nomad - nomadmystics@gmail.com\
* @summary Enqueue scripts and styles
* @todo Add OG styles to this list
*/


class SESC_enqueue {

    public function init() {
        add_action( 'wp_enqueue_scripts', [ &$this, 'sesc_enqueue_scripts_and_styles' ] );
    }

    public function sesc_enqueue_scripts_and_styles() {


        // css
        wp_enqueue_style( 'bootstrap_libary_css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', '3.3.7' );
        // wp_enqueue_style( 'bootstrap_libary-css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', '3.3.7' );
        wp_enqueue_style( 'bootstrap_libary_css' );

        // javascript
        // JQuery stuff
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-ui');

		wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', [], '1.3.2', true );
        wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/vendor/jquery-ui.min.js', ['jquery'], '', true );

        if ( !wp_script_is('jquery') ) {

            wp_enqueue_script( 'jquery' );

        }

        if ( !wp_script_is('jquery-ui') ) {

            wp_enqueue_script( 'jquery-ui' );


        }

        /**
        * @todo Turn this on when approved
        */
        if ( get_permalink() == 'http://localhost/sesc/' || get_permalink() === 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {

            wp_register_script( 'sesc_home_page_scripts' , get_stylesheet_directory_uri() . '/build/js/sesc_home_page_scripts.js', ['jquery', 'jquery-ui'], '1.0.0', true );
            wp_enqueue_script( 'sesc_home_page_scripts' );

            wp_register_script( 'sesc_main_scripts' , get_stylesheet_directory_uri() . '/build/js/main.js', ['jquery', 'jquery-ui'], '1.0.0', true );
            wp_enqueue_script( 'sesc_main_scripts' );

            // var_dump('custom home scripts');
            // var_dump(wp_script_is('sesc_home_page_scripts', 'registered'));
            // var_dump(wp_script_is('sesc_home_page_scripts', 'enqueued'));
            // var_dump(wp_script_is('sesc_home_page_scripts', 'done'));
            // var_dump(wp_script_is('sesc_home_page_scripts', 'to_do'));
        }

        wp_register_script( 'bootstrap_libary_js', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js', ['jquery'], '', true );
        wp_enqueue_script( 'bootstrap_libary_js' );

        wp_register_script( 'sesc_custom_scripts' , get_stylesheet_directory_uri() . '/build/js/scripts.js', ['jquery', 'jquery-ui'], '', true );

        wp_register_script( 'aria_walker_scripts' , get_stylesheet_directory_uri() . '/vendor/aria_walker.js', ['jquery', 'jquery-ui'], '', true );
        wp_enqueue_script( 'aria_walker_scripts' );

        wp_enqueue_script( 'sesc_custom_scripts' );

        // if ( get_permalink() === 'http://localhost/sesc/' || get_permalink() === 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {
        //
        //     var_dump('jquery');
        //     var_dump(wp_script_is('jquery', 'registered'));
        //     var_dump(wp_script_is('jquery', 'enqueued'));
        //     var_dump(wp_script_is('jquery', 'done'));
        //     var_dump(wp_script_is('jquery', 'to_do'));
        //
        //     var_dump('jquery-ui');
        //     var_dump(wp_script_is('jquery-ui', 'registered'));
        //     var_dump(wp_script_is('jquery-ui', 'enqueued'));
        //     var_dump(wp_script_is('jquery-ui', 'done'));
        //     var_dump(wp_script_is('jquery-ui', 'to_do'));
        //
        //     var_dump('Bootstrap');
        //     var_dump(get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js');
        //     var_dump(wp_script_is('bootstrap_libary_js', 'registered'));
        //     var_dump(wp_script_is('bootstrap_libary_js', 'enqueued'));
        //     var_dump(wp_script_is('bootstrap_libary_js', 'done'));
        //     var_dump(wp_script_is('bootstrap_libary_js', 'to_do'));
        //
        //     var_dump('aria walker scripts');
        //     var_dump(wp_script_is('aria_walker_scripts', 'registered'));
        //     var_dump(wp_script_is('aria_walker_scripts', 'enqueued'));
        //     var_dump(wp_script_is('aria_walker_scripts', 'done'));
        //     var_dump(wp_script_is('aria_walker_scripts', 'to_do'));
        //
        //     var_dump('custom scripts basics');
        //     var_dump(get_stylesheet_directory_uri() . '/build/js/scripts.js');
        //     var_dump(wp_script_is('sesc_custom_scripts', 'registered'));
        //     var_dump(wp_script_is('sesc_custom_scripts', 'enqueued'));
        //     var_dump(wp_script_is('sesc_custom_scripts', 'done'));
        //     var_dump(wp_script_is('sesc_custom_scripts', 'to_do'));
        // }


        /**
        * @author nomadmystics@gmail.com
        * @summary only load these styles if the page is home for now 4-6-2017
        * @todo Turn on for home page aftert the changes are made live
        */
        if ( get_permalink() == 'http://localhost/sesc/' || get_permalink() === 'http://specialeducationsupportcenter.org/home-page-redesign/' ) {

            wp_enqueue_style( 'sesc_custom_styles', get_stylesheet_directory_uri() . '/build/css/sesc_custom_styles.css', '1.0.0' );
            wp_enqueue_style( 'sesc_custom_styles' );
        }

    }
}
