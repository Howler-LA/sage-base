<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_DonateForm extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__donate_form');

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->links')
            ->modifyField('config->block->theme', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addTrueFalse('height',[
                        'ui_on_text'    => 'Full',
                        'ui_off_text'   => 'Hug',
                    ])
                ;
                return $fieldsBuilder;
            })
            ->modifyField('config->block', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addGroup('media')
                        ->addFields($this->get(Config_Theme::class))
                        ->addButtonGroup('image_placement',[ 
                            'choices'       => [
                                'full'      => 'Full Width',
                                'half'      => 'Half Width',
                            ],
                            'default_value' => 'half'
                        ])
                        ->addFile('sticker')
                    ->endGroup()
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
