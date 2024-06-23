<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_Notifications {

    public static function init() {
        add_action( 'sp_subscription_created', array( __CLASS__, 'send_subscription_created_email' ) );
        // Add more hooks for other notifications
    }

    public static function send_subscription_created_email( $user_id ) {
        $user = get_userdata( $user_id );
        $email = $user->user_email;
        $subject = __( 'Subscription Created', 'subscription-plugin' );
        $message = __( 'Your subscription has been created.', 'subscription-plugin' );

        wp_mail( $email, $subject, $message );
    }

    // Add more notification functions
}

SP_Notifications::init();
