
<?php

/**
* @author Keith Murphy - nomad - nomadmystics@gamil.com
* All Custom Functions
*/

/* function files */
require_once( 'lib/init.php' );
require_once( 'lib/widgets.php' );
require_once( 'lib/enqueue_assets.php' );
require_once( 'lib/sensei_mods.php' );
require_once( 'lib/sesc_misc.php' );
require_once( 'lib/sesc_menus.php' );


// Check if classes exist
if ( class_exists( 'SESC_init_functions' ) ) {
    $SESC_init = new SESC_init_functions();
    $SESC_init->init();
}

if ( class_exists( 'SESC_widgets' ) ) {
    $SESC_widgets = new SESC_widgets();
    $SESC_widgets->init();
}

if ( class_exists( 'SESC_enqueue' ) ) {
    $SESC_enqueue = new SESC_enqueue();
    $SESC_enqueue->init();
}

if ( class_exists( 'SESC_sensei_modifications' ) ) {
    $SESC_sensei = new SESC_sensei_modifications();
    $SESC_sensei->init();
}
if ( class_exists( 'SESC_misc') ) {
    $SESC_misc = new SESC_misc();
    $SESC_misc->init();
}

if ( class_exists( 'SESC_menus' ) ) {
    $SESC_menus = new SESC_menus();
    $SESC_menus->init();
    // $SESC_menus->menus_rewrite();
}
/////This is for removing register from the Woothemes Sensei my courses page
// global $woothemes_sensei;
// print_r($woothemes_sensei->notices);
// remove_action('sensei_login_form', [$woothemes_sensei->frontend, 'sensei_login_form'], 10);
