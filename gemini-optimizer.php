







<?php
/**
 * Plugin Name:       Gemini AI Optimizer
 * Plugin URI:        https://github.com/your-repo/gemini-optimizer
 * Description:       Optymalizuje treści WordPress przy użyciu Google Gemini API — SEO, meta opisy, analiza czytelności i sugestie słów kluczowych.
 * Version:           1.0.2
 * Requires at least: 5.8
 * Requires PHP:      8.0
 * Author:            Norbert Siedlecki
 * License:           GPL v2 or later
 * Text Domain:       gemini-optimizer
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

define('GEMINI_OPTIMIZER_VERSION', '1.0.2');
define('GEMINI_OPTIMIZER_DIR',     plugin_dir_path(__FILE__));
define('GEMINI_OPTIMIZER_URL',     plugin_dir_url(__FILE__));
define('GEMINI_OPTIMIZER_FILE',    __FILE__);

/**
 * Load required files and boot the plugin.
 */
function gemini_optimizer_init()
{
    require_once GEMINI_OPTIMIZER_DIR . 'includes/class-gemini-api.php';
    require_once GEMINI_OPTIMIZER_DIR . 'includes/class-gemini-metabox.php';
    require_once GEMINI_OPTIMIZER_DIR . 'includes/class-gemini-seo.php';

    if (is_admin()) {
        require_once GEMINI_OPTIMIZER_DIR . 'admin/class-gemini-admin.php';
        new Gemini_Admin();
    }

    new Gemini_Metabox();
    new Gemini_SEO();
}
add_action('plugins_loaded', 'gemini_optimizer_init');

/**
 * Activation hook – set default options.
 */
function gemini_optimizer_activate()
{
    add_option('gemini_optimizer_api_key', '');
    add_option('gemini_optimizer_model', 'gemini-2.0-flash');
    add_option('gemini_optimizer_language', 'pl');
    add_option('gemini_optimizer_auto_meta', '0');
    add_option('gemini_optimizer_post_types', array('post', 'page'));
}
register_activation_hook(__FILE__, 'gemini_optimizer_activate');

/**
 * Deactivation hook.
 */
function gemini_optimizer_deactivate()
{
    // nothing to clean up
}
register_deactivation_hook(__FILE__, 'gemini_optimizer_deactivate');

/**
 * Uninstall hook – remove all plugin data.
 */
function gemini_optimizer_uninstall()
{
    delete_option('gemini_optimizer_api_key');
    delete_option('gemini_optimizer_model');
    delete_option('gemini_optimizer_language');
    delete_option('gemini_optimizer_auto_meta');
    delete_option('gemini_optimizer_post_types');

    // Remove post meta
    global $wpdb;
    // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
    $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_gemini_%'");
}
register_uninstall_hook(__FILE__, 'gemini_optimizer_uninstall');
