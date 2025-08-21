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
                'wrapper' => ['width'=>'50%'],
                'choices' => [
                    'news'    => 'News Card',
                    'color'   => 'Color Card',
                    'image'   => 'Image Card',
                    'person'  => 'Person Card',
                    'compare' => 'Compare Card',
                ],
                'default_value' => ['color'],
            ])
            ->addButtonGroup('columns', [
                'label' => 'Columns',
                'required' => 0,
                'wrapper' => ['width'=>'50%'],
                'choices' => [
                    null    => 'Auto',
                    '1'     => '1',
                    '2'     => '2',
                    '3'     => '3',
                    '4'     => '4',
                ],
            ])
            ->addRepeater('cards',['label' => 'Cards', 'collapsed'=>'headline'])
                ->addText('eyebrow')
                ->addText('headline')
                ->addText('subhead')->conditional('type', '==', 'person')
                ->addWysiwyg('body')
                ->addRepeater('list',['collapsed'=>'item'])->conditional('type', '==', 'compare')
                    ->addText('item')
                    ->addText('icon')
                ->endRepeater()
                ->addRepeater('links')
                    ->addLink('link',['required'=>true])
                ->endRepeater()
                ->addTrueFalse('featured')
                ->addFile('image')
                    ->conditional('type', '==', 'image')
                        ->or('type', '==', 'person')
                ->addButtonGroup('themes_card',['label' => 'Card Theme','instructions'=>'Override cards theme'])
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
