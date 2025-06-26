@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-subhead leading-subhead',
  '2' => 'text-subhead leading-subhead',
})

@if($slot->isNotEmpty() or $content != null)
  <div 
    {{ $attributes->class([
      $class,
      'text-balance',
      'tracking-[-1%]',
      'font-extrabold',
    ]) }}
  >
    {!! $content ?? $slot !!}
  </div>
@endif