<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Content_Links extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('content__links');

        $fields
            ->addRepeater('links',[
                'collapsed'         =>'link',
                'max'               => 2,
            ])
                ->addLink('link',[
                    'required'      => 1
                ])
                ->addGroup('config')
                    ->addButtonGroup('format',[ 
                        'choices' => [ 
                            'primary'   => 'Default', 
                            'small'     => 'Small', 
                            'link'      => 'Link'
                        ]
                    ])
                    ->addButtonGroup('style',[ 
                        'choices' => [ 'solid' => 'Solid', 'outline' => 'Outline']])
                    ->addSelect('icon',[
                        'allow_null'    => 1, 
                        'ajax'          => 1,
                        'choices'       => [ 'solid' => 'Solid', 'outline' => 'Outline']
                    ])
                ->endGroup()
            ->endRepeater()
        ;

        return $fields;
    }
}
