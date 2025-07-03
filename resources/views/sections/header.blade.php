<x-section 
  data-theme="{{ get_field('sections','options')['header']['themes'] }}" 
  html="header"
  padding="tight"
  @class([
    'ring-1 ring-black/5',
    'sticky z-50',
    is_user_logged_in() ? 'top-[32px]' : 'top-0',
  ])
>
  <x-container>
    <div class="flex justify-between gap-med items-center">
      <a href="/" class="text-foreground">
        @unless(get_field('brand','options')['logo'])
          <x-title size="1">{{ $siteName }}</x-title>
        @else
          @set($image,get_field('brand','options')['logo'])
          @image($image,'large',['class'=>'text-foreground !fill-white'])
        @endunless
      </a>
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
    </div>
  </x-container>
</x-section>