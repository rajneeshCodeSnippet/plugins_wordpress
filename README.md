# Subscription Plugin

A full-featured subscription management plugin for WordPress. This plugin allows you to manage user subscriptions, handle payments, restrict content based on subscription levels, and send automated notifications.

## Features

- **User Registration and Management:**
  - Registration form for new users.
  - User login and logout functionality.
  - Profile management for subscribers.

- **Subscription Plans:**
  - Create and manage multiple subscription plans.
  - Support for different billing cycles (monthly, yearly, etc.).
  - Free trial periods and promotional discounts.

- **Payment Integration:**
  - Support for multiple payment gateways (PayPal, Stripe, etc.).
  - Secure payment processing.
  - Automatic recurring payments.

- **Access Control:**
  - Restrict content based on subscription level.
  - Role-based access control.
  - Customizable access rules for posts, pages, and custom content types.

- **Notifications and Emails:**
  - Automated email notifications for subscription events (renewal reminders, payment receipts, etc.).
  - Customizable email templates.
  - Admin notifications for important events (new subscription, failed payment, etc.).

- **Reporting and Analytics:**
  - Dashboard for subscription metrics (active subscriptions, revenue, etc.).
  - Exportable reports (CSV, Excel).
  - Integration with third-party analytics tools.

- **Customization and Extensibility:**
  - Hooks and filters for custom functionality.
  - Shortcodes for easy content restriction.
  - Template overrides for custom styling.

## Installation

1. **Upload the Plugin:**
   - Upload the `subscription-plugin` directory to the `/wp-content/plugins/` directory.

2. **Activate the Plugin:**
   - Activate the plugin through the 'Plugins' menu in WordPress.

3. **Create Database Tables:**
   - Ensure the required database tables are created. This typically happens automatically upon activation.

## Usage

### Creating Subscription Plans

1. Navigate to the **Subscription Plans** menu in the WordPress admin dashboard.
2. Click **Add New Plan**.
3. Fill in the details for the subscription plan (name, billing cycle, price, etc.).
4. Save the plan.

### Restricting Content

1. Edit the post or page you want to restrict.
2. Use the **Subscription Access** meta box to select the required subscription level for accessing the content.
3. Update the post or page.

### Shortcodes

Use the following shortcodes to embed subscription-related forms and information in your posts and pages:

- `[sp_register_form]` - Display the registration form.
- `[sp_login_form]` - Display the login form.
- `[sp_subscription_plan]` - Display the available subscription plans.
- `[sp_account_management]` - Display the account management interface for subscribers.

## Customization

### Hooks and Filters

- **Actions:**
  - `sp_after_user_registration` - Triggered after a user successfully registers.
  - `sp_after_subscription_payment` - Triggered after a successful payment.

- **Filters:**
  - `sp_subscription_levels` - Modify the available subscription levels.
  - `sp_email_templates` - Customize the email templates used for notifications.

### Template Overrides

To override the plugin templates, copy the template file from the plugin directory to your theme directory and customize it as needed. For example:

1. Copy `subscription-plugin/templates/account-management.php` to `your-theme/subscription-plugin/account-management.php`.
2. Edit the copied file in your theme directory.

## Frequently Asked Questions

### How do I set up PayPal/Stripe integration?

1. Navigate to the **Settings** menu in the WordPress admin dashboard.
2. Click on the **Payment Gateways** tab.
3. Enter your PayPal/Stripe API credentials and configure the settings as needed.

### How can I customize email notifications?

1. Navigate to the **Settings** menu in the WordPress admin dashboard.
2. Click on the **Email Templates** tab.
3. Edit the email templates to match your branding and messaging.

## Changelog

### 1.0.0
- Initial release with core features.

## Support

For support, please contact us at yadav.rajyadav1@gmail.com.

## License

This plugin is licensed under the GPL-2.0-or-later license. For more details, see the [LICENSE](LICENSE) file.
