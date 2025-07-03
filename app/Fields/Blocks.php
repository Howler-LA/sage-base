<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

use App\Fields\Partials\Block_Accordion;
use App\Fields\Partials\Block_CTA;
use App\Fields\Partials\Block_Donate;
use App\Fields\Partials\Block_Hero;
use App\Fields\Partials\Block_HeroSpecial;
use App\Fields\Partials\Block_HeroSpecialFooter;
use App\Fields\Partials\Block_ImageCards;
use App\Fields\Partials\Block_ImageText;
use App\Fields\Partials\Block_MultiCol;
use App\Fields\Partials\Block_PageHeader;
use App\Fields\Partials\Block_StickyContent;
use App\Fields\Partials\Block_TestimonialSlider;

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
                ->addLayout($this->get(Block_CTA::class))
                ->addLayout($this->get(Block_Donate::class))
                ->addLayout($this->get(Block_Hero::class))
                ->addLayout($this->get(Block_HeroSpecial::class))
                ->addLayout($this->get(Block_HeroSpecialFooter::class))
                ->addLayout($this->get(Block_ImageCards::class))
                ->addLayout($this->get(Block_ImageText::class))
                ->addLayout($this->get(Block_MultiCol::class))                
                ->addLayout($this->get(Block_PageHeader::class))                
                ->addLayout($this->get(Block_StickyContent::class))
                ->addLayout($this->get(Block_TestimonialSlider::class))
            ->endFlexibleContent();

        return $fields->build();
    }
}
