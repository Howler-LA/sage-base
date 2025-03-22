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
    public $name = 'Settings';

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
            ->addTab('Brand')
            ->addFields($this->get(Options_Brand::class))
            ->addTab('Sizing')
            ->addMessage('Very important:','Breakpoints should be ordered from least to greatest')
            ->addRepeater('breakpoints',['collapsed'=>'breakpoint'])
                ->addText('breakpoint',['label'=>'Browser Width'])
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
