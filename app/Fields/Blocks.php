<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

use App\Fields\Partials\Block_Accordion;
use App\Fields\Partials\Block_ImageText;
use App\Fields\Partials\Block_Gallery;
use App\Fields\Partials\Block_MultiCol;
use App\Fields\Partials\Block_StickyContent;

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
                ->addLayout($this->get(Block_ImageText::class))
                ->addLayout($this->get(Block_Gallery::class))
                ->addLayout($this->get(Block_MultiCol::class))
                ->addLayout($this->get(Block_StickyContent::class))
            ->endFlexibleContent();

        return $fields->build();
    }
}
