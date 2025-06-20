@props([
	'config',
	'card',
])

<div 
	{{ $attributes->class([
    'col-span-full',
    'border border-foreground/50',
    'bg-[var(--bg-color)] text-[var(--txt-color)]',
    'rounded-[calc((var(--card-radius))*1px)]',
    'overflow-hidden',
    'grid grid-cols-1 lg:grid-cols-2'
  ]) }}
	data-theme="{{ $config['cards']['theme'] }}"
>
	<x-image id="{{ $card['image'] }}" size="large" class="w-full h-full object-cover block" />
  <div 
  	@class([
  		'gap-sm',
  		'xl:p-lg xl:justify-between flex flex-col items-start xl:order-first'
  	])
  >
  	<x-eyebrow content="{{ $card['eyebrow'] }}" />
  	<header class="space-y-[calc((var(--spacing-em))*1px)]">
      <x-subhead content="{{ $card['headline'] }}" />
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