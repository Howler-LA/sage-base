<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Config_Theme extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('config__theme');

        $fields
            ->addButtonGroup('theme',[ 
                'choices' => [ 
                    'light'     => 'Light',
                    'dark'      => 'Dark', 
                    'subtle'    => 'Subtle', 
                ],
                'default_value' => 'light'
            ])
        ;

        return $fields;
    }
}
