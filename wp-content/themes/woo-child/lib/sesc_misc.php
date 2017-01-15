<?php
/**
* @author Keith Murphy - nomad - nomadmystics@gamil.com
* All Misc Functions
*/

class SESC_misc {

    public function init() {
        add_filter( 'login_redirect', [ $this, 'my_login_redirect' ], 10, 3 );
        add_filter( 'excerpt_length', [ $this, 'custom_excerpt_length' ], 999 );
    }

    /**
     * Register our sidebars and widgetized areas.
     */
    /* redirect users to front page after login */
    public function my_login_redirect( $url, $request, $user ) {
         if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
              if( $user->has_cap( 'administrator' ) ) {
                   $url = admin_url();
              } else {
                   $url = home_url();
              }
         }
         return $url;
    }

    /*-------------------change the length of the post excerpt---*/
    function custom_excerpt_length( $length ) {
    	return 20;
    }
}
