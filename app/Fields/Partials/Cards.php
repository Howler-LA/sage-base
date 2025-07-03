<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class Cards extends Partial
{
    /**
     * The partial field group.
     */
    public function fields(): Builder
    {
        $fields = Builder::make('cards');

        $fields
            ->addSelect('type', [
                'label' => 'Card Type',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'ui' => 0,
                'choices' => [
                    'news' => 'News Card',
                    'color' => 'Color Card',
                    'image' => 'Image Card',
                    'person' => 'Person Card',
                ],
                'default_value' => ['color'],
            ])
            ->addRepeater('cards',['label' => 'Cards', 'collapsed'=>'headline'])
                ->addText('eyebrow')
                ->addText('headline')
                ->addText('subhead')->conditional('type', '==', 'person')
                ->addText('body')
                ->addRepeater('links')
                    ->addLink('link',['required'=>true])
                ->endRepeater()
                ->addFile('image')
                    ->conditional('type', '==', 'image')
                        ->or('type', '==', 'person')
            ->endRepeater()
        ;
            // ->addFlexibleContent('cards', ['button_label' => 'Add Card'])
            //     ->addLayout($this->get(Card::class))
            //     ->addLayout($this->get(Card_Image::class))
            //     ->addLayout($this->get(Card_News::class))
            //     ->addLayout($this->get(Card_Person::class))
            //     ->addLayout($this->get(Card_Testimonial::class))
            // ->endFlexibleContent();

        return $fields;
    }
}
