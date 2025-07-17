@props([
  'key'   => null,
  'title' => null,
  'copy'  => null,
])

<div 
  x-data="{open:false}" 
  class="flex flex-col border-t last:border-b border-border"
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
        'py-small',
        'gap-[calc((var(--spacing-em))*1px)]',
      ])
    >
      <x-meta-text size="2" :message="$key" />
      <x-title size="2" :message="$title" />
    </x-body>
    <div 
      :class="open ? 'rotate-45 bg-foreground text-background border-foreground ring-4' : 'rotate-0 ring-0 group-hover:ring-4'"
      class="size-6 sm:size-8 border rounded-full flex-none flex items-center justify-center transition ease duration-300 ring-foreground/10"
    >
      <x-lucide-plus />
    </div>
  </button>
  
  <div 
    x-show="open"
    x-cloak
    class="border-t border-dashed"
  >
    <div class="py-med px-small">
      <x-body size="2">
        {!! $copy !!}
      </x-body>
    </div>
  </div>

</div>