<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_HeroSpecialFooter extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__hero_special_footer',['title'=>'Hero Lower']);

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->eyebrow')
            ->removeField('content->image')
        ;

        $fields
            ->modifyField('config->block->themes', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('themes_secondary',['label'=>'Inner Theme'])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
