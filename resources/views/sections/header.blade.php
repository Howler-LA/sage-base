

<x-section
  x-data="{mobile:true}"
  data-theme="{{ 
    $blocks 
      ? (get_field('sections','options')['header']['match'] ? $blocks[0]['config']['block']['themes'] : get_field('sections','options')['header']['themes'])
      : get_field('sections','options')['header']['themes']
  }}" 
  html="header"
  padding="tight"
  @class([
    'sticky z-50',
    is_user_logged_in() ? 'top-0 xl:top-[32px]' : 'top-0',
  ])
>
  <x-container>
    <div class="flex justify-between gap-small lg:gap-med items-center">
      <a href="/" class="text-foreground xl:flex-grow">
        @unless(get_field('brand','options')['logo'])
          <x-title size="1">{{ $siteName }}</x-title>
        @else
          @set($img,get_field('brand','options')['logo'])
          @set($svg,str_replace('/','.', get_attached_file(get_field('brand','options')['logo'])))
          @if(!str_contains(wp_get_attachment_url($img), 'svg'))
            @image($img,'large',['class'=>'text-foreground fill-foreground max-md:max-w-full'])
          @else
            @svg(str_replace('.svg','',$svg), 'text-foreground fill-foreground max-md:max-w-full', ['aria-label' => $siteName])
          @endif
        @endunless
      </a>
      <div
        @class([
          'menu',
          'flex flex-row justify-end items-center flex-grow',
          has_nav_menu('secondary_navigation') ? 'xl:flex-col lg:items-end gap-min xl:gap-em' : 'lg:flex-row gap-min xl:gap-med',
        ])
      >
        <x-dynamic-component class="!gap-em" :component="has_nav_menu('secondary_navigation') ? 'button.group' : 'empty'"> 
          <x-sub-menu 
            class='hidden xl:flex items-center gap-4' 
            name="secondary_navigation" 
          />
          <div class="hidden lg:flex gap-min">
            @if(has_nav_menu('lang_navigation'))
              <x-language-switcher name="lang_navigation" />
            @endif
            @if($donate)
              <x-button 
                :label="$donate['text']"
                :href="$donate['url']"
                size="sm"
                target="self"
                variant=""
              />
            @endif
          </div>
        </x-dynamic-component>
        <x-desktop-menu 
          @class([
            'hidden xl:flex items-center gap-small 2xl:gap-med',
            'border-t border-border pt-em' => has_nav_menu('secondary_navigation'),
            'order-first' => !has_nav_menu('secondary_navigation')
          ])
        />
        <button 
          @click="mobile=!mobile" 
          class="size-11 flex xl:hidden items-center justify-center border border-foreground cursor-pointer rounded-full transition-all ease" 
          :class="mobile ? 'bg-foreground text-background' : 'bg-background text-foreground'"
        >
          <div :class="mobile ? 'block' : 'hidden'"><x-lucide-x class="size-6 stroke-1"/></div>
          <div :class="mobile ? 'hidden' : 'block'"><x-lucide-menu class="size-6 stroke-1"/></div>
        </button>
      </div>
    </div>
    <div x-show="mobile" data-theme="Primary" class='block xl:hidden absolute inset-x-0 top-full shadow-lg bg-background'>
      <x-mobile-sub-menu name="secondary_navigation" class="bg-background" />
      <x-mobile-menu />
      <div class="flex gap-min py-em px-med border-t border-foreground/50">
        @if(has_nav_menu('lang_navigation'))
          <x-language-switcher name="lang_navigation" />
        @endif
        @if($donate)
          <x-button 
            :label="$donate['text']"
            :href="$donate['url']"
            size="sm"
            target="self"
            variant=""
            class="w-full items-center justify-center"
          />
        @endif
      </div>
    </div>
  </x-container>
</x-section>
