<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Content extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('content');

        $fields
            ->addGroup('content')
                ->addFields($this->get(Content_Lockup::class))
                ->addFields($this->get(Content_Media::class))
            ->endGroup();
        ;

        return $fields;
    }
}
