<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class SP_Access {

    public static function init() {
        add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
        add_action( 'save_post', array( __CLASS__, 'save_meta_box' ) );
        add_filter( 'the_content', array( __CLASS__, 'restrict_content' ) );
    }

    public static function add_meta_boxes() {
        add_meta_box(
            'sp_access_meta_box',
            __( 'Subscription Access', 'subscription-plugin' ),
            array( __CLASS__, 'render_meta_box' ),
            array( 'post', 'page' ),
            'side',
            'default'
        );
    }

    public static function render_meta_box( $post ) {
        wp_nonce_field( 'sp_save_meta_box', 'sp_meta_box_nonce' );
        $value = get_post_meta( $post->ID, '_sp_subscription_level', true );
        ?>
        <label for="sp_subscription_level"><?php _e( 'Subscription Level', 'subscription-plugin' ); ?></label>
        <select name="sp_subscription_level" id="sp_subscription_level">
            <option value=""><?php _e( 'None', 'subscription-plugin' ); ?></option>
            <option value="basic" <?php selected( $value, 'basic' ); ?>><?php _e( 'Basic', 'subscription-plugin' ); ?></option>
            <option value="premium" <?php selected( $value, 'premium' ); ?>><?php _e( 'Premium', 'subscription-plugin' ); ?></option>
        </select>
        <?php
    }

    public static function save_meta_box( $post_id ) {
        if ( ! isset( $_POST['sp_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['sp_meta_box_nonce'], 'sp_save_meta_box' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $level = sanitize_text_field( $_POST['sp_subscription_level'] );
        update_post_meta( $post_id, '_sp_subscription_level', $level );
    }

    public static function restrict_content( $content ) {
        if ( is_singular( 'post' ) || is_singular( 'page' ) ) {
            $level = get_post_meta( get_the_ID(), '_sp_subscription_level', true );
            if ( $level ) {
                if ( self::user_has_access( $level ) ) {
                    return $content; // Return original content if user has access
                } else {
                    return __( 'You do not have access to this content.', 'subscription-plugin' );
                }
            }
        }
        return $content;
    }

    public static function user_has_access( $level ) {
        $user = wp_get_current_user();
        // Check user's subscription level here (this needs to be implemented based on your subscription data structure)
        return true; // Implement your access logic based on the user's subscription level
    }
}

SP_Access::init();
