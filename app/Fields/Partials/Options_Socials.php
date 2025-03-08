<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Options_Socials extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('options__socials');

        $fields
            ->addRepeater('socials')
                ->addText('item')
            ->endRepeater();
        ;

        return $fields;
    }
}
