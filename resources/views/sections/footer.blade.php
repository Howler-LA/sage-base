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
        {{-- class="flex flex-col xl:grid-cols-2 xl:col-span-2 xl:col-span-3 grid grid-cols-1 xl:grid-cols-2 xl:grid-cols-3 gap-y-xs gap-x-sm xl:gap-y-sm xl:gap-y-lg" --}}
        name="footer_navigation" 
      />
      <div class="flex flex-col">
        <x-type.eyebrow.text class="pb-4" title="Category" />
        <div class="border border-foreground rounded-2xl flex-grow min-h-48 xl:min-h-0 p-sm flex flex-col items-center gap-2 text-center">
          <x-type.title title="Simple headline" />
          <div class="h-sm w-px bg-foreground"></div>
          <x-button label="Button Action" class="self-center" />
        </div>
      </div>
    </div>
    <x-divider />
  </x-container>
</x-section>