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
                ->addGroup('color',                             ['label'=>'Themes'])
                    ->addTrueFalse('tailwind',                  ['label'=>'Tailwind variables','default_value'=>1])
                    ->addMessage('Tailwind Details',            '<a href="https://tailwindcss.com/docs/colors">Visit this link for available variables</a>')->conditional('tailwind', '==', '1')
                    ->addGroup('brand')
                        
                        ->addColorPicker('background',          ['label' => 'Primary Background','required' => true, 'default_value'=>'#ffffff'])->conditional('tailwind', '==', '0')
                        ->addText('background_tw',              ['label' => 'Primary Background','required' => true, 'default_value'=>'white'])->conditional('tailwind', '==', '1')

                        ->addColorPicker('background_subtle',   ['label' => 'Subtle Background','required' => true, 'default_value'=>'#ffffff'])->conditional('tailwind', '==', '0')
                        ->addText('background_subtle_tw',       ['label' => 'Subtle Background ','required' => true, 'default_value'=>'white)'])->conditional('tailwind', '==', '1')
                        
                        ->addColorPicker('foreground',          ['label' => 'Primary Foreground','required' => true, 'default_value'=>'#222222'])->conditional('tailwind', '==', '0')
                        ->addText('foreground_tw',              ['label' => 'Primary Foreground','required' => true, 'default_value'=>'neutral-900'])->conditional('tailwind', '==', '1')
                        
                        ->addColorPicker('accent_text',         ['label' => 'Accent Foreground','required' => true, 'default_value'=>'#eeeeee'])->conditional('tailwind', '==', '0')
                        ->addText('accent_text_tw',             ['label' => 'Accent Foreground','required' => true, 'default_value'=>'white'])->conditional('tailwind', '==', '1')
                        
                        ->addColorPicker('accent_bg',           ['label' => 'Accent Background','required' => true, 'default_value'=>'#222222'])->conditional('tailwind', '==', '0')
                        ->addText('accent_bg_tw',               ['label' => 'Accent Background','required' => true, 'default_value'=>'neutral-900'])->conditional('tailwind', '==', '1')

                    ->endGroup()
                    // ->addGroup('light')
                    //     ->addColorPicker('background',      ['default_value'=>'#ffffff'])
                    //     ->addColorPicker('foreground',      ['default_value'=>'#222222'])
                    //     ->addColorPicker('accent_text',     ['default_value'=>'#eeeeee'])
                    //     ->addColorPicker('accent_bg',       ['default_value'=>'#222222'])
                    // ->endGroup()
                    // ->addGroup('dark')
                    //     ->addColorPicker('background',      ['default_value'=>'#222222'])
                    //     ->addColorPicker('foreground',      ['default_value'=>'#f9f9f9'])
                    //     ->addColorPicker('accent_text',     ['default_value'=>'#999999'])
                    //     ->addColorPicker('accent_bg',       ['default_value'=>'#666666'])
                    // ->endGroup()
                    // ->addGroup('subtle')
                    //     ->addColorPicker('background',      ['default_value'=>'#f9f9f9'])
                    //     ->addColorPicker('foreground',      ['default_value'=>'#222222'])
                    //     ->addColorPicker('accent_text',     ['default_value'=>'#666666'])
                    //     ->addColorPicker('accent_bg',       ['default_value'=>'#dddddd'])
                    // ->endGroup()
                ->endGroup()
            ->endGroup()
        ;

        return $fields;
    }
}
