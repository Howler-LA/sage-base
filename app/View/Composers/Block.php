<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Block extends Composer
{
    protected static $views = [
        'blocks.block__*',
        'sections.header',
        'components.section',
        'components.section.*',
    ];
    public function with()
    {
        return [
            'blocks'    => get_field('content'),
            'content'   => get_sub_field('content'),
            'config'    => get_sub_field('config'),
        ];
    }
}
