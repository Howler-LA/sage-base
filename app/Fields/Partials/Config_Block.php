<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Config_Block extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('config__block');

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields;
    }
}
