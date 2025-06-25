@props([
  'config',
  'card',
  'items' => null,
])

<div 
  data-theme="{{ $config['cards']['theme'] }}"
  @class([
    'border border-foreground/50' => $config['block']['theme'] === $config['cards']['theme'],
    'bg-[var(--bg-color)] text-[var(--txt-color)]',
    'rounded-[calc((var(--card-radius))*1px)]',
    'overflow-hidden',
    'grid xl:grid-cols-2' => $items == 1,
  ])
>
  @image($card['image'],'large',['class'=>'w-full h-auto block'])
  <div
    @class([
      'xl:p-lg xl:justify-between xl:order-first' => $items == 1,
      'p-[calc((var(--card-padding))*1px)]',
      'flex flex-col items-start',
      'gap-[calc((var(--spacing-gutters))*1px)]',
    ])
  > 
    <x-eyebrow content="{{ $card['eyebrow'] }}" />
    <header class="space-y-[calc((var(--spacing-em))*1px)]">
      <x-title content="{{ $card['headline'] }}" />
      <x-body size="2" content="{!! $card['copy'] !!}" />
    </header>
    @if($card['links'])
      <div class="flex space-x-min">
        @foreach($card['links'] as $link)
          <x-button 
            href="{{ $link['link']['url'] }}"
            style="{{ $link['config']['style'] }}"
            format="{{ $link['config']['format'] }}"
            label="{{ $link['link']['title'] }}" 
            target="{{ $link['link']['target'] }}"
          />
        @endforeach
      </div>
    @endif
  </div>
</div>