<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Card_Person extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('card__person',['title'=>'Person-Card']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->eyebrow')
        ;

        $fields
            ->modifyField('content->headline', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addText('subheadline')
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
