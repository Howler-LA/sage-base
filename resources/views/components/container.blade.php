<div 
  {{ $attributes->class([
    'max-w-[calc((var(--sizing-browser-width))*1px)]', 
    'px-[calc((var(--margins-small))*1px)]',
    'mx-auto'
  ]) }}
>
  {!! $slot !!}
</div>