<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class SiteSettings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Configuration';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Configuration | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('site_settings');

        $fields
            ->addTab('Logo & Fonts')
            ->addGroup('brand')
                ->addFile('logo')
                ->addGroup('font')
                    ->addText('eyebrow',    ['placeholder'=>'Helvetica, Sans'])
                    ->addText('display',    ['placeholder'=>'Helvetica, Sans'])
                    ->addText('subhead',    ['placeholder'=>'Helvetica, Sans'])
                    ->addText('title',      ['placeholder'=>'Helvetica, Sans'])
                    ->addText('body',       ['placeholder'=>'Helvetica, Sans'])
                    ->addText('meta_text',  ['placeholder'=>'mono'])
                    ->addText('pull_quote', ['placeholder'=>'serif'])
                    ->addText('button',     ['placeholder'=>'Helvetica, Sans'])
                ->endGroup()
            ->endGroup()

            ->addTab('Variables')
            ->addGroup('colors')
                ->addTextarea('variables')
                ->addRepeater('color_modes',['min'=>1,'collapsed'=>'name'])
                    ->addText('name',['required'=>true])
                    ->addTextarea('variables')
                ->endrepeater()
            ->endGroup()
            ->addGroup('sizes')
                ->addRepeater('breakpoints',['collapsed'=>'breakpoint'])
                    ->addText('breakpoint',['label'=>'Browser Width','append'=>'px'])
                    ->addTextArea('type_sizes',['label'=>'Type Sizes'])
                    ->addTextArea('variables',['label'=>'Space & Size'])
                ->endRepeater()
            ->endGroup()

            ->addTab('Header & Footer')
            ->addGroup('sections')
                ->addGroup('header')
                    ->addButtonGroup('themes')
                ->endGroup()
                ->addGroup('footer')
                    ->addButtonGroup('themes')
                ->endGroup()
            ->endGroup()

            ->addTab('Socials')
        ;

        return $fields->build();
    }
}
