<header 
  x-data="{open:false}"
  data-theme="{{ $header['theme'] }}" 
  @class([
    'bg-background text-foreground sticky z-50',
    'top-0' => is_user_logged_in() == false,
    'top-8' => is_user_logged_in() == true,
  ])
>
  <div class="py-6 md:py-xs">
    <x-container class="grid grid-cols-2">
      <a href="/" class="!no-underline leading-10">
        <x-type.title title="{!! $siteName !!}" />
      </a>
      <div class="bg-black/5 flex justify-end">
        <button 
          @click="open=!open"
          :class="open ? 'bg-foreground text-background' : ''"
          class="h-sm px-4 cursor-pointer rounded border flex xl:hidden items-center justify-center"
        >
          <span x-text="open ? 'Close': 'Menu' " />
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
