<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Cols extends Composer
{
    protected static $views = [
        'blocks.block__*',
        'components.section',
        'components.section.*',
    ];
    public function with()
    {
        return [
            'cards'     => get_sub_field('cards'),
            'type'      => get_sub_field('type'),
        ];
    }
}
