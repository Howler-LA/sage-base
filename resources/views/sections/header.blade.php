<header 
  x-data="{open:false}"
  data-theme="{{ $header['theme'] }}" 
  @class([
    'bg-background text-foreground z-50',
    'sticky' => $header['sticky'],
    'top-0' => is_user_logged_in() == false,
    'top-0 xl:top-8' => is_user_logged_in() == true,
  ])
>
  <div class="py-6 xl:py-4">
    <x-container class="flex justify-between items-center gap-x-sm xl:gap-x-md">
      <a href="/" class="!no-underline leading-10">
        <x-type.title title="{!! $siteName !!}" />
      </a>
      <div class="flex items-center justify-end gap-sm">
        <x-menu 
          name="primary_navigation" 
          class="font-semibold text-body-2 hidden xl:flex"
        />
        @if($header['links'])
          <div class="hidden xl:flex gap-min">
            @foreach($header['links'] as $link)
              <x-button
                format="{{ $link['config']['format'] }}"
                style="{{ $link['config']['style'] }}"
                target="{{ $link['link']['target'] }}"
                href="{{ $link['link']['url'] }}"
                label="{{ $link['link']['title'] }}"
              />
            @endforeach
          </div>
        @endif
        <button 
          @click="open=!open"
          :class="open ? 'bg-foreground text-background' : ''"
          class="h-xs xl:h-sm px-3 xl:px-4 cursor-pointer rounded border flex xl:hidden items-center justify-center"
        >
          <span class="font-medium text-sm" x-text="open ? 'Close': 'Menu' "></span>
        </button>
      </div>
    </x-container>
  </div>
  
  <div 
    style="display: none;" 
    data-theme="dark" 
    x-show="open" 
    class="bg-background text-foreground flex xl:hidden flex-col absolute inset-x-0 top-full shadow-2xl"
  >
    <x-mobile 
      name="primary_navigation" 
      class="font-medium text-xl"
    />
  </div>

</header>
