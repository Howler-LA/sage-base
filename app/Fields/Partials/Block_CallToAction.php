<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_CallToAction extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__call_to_action',['title'=>'Call to Action']);

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields;
    }
}
