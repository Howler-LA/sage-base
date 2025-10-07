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
        return [
            'header'    => get_field('sections','option')['header'],
            'footer'    => get_field('sections','option')['footer'],
            'socials'   => get_field('socials','option'),
            'donate'    => get_field('donate','option'),
        ];
    }
}
