<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_StickyContent extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__sticky_content',['title'=>'Sticky-50']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Cards::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->modifyField('config->block->themes', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('themes_cards',['label' => 'Card Theme'])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
