<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_TestimonialSlider extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__testimonial_slider');

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->headline')
            ->removeField('content->copy')
            ->removeField('content->links')
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
