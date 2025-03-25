@props([
  'key'   => null,
  'title' => null,
  'copy'  => null,
])

<div 
  x-data="{open:false}" 
  class="flex flex-col border-t last:border-b"
>
  
  <button 
    @click="open=!open" 
    @class([
      'flex justify-between items-center w-full cursor-pointer group',
      'gap-[calc((var(--spacing-em))*1px)]',
    ])
  >
    <x-body 
      @class([
        'border-r border-dashed flex-grow text-left font-semibold flex items-center',
        'py-sm',
        'gap-[calc((var(--spacing-em))*1px)]',
      ])
    >
      <x-eyebrow class="text-foreground font-light" wrapper="false" content="{!! $key !!}" />
      <span>{{ $title }}</span>
    </x-body>
    <x-accordion.accordion-icon class="flex-none" />
  </button>
  
  <div 
    x-show="open"
    x-cloak
    class="border-t border-dashed"
  >
    <div class="py-md px-sm">
      <x-body size="2">
        {!! $copy !!}
      </x-body>
    </div>
  </div>

</div>