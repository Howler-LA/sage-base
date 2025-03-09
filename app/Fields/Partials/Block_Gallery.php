<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_Gallery extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__gallery');

        $fields
            ->addFields($this->get(Content::class))
            ->addFields($this->get(Config::class))
        ;

        $fields
            ->removeField('content->image')
            ->removeField('content->links')
            ->modifyField('content->copy', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addGallery('images')
                ;
                return $fieldsBuilder;
            })
            ->modifyField('config->block->theme', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addButtonGroup('aspect_ratio',[ 
                        'label'         => 'Force aspect-ratio',
                        'choices'       => [
                            'auto'      => 'Auto',
                            'magic'     => 'Magic',
                            '6_4'       => '6/4',
                            '4_6'       => '4/6',
                            '1_1'       => 'Square',
                        ],
                        'default_value' => 'auto'
                    ])
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
