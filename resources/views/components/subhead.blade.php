@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-subhead leading-subhead',
  '2' => 'text-subhead leading-subhead',
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