<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Options_Brand extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('options__brand');

        $fields
            ->addGroup('brand')
                ->addFile('logo')
                ->addGroup('font')
                    ->addTextarea('embed_code',                 ['rows'=>2])
                    ->addGroup('family')
                        ->addText('key',                        ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('eyebrow',                    ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('headline',                   ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('body',                       ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('button',                     ['default_value'=>'Helvetica Neue, sans-serif'])
                    ->endGroup()
                ->endGroup()
                ->addTextarea('colors',['rows'=>5])
                ->addRepeater('modes',['collapsed'=>'name'])
                    ->addText('name')
                    ->addTextarea('css',['rows'=>20])
                ->endRepeater()
            ->endGroup()
        ;

        return $fields;
    }
}
