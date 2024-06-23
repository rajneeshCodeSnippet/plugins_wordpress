<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_User {

    public static function init() {
        add_action( 'init', array( __CLASS__, 'handle_registration' ) );
    }

    public static function handle_registration() {
        if ( isset( $_POST['sp_register'] ) ) {
            $username = sanitize_user( $_POST['sp_user_login'] );
            $email = sanitize_email( $_POST['sp_user_email'] );
            $password = $_POST['sp_user_password'];

            $errors = self::validate_registration( $username, $email, $password );

            if ( empty( $errors ) ) {
                $user_id = wp_create_user( $username, $password, $email );

                if ( ! is_wp_error( $user_id ) ) {
                    wp_set_current_user( $user_id );
                    wp_set_auth_cookie( $user_id );
                    wp_redirect( home_url() );
                    exit;
                } else {
                    $errors[] = $user_id->get_error_message();
                }
            }

            if ( ! empty( $errors ) ) {
                foreach ( $errors as $error ) {
                    echo '<p>' . esc_html( $error ) . '</p>';
                }
            }
        }
    }

    private static function validate_registration( $username, $email, $password ) {
        $errors = array();

        if ( empty( $username ) || empty( $email ) || empty( $password ) ) {
            $errors[] = __( 'All fields are required.', 'subscription-plugin' );
        }

        if ( ! is_email( $email ) ) {
            $errors[] = __( 'Invalid email address.', 'subscription-plugin' );
        }

        if ( username_exists( $username ) ) {
            $errors[] = __( 'Username already exists.', 'subscription-plugin' );
        }

        if ( email_exists( $email ) ) {
            $errors[] = __( 'Email already exists.', 'subscription-plugin' );
        }

        return $errors;
    }
}

SP_User::init();
