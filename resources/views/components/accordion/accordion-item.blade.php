@props([
  'key' => null,
  'title' => null,
  'copy' => null,
])

<div 
  x-data="{open:false}" 
  class="flex flex-col border-t last:border-b"
>
  
  <button 
    @click="open=!open" 
    class="flex gap-4 justify-between items-center w-full cursor-pointer group"
  >
    <x-type.copy class="py-3 sm:py-xs border-r border-dashed flex-grow text-left font-semibold flex items-center gap-4">
      <x-type.key title="{!! $key !!}" />
      <span>{{ $title }}</span>
    </x-type.copy>
    <x-accordion.accordion-icon />
  </button>
  
  <div 
    x-show="open"
    x-cloak
    class="border-t border-dashed"
  >
    <div class="py-xs px-xs">
      {{ $copy }}
    </div>
  </div>

</div>