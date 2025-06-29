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
    {{ $attributes->twMerge([
      $class,
      'tracking-subhead',
      'font-extrabold',
      'text-balance',
      'font-subhead',
    ]) }}
  >
    {!! $content ?? $slot !!}
  </div>
@endif