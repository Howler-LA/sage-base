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
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
        ;

        return $fields;
    }
}
