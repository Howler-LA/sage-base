<footer 
  data-theme="{{ $footer['theme'] }}" 
  class="py-sm md:pt-md xl:py-lg bg-background text-foreground"
>
  <x-container class="flex flex-col gap-sm">
    
    <x-type.eyebrow title="Eyebrow Content" />
    
    <x-type.headline title="Simple footer headline" />
    
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-y-xs gap-x-sm md:gap-y-sm xl:gap-y-lg xl:pb-lg">
      <x-footer 
        {{-- class="flex flex-col md:grid-cols-2 md:col-span-2 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-xs gap-x-sm md:gap-y-sm xl:gap-y-lg" --}}
        name="footer_navigation" 
      />
      <div class="flex flex-col">
        <x-type.eyebrow.text class="pb-4" title="Category" />
        <div class="border border-foreground rounded-2xl flex-grow min-h-48 lg:min-h-0 p-sm flex flex-col items-center gap-2 text-center">
          <x-type.title title="Simple headline" />
          <div class="h-sm w-px bg-foreground"></div>
          <x-button label="Button Action" class="self-center" />
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-1">
      @repeat(2)<div class="h-px bg-foreground"></div>@endrepeat
    </div>

  </x-container>
</footer>