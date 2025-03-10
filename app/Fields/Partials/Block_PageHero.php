<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_PageHero extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__page_hero');

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->removeField('content->links')
        ;

        return $fields;
    }
}
