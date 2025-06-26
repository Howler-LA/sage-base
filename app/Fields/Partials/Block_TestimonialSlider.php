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
        $fields = Builder::make('block__testimonial_slider',['title'=>'Testimonial Slider']);

        $fields
            ->addFields($this->get(Content::class))
            ->addRepeater('cards',['collapsed'=>'headline'])
                ->addTextarea('copy',[
                    'rows'      => 3,
                    'maxlength' => 250,
                    'new_lines' => 'wpautop'
                ])
                ->addText('headline')
                ->addText('subheadline')
                ->addFile('image')
                ->addFields($this->get(Content_Links::class))
            ->endRepeater()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->headline')
            ->removeField('content->copy')
            ->removeField('content->links')
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
