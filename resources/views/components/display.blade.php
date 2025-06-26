@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-display leading-display',
  '2' => 'text-display leading-display',
})

<div 
  {{ $attributes->class([
    $class,
    'tracking-tight',
    'font-extrabold',
    'text-balance'
  ]) }}
>
  {!! $content ?? $slot !!}
</div>