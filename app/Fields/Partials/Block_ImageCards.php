<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_ImageCards extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__image_cards');

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
            ->endRepeater()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->modifyField('config->block', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addGroup('cards')
                        ->addFields($this->get(Config_Theme::class))
                    ->endGroup()
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
