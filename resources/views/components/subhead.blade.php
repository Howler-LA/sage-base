@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-[calc((var(--font-size-subhead))*1px)] leading-[calc((var(--line-height-subhead))*1px)]',
  '2' => 'text-[calc((var(--font-size-subhead))*1px)] leading-[calc((var(--line-height-subhead))*1px)]',
})

<div 
  {{ $attributes->class([
    'text-[calc((var(--font-size-subhead))*1px)] leading-[calc((var(--line-height-subhead))*1px)]',
    'tracking-[-1%]',
    'font-extrabold',
  ]) }}
>
  {!! $content ?? $slot !!}
</div>