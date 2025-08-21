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
        $fields = Builder::make('block__hero_special',['title'=>'Hero Upper - Special']);

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
            ->modifyField('content->image', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addFile('svg_headline',[
                        'label'=>'Hero Vector Headline',
                        'instructions' => 'Replaces text headline'
                    ])->conditional('align', '==', 'center')
                ;
                return $fieldsBuilder;
            })
            ->modifyField('content->image', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addRadio('width',[ 
                        'label' => 'Hero Width',
                        'choices' => [ 
                            'full'      => 'Full', 
                            'narrow'    => 'Narrow',
                        ],
                        'default_value' => 'full'
                    ])
                    ->addRadio('align',[ 
                        'label' => 'Hero Version',
                        'choices' => [ 
                            'left'      => 'Left aligned', 
                            'center'    => 'Centered with vector headline',
                        ],
                        'default_value' => 'left'
                    ])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
