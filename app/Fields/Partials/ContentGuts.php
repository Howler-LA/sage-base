<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class ContentGuts extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('content_guts');

        $fields
            ->addText('eyebrow')
            ->addText('headline')
            ->addWysiwyg('copy')
            ->addRepeater('links')
                ->addLink('link',['required'=>true])
            ->endRepeater()
            ->addFile('image')
        ;

        return $fields;
    }
}
