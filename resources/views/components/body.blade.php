@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-[calc((var(--font-size-body-1))*1px)] leading-[calc((var(--line-height-body-1))*1px)]',
  '2' => 'text-[calc((var(--font-size-body-2))*1px)] leading-[calc((var(--line-height-body-2))*1px)]',
})

<div 
  {{ $attributes->class([
    $class
  ]) }}
>
  {!! $content ?? $slot !!}
</div>