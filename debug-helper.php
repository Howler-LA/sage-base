<?php
/**
 * Debug Helper for Sage Theme
 * 
 * This file helps diagnose PHP errors in the theme.
 * Include this in your theme to get better error reporting.
 */

// Enable error reporting for this theme specifically
if (defined('WP_DEBUG') && WP_DEBUG) {
    // Log all PHP errors
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/debug.log');
    
    // Display errors if WP_DEBUG_DISPLAY is true
    if (defined('WP_DEBUG_DISPLAY') && WP_DEBUG_DISPLAY) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    }
    
    // Add custom error handler for better debugging
    set_error_handler(function($severity, $message, $file, $line) {
        $error_info = [
            'severity' => $severity,
            'message' => $message,
            'file' => $file,
            'line' => $line,
            'trace' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5)
        ];
        
        error_log("SAGE THEME ERROR: " . print_r($error_info, true));
        
        // Continue with normal error handling
        return false;
    });
}

/**
 * Debug function to safely inspect ACF fields
 */
function sage_debug_acf_field($field_name, $post_id = 'option') {
    $field_value = get_field($field_name, $post_id);
    
    error_log("ACF Field Debug - {$field_name}:");
    error_log("Type: " . gettype($field_value));
    error_log("Value: " . print_r($field_value, true));
    
    return $field_value;
}