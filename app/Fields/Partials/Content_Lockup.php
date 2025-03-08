<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Content_Lockup extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('content__lockup');

        $fields
            ->addText('eyebrow')
            ->addText('headline')
            ->addTextarea('copy',[
                'rows'      => 3,
                'maxlength' => 250,
                'new_lines' => 'wpautop'
            ])
            ->addFields($this->get(Content_Links::class))
            ->addFile('image')
        ;

        return $fields;
    }
}
