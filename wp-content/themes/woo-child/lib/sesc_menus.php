<?php

/**
* @author Keith Murphy - nomad - nomadmystics@gamil.com
* All Custom Menus
*/

require_once(__DIR__ . '/../vendor/aria_walker.php');
require_once(__DIR__ . '/../vendor/wp-bootstrap-navwalker.php');

class SESC_menus extends Walker_Nav_Menu {


    public function init() {
        add_action( 'init', [ &$this, 'custom_resources_menu' ] );

        /**
        * @author Keith Murphy - nomad - nomadmystics@gmail.com
        * @summary Builds the footers custom nav - found in ./lib/sesc_navigation.php
        */
        add_action( 'after_setup_theme', [ &$this, 'sesc_register_custom_footer_nav' ], 10 );
        // apply_filters( 'walker_nav_menu_start_el', [ $this, 'menus_rewrite'] );

    }

    public function custom_resources_menu() {
        register_nav_menu( 'resources_menu', 'Resources Menu' );
    }

    // public function menus_rewrite() {
    //
    //     global $wp_query;
    //        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    //
    //        $class_names = $value = '';
    //
    //        $value = 'testing';
    //        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    //
    //        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    //        $class_names = ' class="'. esc_attr( $class_names ) . '"';
    //
    //        $output .= $indent . '<li id="menu-item-sesc'. $item->ID . '"' . $value . $class_names .'>';
    //
    //        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    //        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    //        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    //        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    //
    //        $prepend = '<strong>';
    //        $append = '</strong>';
    //        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
    //
    //        if($depth != 0)
    //        {
    //                  $description = $append = $prepend = "";
    //        }
    //
    //         $item_output = $args->before;
    //         $item_output .= '<a'. $attributes .'>';
    //         $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
    //         $item_output .= $description.$args->link_after;
    //         $item_output .= '</a>';
    //         $item_output .= $args->after;
    //
    //         $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    //         var_dump($output);
    // }

    /**
    * @summary Build the HTML for the main navigation
    * @param string $nav_class - nav element class to target class with
    * @param string $menu - the menu slug
    * @param string $theme_location - The location of the add_action of the nav
    * @param string $container_id - The surrounding container div for the nav
    * @param string $data_target - The target for bootstrap to connect on small screens - Hamburger
    * @return string navigation_html
    */

    public function sesc_build_navigation_html( $nav_class = 'main-nav', $menu = 'primary-menu', $theme_location = 'primary-menu', $container_id = 'main_nav_container', $data_target = '#main_nav_container' ) {
        // echo 'Testing echo';
        // $aria_label = _e( "Main Menu", "textdomain" );

        // echo "<nav class=\"navbar navbar-default " . $nav_class . "\" role=\"navigation\">";
            ?>
            <nav class="navbar navbar-default <?= $nav_class ?>"  role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="<?= $data_target ?>" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                      <!-- <a class="navbar-brand" href="#"></a> -->
                </div>
            <?php

            if ( has_nav_menu( 'primary-menu' ) ) {
                if ( has_nav_menu( 'primary-menu' ) ) {
                    // var_dump('primary');
                  wp_nav_menu([
                        'menu'              => $menu,
                        'theme_location'    => $theme_location,
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => $container_id,
                        'menu_class'        => 'nav navbar-nav main-navigation',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker(),
                        'items_wrap'        => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>'
                    ]);
                }
            //   wp_nav_menu( [
            //     'theme_location' => 'primary-menu',
            //     'container' => 'div',
            //     'container_id' => 'sesc_nav_toggle',
            //     'container_class' => 'collapse navbar-collapse',
            //     'menu_class'     => 'main-navigation nav navbar-nav',
            //     'walker'         => new WP_Bootstrap_Navwalker(),
            //     'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
            //   ] );
            }
            ?>
            </div>
        </nav>

        <?php

    }

    /**
    * @summary Registers and builds footer navigation on the home page
    */
    public function sesc_register_custom_footer_nav() {

        register_nav_menu( 'footer-site-map', __( 'Footer Site Map' ) );

    }

    /**
    * @summary Add HTML to the footer for the site map
    */
    public function sesc_build_custom_footer_menu() {

        // $nav_class = 'sesc-footer-nav';

        // $data_target = '#sesc-footer-nav';
        //

        // $this->sesc_build_navigation_html( $nav_class, $menu, $theme_location, $container_id, $data_target );
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <nav role="navigation">
                        <?php
                            $menu = 'footer-site-map';
                            $theme_location = 'footer-site-map';
                            $container_id = 'sesc-footer-nav';
                            // die('testing');
                            // if ( has_nav_menu( 'footer-site-map' ) ) {
                              wp_nav_menu([
                                    'menu'              => $menu,
                                    'theme_location'    => $theme_location,
                                    // 'depth'             => 2,
                                    // 'container'         => 'div',
                                    // 'container_class'   => false,
                                    'container_id'      => $container_id,
                                    // 'menu_class'        => 'nav navbar-nav',
                                    'walker'         => new Aria_Walker_Nav_Menu(),
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                                ]);
                            // }
                        ?>

                    </nav>
                </div>
            </div>
        </div>

        <?php
    }
} // end class
