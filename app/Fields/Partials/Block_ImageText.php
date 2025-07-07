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
                        ->addButtonGroup('themes')
                        ->addTrueFalse('reverse',[ 
                            'label'         => 'Reverse Direction',
                            'instructions'  => 'Image ordered first on desktop',
                            'default_value' => 0
                        ])
                        ->addTrueFalse('scaling',[ 
                            'label'         => 'Fixed container width',
                            'instructions'  => 'Adds a max-width',
                            'default_value' => 1
                        ])
                        ->addButtonGroup('image_size',[ 
                            'choices' => [ 
                                'full'      => 'Full with', 
                                'narrow'    => 'Narrow margins',
                                'wide'      => 'Wide margins', 
                            ],
                            'default_value' => 'full'
                        ])
                    ->endGroup()
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
