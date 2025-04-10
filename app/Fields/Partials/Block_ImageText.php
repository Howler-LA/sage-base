<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_ImageText extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__image_text',['title'=>'Content 50-50']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->modifyField('config->block', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addGroup('media')
                        ->addButtonGroup('image_orientation',[ 
                            'choices' => [ 
                                'left'      => 'Left',
                                'right'     => 'Right', 
                            ],
                            'default_value' => 'right'
                        ])
                        ->addButtonGroup('image_size',[ 
                            'choices' => [ 
                                'full'      => 'Full with', 
                                'wide'      => 'Wide margins', 
                                'narrow'    => 'Narrow margins'
                            ],
                            'default_value' => 'full'
                        ])
                        ->addFields($this->get(Config_Theme::class))
                        ->addFields($this->get(Config_Sticker::class))
                    ->endGroup()
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
