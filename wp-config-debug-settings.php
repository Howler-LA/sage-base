/**
 * WordPress Debug Configuration
 * 
 * Add these lines to your wp-config.php file BEFORE the line:
 * require_once ABSPATH . 'wp-settings.php';
 * 
 * This will enable comprehensive debugging for the Sage theme issue.
 */

// Enable WordPress debugging
define('WP_DEBUG', true);

// Log errors to debug.log file instead of displaying them
define('WP_DEBUG_LOG', true);

// Hide errors from being displayed on the frontend (set to true only for development)
define('WP_DEBUG_DISPLAY', false);

// Show errors in admin area (helpful for admin-side debugging)
if (is_admin()) {
    define('WP_DEBUG_DISPLAY', true);
}

// Log all database queries (use only when needed, can slow down site)
define('SAVEQUERIES', true);

// Increase memory limit for debugging
ini_set('memory_limit', '512M');

// Set error reporting level
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

// Alternative: Show all errors (use only in development)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/**
 * After adding these lines to wp-config.php:
 * 
 * 1. Check for errors in: /wp-content/debug.log
 * 2. Check theme-specific errors in: /wp-content/themes/sage/debug.log
 * 3. Reproduce the error that's causing the TypeError
 * 4. Send me the error log contents for analysis
 */