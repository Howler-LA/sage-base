<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_MultiCol extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__multi_col',['title'=>'Multi-col Basic Content']);

        $fields
            ->addFields($this->get(Content::class))
            ->addRepeater('cards',['collapsed'=>'headline'])
                ->addText('eyebrow')
                ->addText('headline')
                ->addTextarea('copy',[
                    'rows'      => 3,
                    'maxlength' => 250,
                    'new_lines' => 'wpautop'
                ])
                ->addFile('image')
                ->addFields($this->get(Content_Links::class))
                ->addTrueFalse('featured',['instructions'=>'Toggling this will change the apperance of this card to be more prominent'])
            ->endRepeater()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
        ;

        return $fields;
    }
}
