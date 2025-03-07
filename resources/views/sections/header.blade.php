<header 
  x-data="{open:false}"
  data-theme="light" 
  class="bg-background text-foreground sticky top-0 z-50"
>
  <div class="py-6 md:py-xs border-b">
    <x-container class="grid grid-cols-2 gap-xs">
      <div class="h-sm rounded bg-black/5"></div>
      <div class="h-sm rounded bg-black/5 flex justify-end">
        <button 
          @click="open=!open"
          :class="open ? 'bg-foreground text-background' : ''"
          class="h-sm px-4 cursor-pointer border rounded flex xl:hidden items-center justify-center"
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