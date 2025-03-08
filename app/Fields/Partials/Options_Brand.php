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
                    ->addTextarea('embed_code',             ['rows'=>2])
                    ->addGroup('family')
                        ->addText('key',                    ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('eyebrow',                ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('headline',               ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('body',                   ['default_value'=>'Helvetica Neue, sans-serif'])
                        ->addText('button',                 ['default_value'=>'Helvetica Neue, sans-serif'])
                    ->endGroup()
                ->endGroup()
                ->addGroup('color',                         ['label'=>'Themes'])
                    ->addGroup('light')
                        ->addColorPicker('background',      ['default_value'=>'#ffffff'])
                        ->addColorPicker('foreground',      ['default_value'=>'#222222'])
                        ->addColorPicker('accent_text',     ['default_value'=>'#eeeeee'])
                        ->addColorPicker('accent_bg',       ['default_value'=>'#222222'])
                    ->endGroup()
                    ->addGroup('dark')
                        ->addColorPicker('background',      ['default_value'=>'#222222'])
                        ->addColorPicker('foreground',      ['default_value'=>'#f9f9f9'])
                        ->addColorPicker('accent_text',     ['default_value'=>'#999999'])
                        ->addColorPicker('accent_bg',       ['default_value'=>'#666666'])
                    ->endGroup()
                    ->addGroup('subtle')
                        ->addColorPicker('background',      ['default_value'=>'#f9f9f9'])
                        ->addColorPicker('foreground',      ['default_value'=>'#222222'])
                        ->addColorPicker('accent_text',     ['default_value'=>'#666666'])
                        ->addColorPicker('accent_bg',       ['default_value'=>'#dddddd'])
                    ->endGroup()
                ->endGroup()
            ->endGroup()
        ;

        return $fields;
    }
}
