<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_Accordion extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__accordion');

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields;
    }
}
