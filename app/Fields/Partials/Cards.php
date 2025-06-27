<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Cards extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('cards');

        $fields
            ->addFlexibleContent('cards', ['button_label' => 'Add Card'])
                ->addLayout($this->get(Card::class))
            ->endFlexibleContent();

        return $fields;
    }
}
