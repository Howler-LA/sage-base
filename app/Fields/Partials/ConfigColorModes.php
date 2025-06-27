<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class ConfigColorModes extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('config_color_modes');

        $fields
            ->addButtonGroup('theme')
        ;

        return $fields;
    }
}
