<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Block_HeroSpecial extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('block__hero_special');

        $fields
            ->addFields($this->get(Content::class))
            ->addGroup('sub_content')
                ->addFields($this->get(Content_Lockup::class))
                ->addFields($this->get(Content_Media::class))
            ->endGroup()
            ->addFields($this->get(Config::class))
        ;

        $fields
            // ->removeField('content->image')
            ->modifyField('config->block', function($fieldsBuilder) {
                $fieldsBuilder
                    ->addGroup('style')
                        ->addButtonGroup('client',[ 
                            'choices'       => [
                                'yjc'       => 'YJC',
                                'ij'        => 'IJ',
                            ],
                            'default_value' => 'yjc'
                        ])
                        ->addButtonGroup('version',[ 
                            'choices'       => [
                                'v1'        => 'v1',
                                'v2'        => 'v2',
                                'v3'        => 'v3',
                            ],
                            'default_value' => 'v1'
                        ])
                    ->endGroup()
                ;
                return $fieldsBuilder;
            })
        ;

        return $fields;
    }
}
