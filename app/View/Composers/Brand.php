<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Brand extends Composer
{
    protected static $views = [
        'partials.theme'
    ];
    public function with()
    {
        return [
            'font_embed'    => get_field('brand','option')['font']['embed_code'],
            'font'          => get_field('brand','option')['font']['family'],
            'light'         => get_field('brand','option')['color']['light'],
            'dark'          => get_field('brand','option')['color']['dark'],
            'subtle'        => get_field('brand','option')['color']['subtle'],
        ];
    }
}
