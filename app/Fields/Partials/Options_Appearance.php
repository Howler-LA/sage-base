<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Options_Appearance extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('options__appearance');

        $fields
            ->addGroup('header',['instructions'=>'Settings for site header'])
                ->addFields($this->get(Config_Theme::class))
                ->addButtonGroup('layout',[
                    'choices'       => [
                        'left'      => 'Align Left',
                        'right'     => 'Align Right',
                        'center'    => 'Center',
                    ],
                    'default_value' => 'left_aligned'
                ])
                ->addFields($this->get(Content_Links::class))
                ->addTrueFalse('sticky',['label'=>'Sticky'])
            ->endGroup()
            ->addGroup('footer',['instructions'=>'Settings for site footer'])
                ->addFields($this->get(Config_Theme::class))
            ->endGroup()
        ;

        return $fields;
    }
}
