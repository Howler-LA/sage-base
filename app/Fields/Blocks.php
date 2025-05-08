<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

use App\Fields\Partials\Block_Accordion;
use App\Fields\Partials\Block_ColorCards;
use App\Fields\Partials\Block_DonateForm;
use App\Fields\Partials\Block_ImageCards;
use App\Fields\Partials\Block_ImageText;
use App\Fields\Partials\Block_Gallery;
use App\Fields\Partials\Block_Hero;
use App\Fields\Partials\Block_HeroSpecial;
use App\Fields\Partials\Block_MultiCol;
use App\Fields\Partials\Block_PageHero;
use App\Fields\Partials\Block_StickyContent;
use App\Fields\Partials\Block_TestimonialSlider;
use App\Fields\Partials\Block_TestField;

class Blocks extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('blocks',[
            'hide_on_screen' => ['the_content']
        ]);

        $fields
            ->setLocation('page_template', '==', 'template-custom.blade.php');

        $fields
            ->addFlexibleContent('content', ['button_label' => 'Add Block'])
                ->addLayout($this->get(Block_Accordion::class))
                ->addLayout($this->get(Block_ColorCards::class))
                ->addLayout($this->get(Block_DonateForm::class))
                ->addLayout($this->get(Block_ImageCards::class))
                ->addLayout($this->get(Block_ImageText::class))
                ->addLayout($this->get(Block_Gallery::class))
                ->addLayout($this->get(Block_Hero::class))
                ->addLayout($this->get(Block_HeroSpecial::class))
                ->addLayout($this->get(Block_MultiCol::class))
                ->addLayout($this->get(Block_PageHero::class))
                ->addLayout($this->get(Block_StickyContent::class))
                ->addLayout($this->get(Block_TestimonialSlider::class))
                ->addLayout($this->get(Block_TestField::class))
            ->endFlexibleContent();

        return $fields->build();
    }
}
