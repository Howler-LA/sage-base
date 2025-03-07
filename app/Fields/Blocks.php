<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Blocks extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('blocks');

        $fields
            ->setLocation('post_type', '==', 'post');

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields->build();
    }
}
