<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Block extends Composer
{
    protected static $views = [
        'partials.block__*',
        'components.section',
    ];
    public function with()
    {
        return [
            'content'   => get_sub_field('content'),
            'config'    => get_sub_field('config'),
        ];
    }
}
