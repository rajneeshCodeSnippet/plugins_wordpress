<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_Subscription {

    public static function init() {
        add_shortcode( 'sp_registration_form', array( __CLASS__, 'registration_form_shortcode' ) );
    }

    public static function registration_form_shortcode() {
        ob_start();
        self::registration_form();
        return ob_get_clean();
    }

    public static function registration_form() {
        if ( is_user_logged_in() ) {
            echo '<p>' . __( 'You are already logged in.', 'subscription-plugin' ) . '</p>';
            return;
        }
        ?>
        <form method="post" action="">
            <p>
                <label for="sp_user_login"><?php _e( 'Username', 'subscription-plugin' ); ?></label>
                <input type="text" name="sp_user_login" id="sp_user_login" required>
            </p>
            <p>
                <label for="sp_user_email"><?php _e( 'Email', 'subscription-plugin' ); ?></label>
                <input type="email" name="sp_user_email" id="sp_user_email" required>
            </p>
            <p>
                <label for="sp_user_password"><?php _e( 'Password', 'subscription-plugin' ); ?></label>
                <input type="password" name="sp_user_password" id="sp_user_password" required>
            </p>
            <p>
                <input type="submit" name="sp_register" value="<?php _e( 'Register', 'subscription-plugin' ); ?>">
            </p>
        </form>
        <?php
    }
}
