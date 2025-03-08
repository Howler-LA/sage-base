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
            ->addGroup('config')
                ->addGroup('block')
                    ->addFields($this->get(Config_Block::class))
                ->endGroup()
            ->endGroup()
        ;

        return $fields;
    }
}
