<x-section 
  data-theme="{{ 
    $blocks 
      ?
    ($blocks[0]['config']['block']['themes'] ? $blocks[0]['config']['block']['themes'] : get_field('sections','options')['header']['themes'])
      :
    get_field('sections','options')['header']['themes']   
  }}" 
  html="header"
  padding="tight"
  @class([
    'sticky z-50',
    is_user_logged_in() ? 'top-[32px]' : 'top-0',
  ])
>
  <x-container>
    <div class="flex justify-between gap-med items-center">
      <a href="/" class="text-foreground flex-grow">
        @unless(get_field('brand','options')['logo'])
          <x-title size="1">{{ $siteName }}</x-title>
        @else
          @set($image,get_field('brand','options')['logo'])
          @image($image,'large',['class'=>'text-foreground fill-foreground max-w-72 2xl:max-w-none'])
        @endunless
      </a>
      <div class="flex flex-col items-end gap-min flex-grow">
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
        <x-sub-menu class='hidden xl:flex items-center gap-4' name="secondary_navigation" /> 
      </div>
    </div>
  </x-container>
</x-section>