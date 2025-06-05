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
            ->addTrueFalse('hide',['label'=>'Hide Block'])
            ->addButtonGroup('theme',[ 
                'choices' => [ 
                    'light'     => 'Light',
                    'dark'      => 'Dark', 
                    'subtle'    => 'Subtle', 
                ],
                'default_value' => 'light'
            ])
            ->addImage('background_image')
        ;

        return $fields;
    }
}
