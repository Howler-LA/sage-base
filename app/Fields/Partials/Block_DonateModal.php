<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_DonateModal extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__donate_modal');

        $fields
            ->addRepeater('items')
                ->addText('item')
            ->endRepeater();

        return $fields;
    }
}
