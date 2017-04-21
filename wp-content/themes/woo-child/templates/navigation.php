<?php

require_once(__DIR__ . '/../vendor/aria_walker.php');
require_once(__DIR__ . '/../vendor/wp-bootstrap-navwalker.php');

class SESCNavigation {



    /**
    * @summary Build the HTML for the main navigation
    * @return string navigation_htmll;
    */

    public function sesc_build_navigation_html() {
        // echo 'Testing echo';
        // $aria_label = _e( "Main Menu", "textdomain" );

        echo '<nav  class="navbar navbar-default main-nav" role="navigation" aria-label="">';
            ?>
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav_container" aria-expanded="false">
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
                        'menu'              => 'primary-menu',
                        'theme_location'    => 'primary-menu',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'main_nav_container',
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

}
