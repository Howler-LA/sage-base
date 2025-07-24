

<x-section
  x-data="{mobile:false}"
  data-theme="{{ 
    $blocks 
      ? (get_field('sections','options')['header']['match'] ? $blocks[0]['config']['block']['themes'] : get_field('sections','options')['header']['themes'])
      : get_field('sections','options')['header']['themes']
  }}" 
  html="header"
  padding="tight"
  @class([
    'sticky z-50',
    is_user_logged_in() ? 'top-[32px]' : 'top-0',
  ])
>
  <x-container>
    <div class="flex justify-between lg:gap-med items-center">
      <a href="/" class="text-foreground xl:flex-grow">
        @unless(get_field('brand','options')['logo'])
          <x-title size="1">{{ $siteName }}</x-title>
        @else
          @set($img,get_field('brand','options')['logo'])
          @set($svg,str_replace('/','.', get_attached_file(get_field('brand','options')['logo'])))
          @if(!str_contains(wp_get_attachment_url($img), 'svg'))
            @image($img,'large',['class'=>'text-foreground fill-foreground max-w-40 xl:max-w-72 2xl:max-w-none'])
          @else
            @svg(str_replace('.svg','',$svg), 'text-foreground fill-foreground max-w-72 2xl:max-w-none', ['aria-label' => $siteName])
          @endif
        @endunless
      </a>
      <div class="flex flex-row lg:flex-col justify-end items-center lg:items-end gap-min flex-grow">
        <x-sub-menu class='hidden xl:flex items-center gap-4' name="secondary_navigation" /> 
        <x-button.group>
          <x-desktop-menu class='hidden xl:flex items-center' />
          <x-button 
            label="Donate"
            href="#"
            size="sm"
            target="self"
            variant=""
          />
        </x-button.group>
        <button 
          @click="mobile=!mobile" 
          class="size-11 flex xl:hidden items-center justify-center border border-foreground rounded-full transition-all ease" 
          :class="mobile ? 'bg-foreground text-background' : 'bg-background text-foreground'"
        >
          <x-lucide-menu class="size-6 stroke-1"/>
        </button>
      </div>
    </div>
    <x-mobile-menu x-show="mobile" data-theme="Primary" class='block xl:hidden' />
  </x-container>
</x-section>
