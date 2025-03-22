@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-[calc((var(--font-size-display-1))*1px)] leading-[calc((var(--line-height-display-1-lh))*1px)]',
  '2' => 'text-[calc((var(--font-size-display-1))*1px)] leading-[calc((var(--line-height-display-1-lh))*1px)]',
})

<div 
  {{ $attributes->class([
    $class,
    'tracking-[-1%]',
    'font-extrabold',
  ]) }}
>
  {!! $content ?? $slot !!}
</div>