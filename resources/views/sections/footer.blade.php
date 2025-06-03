<x-section
  tag="footer" 
  data-theme="{{ $footer['theme'] }}" 
>
  <x-container class="flex flex-col gap-sm items-start">
    @if($footer['eyebrow'])
      <x-eyebrow content="{!! $footer['eyebrow'] !!}" />
    @endif
    @if($footer['headline'])
      <x-display content="{!! $footer['headline'] !!}" />
    @endif
    <div class="grid grid-cols-1 xl:grid-cols-2 xl:grid-cols-4 gap-y-xs gap-x-sm sm:gap-x-md xl:gap-y-sm xl:gap-y-lg xl:pb-lg">
      <x-footer 
        class="flex flex-col xl:grid-cols-2 xl:col-span-2 xl:col-span-3 grid grid-cols-1 xl:grid-cols-2 xl:grid-cols-3 gap-y-xs gap-x-sm xl:gap-y-sm xl:gap-y-lg"
        name="footer_navigation" 
      />
      @if($footer['widget'])
        <div class="flex flex-col">
          <x-type.eyebrow.text class="pb-4" title="Category" />
          <div class="border border-foreground rounded-2xl flex-grow min-h-48 xl:min-h-0 p-sm flex flex-col items-center gap-2 text-center">
            @if($footer['widget']['headline'])
              <x-title content="{!! $footer['widget']['headline'] !!}" />
            @endif
            <div class="h-sm w-px bg-foreground"></div>
            @if($footer['widget']['link'])
              <x-button 
                href="{!! $footer['widget']['link']['url'] !!}" 
                label="{!! $footer['widget']['link']['title'] !!}" 
                target="{!! $footer['widget']['link']['target'] !!}" 
                class="self-center" 
              />
            @endif
          </div>
        </div>
      @endif
    </div>
    <x-divider />
  </x-container>
</x-section>