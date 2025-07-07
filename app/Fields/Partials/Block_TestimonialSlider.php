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
            ->addRepeater('cards',['collapsed'=>'name'])
                ->addText('name')
                ->addText('role')
                ->addText('copy')
                ->addLink('link',['required'=>true])
                ->addImage('image')
            ->endRepeater()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->eyebrow')
            ->removeField('content->copy')
            ->removeField('content->image')
            ->removeField('content->links')
        ;

        return $fields;
    }
}
