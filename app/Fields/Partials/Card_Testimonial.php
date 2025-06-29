<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Card_Testimonial extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('card__testimonial',['title'=>'Testimonial-Card']);

        $fields
            ->addGroup('content')
                ->addText('copy',['label'=>'Quote'])
                ->addText('name',['label'=>'Name'])
                ->addText('role',['label'=>'Role'])
                ->addLink('link')
                ->addImage('image')
            ->endGroup()
            ->addFields($this->get(Config::class))
        ;

        return $fields;
    }
}
