<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_HeroSpecial extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__hero_special');

        $fields
            ->addFields($this->get(Content::class))
            
            ->addFields($this->get(Config::class))
        ;

        return $fields;
    }
}
