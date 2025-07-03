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
            ->addFields($this->get(Cards::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
        ;

        $fields
            ->modifyField('config->block->themes', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('themes_cards',['label'=>'Cards Theme'])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
