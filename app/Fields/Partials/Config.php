<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Config extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('config');

        $fields
            ->addAccordion('Block Configuration')
            ->addGroup('config')
                ->addGroup('block')
                    ->addButtonGroup('themes')
                    ->addFile('background')
                ->endGroup()
            ->endGroup();

        return $fields;
    }
}
