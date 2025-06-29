<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Card_Image extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('card__image',['title'=>'Image-Card']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        return $fields;
    }
}
