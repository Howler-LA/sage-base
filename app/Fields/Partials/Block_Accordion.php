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
            ->addRepeater('cards',['collapsed'=>'headline'])
                ->addText('headline')
                ->addTextarea('copy',[
                    'rows'      => 3,
                    'new_lines' => 'br'
                ])
            ->endRepeater()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->modifyField('config->block->theme', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('columns',[ 
                        'choices'       => [1,2],
                        'default_value' => 1
                    ])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
