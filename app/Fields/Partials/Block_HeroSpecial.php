<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_HeroSpecial extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__hero_special',['title'=>'Custom Hero Upper']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->modifyField('content->headline', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addText('subhead')
                ;
                return $fieldsBuilder;
            })
            ->modifyField('config->block->themes', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('align',[ 
                        'label' => 'Text align',
                        'choices' => [ 
                            'left'      => 'Left', 
                            'center'    => 'Center',
                            'right'     => 'Right', 
                        ],
                        'default_value' => 'center'
                    ])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
