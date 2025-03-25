@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-title-1 leading-title-1',
  '2' => 'text-title-2 leading-title-2',
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