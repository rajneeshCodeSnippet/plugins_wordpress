<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_Activator {
    public static function activate() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        // Create subscription plans table
        $subscription_plans_table = $wpdb->prefix . 'subscription_plans';
        $sql = "CREATE TABLE $subscription_plans_table (
            plan_id INT NOT NULL AUTO_INCREMENT,
            plan_name VARCHAR(100) NOT NULL,
            plan_description TEXT,
            plan_price DECIMAL(10, 2) NOT NULL,
            plan_duration INT NOT NULL,
            PRIMARY KEY (plan_id)
        ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        // Create user subscriptions table
        $user_subscriptions_table = $wpdb->prefix . 'user_subscriptions';
        $sql = "CREATE TABLE $user_subscriptions_table (
            subscription_id INT NOT NULL AUTO_INCREMENT,
            user_id INT NOT NULL,
            plan_id INT NOT NULL,
            subscription_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            expiration_date TIMESTAMP NOT NULL,
            PRIMARY KEY (subscription_id),
            FOREIGN KEY (user_id) REFERENCES {$wpdb->users} (ID) ON DELETE CASCADE,
            FOREIGN KEY (plan_id) REFERENCES $subscription_plans_table (plan_id) ON DELETE CASCADE
        ) $charset_collate;";
        dbDelta($sql);

        // Optionally, insert default subscription plans into `wp_subscription_plans` table upon activation
    }
}

