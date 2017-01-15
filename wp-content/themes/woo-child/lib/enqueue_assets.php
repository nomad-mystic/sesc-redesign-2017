<?php



class SESC_enqueue {

    public function init() {
        add_action( 'wp_enqueue_scripts', [ $this, 'sesc_enqueue_scripts_and_styles' ] );
    }

    public function sesc_enqueue_scripts_and_styles( ) {

        // css
        wp_enqueue_style( 'bootstrap-libary-css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', '3.3.7' );
        wp_enqueue_style( 'sesc_custom_styles', get_stylesheet_directory_uri() . '/css/sesc_custom_styles.css', '1.0.0' );

        // javascript
        wp_deregister_script('jquery');
		wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', [], '1.3.2', true );
        wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/vendor/jquery-ui.min.js', ['jquery'], '', true );

        wp_register_script( 'bootstrap-libary-js', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.js', ['jquery'], '3.3.7', true );

        wp_register_script( 'custom_sesc_scripts' , get_stylesheet_directory_uri() . '/lib/scripts.js', ['jquery', 'jquery-ui'], '1.0.0', true );

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui' );
        wp_enqueue_script( 'bootstrap-libary-js' );
        wp_enqueue_style( 'sesc_custom_styles' );
    }
}
