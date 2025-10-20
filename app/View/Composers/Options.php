<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Options extends Composer
{
    protected static $views = [
        'sections.header',
        'sections.footer',
        'partials.block__*',
    ];
    public function with()
    {
        // Safely get sections field and validate structure
        $sections = get_field('sections', 'option');
        $header = null;
        $footer = null;
        
        if ($sections && is_array($sections)) {
            $header = $sections['header'] ?? null;
            $footer = $sections['footer'] ?? null;
        }
        
        // Safely get other fields
        $socials = get_field('socials', 'option');
        $donate = get_field('donate', 'option');
        
        // Debug logging when WP_DEBUG is enabled
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('Options Composer Debug:');
            error_log('Sections type: ' . gettype($sections));
            error_log('Socials type: ' . gettype($socials));
            error_log('Socials value: ' . print_r($socials, true));
        }
        
        return [
            'header'    => $header,
            'footer'    => $footer,
            'socials'   => $socials,
            'donate'    => $donate,
        ];
    }
}
