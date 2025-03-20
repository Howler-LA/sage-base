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
                ->addTextarea('colors')
                ->addRepeater('modes',['collapsed'=>'name'])
                    ->addText('name')
                    ->addTextarea('css')
                    ->addSelect('color_select_1',['label'=>'bg-primary'])
                    ->addSelect('color_select_2',['label'=>'text-primary'])
                    ->addSelect('color_select_3',['label'=>'bg-accent'])
                    ->addSelect('color_select_4',['label'=>'text-accent'])
                    ->addSelect('color_select_5',['label'=>'bg-button'])
                    ->addSelect('color_select_6',['label'=>'text-button'])
                ->endRepeater()
            ->endGroup()
        ;

        return $fields;
    }
}
