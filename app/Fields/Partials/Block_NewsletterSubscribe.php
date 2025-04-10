<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_NewsletterSubscribe extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__newsletter_subscribe',['title'=>'Newsletter Subscribe']);

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields;
    }
}
