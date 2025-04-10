<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_PageHero extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__page_hero',['title'=>'Detail Page Hero']);

        $fields
            ->addFields($this->get(Content::class))
            ->addGroup('links')
                ->addText('headline')
                ->addRepeater('links',['instructions' => 'To link another block, simply enter the blocks headline (lowercase & replace spaces for dashes) in the URL field.'])
                    ->addLink('link')
                ->endRepeater()
            ->endGroup()
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->removeField('content->links')
        ;

        return $fields;
    }
}
