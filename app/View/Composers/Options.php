<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Options extends Composer
{
    protected static $views = [
        'sections.header',
        'sections.footer',
    ];
    public function with()
    {
        return [
            'header'    => get_field('header','option'),
            'footer'    => get_field('footer','option'),
        ];
    }
}
