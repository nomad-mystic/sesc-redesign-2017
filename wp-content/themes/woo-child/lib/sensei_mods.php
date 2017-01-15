<?php

class SESC_sensei_modifications {

    public function init() {
        add_action('sensei_login_form', [ $this, 'custom_sensei_login_form' ], 10 );
        add_filter('sensei_complete_lesson_button', [ $this, 'sensei_custom_complete_lesson_text' ], 10 );
        add_filter( 'sensei_view_lesson_quiz_text', [ $this, 'sensei_custom_lesson_quiz_text' ], 10 );
    }

    public function custom_sensei_login_form( $url, $request, $user ) {
        /*
        Changed by nomad on 1-7-2016
    	global $woothemes_sensei;
    	?>
        <div id="my-courses">
        <?php $woothemes_sensei->notices->maybe_print_notices(); ?>
                <div class="col2-set" id="customer_login">

                <div class="col-1">
                	<?php
                	// output the actual form markup
                	$woothemes_sensei->frontend->sensei_get_template('user/login-form.php');
                	?>
                </div>
            </div>
        </div>
    	<?php
        */
        if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
             if( $user->has_cap( 'administrator' ) ) {
                  $url = admin_url();
             } else {
                  $url = home_url();
             }
        }
        return $url;
    } // End custom_sensei_login_form()

    // THis is going to rename the complete lesson button on lesson-meta.php
    public function sensei_custom_complete_lesson_text () {
    	$text = "Mark Lesson Complete";
    	return $text;
    }

    /// This is going to rename the view lesson quiz
    public function sensei_custom_lesson_quiz_text () {
    	$text = "Report What You Have Learned";
    	return $text;
    }

}
