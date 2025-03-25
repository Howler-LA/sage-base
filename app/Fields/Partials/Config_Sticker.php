<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Config_Sticker extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('config__sticker');

        $fields
            // ->addGroup('sticker')
                ->addTrueFalse('add_sticker')
                ->addSelect('sticker_overlay',[
                    'allow_null'    => 1, 
                    'ajax'          => 1,
                    'choices'       => [ 
                        'solid'     => 'Solid', 
                        'outline'   => 'Outline'
                    ]
                ])->conditional('add_sticker', '==', '1')
            // ->endGroup()
            ;

        return $fields;
    }
}
