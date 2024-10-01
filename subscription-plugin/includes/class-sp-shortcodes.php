<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class SP_Shortcodes {

    public static function init() {
        add_shortcode( 'sp_restrict_content', array( __CLASS__, 'restrict_content_shortcode' ) );
    }

    public static function restrict_content_shortcode( $atts, $content = null ) {
        $atts = shortcode_atts( array(
            'level' => 'basic',
        ), $atts, 'sp_restrict_content' );

        if ( SP_Access::user_has_access( $atts['level'] ) ) {
            return do_shortcode( $content );
        } else {
            return __( 'You do not have access to this content.', 'subscription-plugin' );
        }
    }
}

SP_Shortcodes::init();
