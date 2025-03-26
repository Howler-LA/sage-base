<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

use App\Fields\Partials\Options_Brand;
use App\Fields\Partials\Options_Appearance;
use App\Fields\Partials\Options_Socials;

class Settings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme Config';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Settings | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('settings');

        $fields
            ->addMessage('Tutorial','<a target="_blank" href="https://www.dropbox.com/scl/fi/rqv2r26rol7zo6dsrql99/Screen-Recording-2025-03-26-at-9.50.43-AM.mov?rlkey=lui8fu9fricwjpwmhrmcfcxih&dl=0">How to adjust these values</a>')
            ->addTab('Brand')
            ->addFields($this->get(Options_Brand::class))
            ->addTab('Sizing')
            ->addMessage('Very important:','Breakpoints should be ordered from least to greatest')
            ->addRepeater('breakpoints',['collapsed'=>'breakpoint'])
                ->addText('breakpoint',['label'=>'Browser Width','append'=>'px'])
                ->addTextArea('type_sizes',['label'=>'Type Sizes'])
                ->addTextArea('variables',['label'=>'Space & Size'])
            ->endRepeater()
            ->addTab('Appearance')
            ->addFields($this->get(Options_Appearance::class))
            ->addTab('Socials')
            ->addFields($this->get(Options_Socials::class))
        ;

        return $fields->build();
    }
}
