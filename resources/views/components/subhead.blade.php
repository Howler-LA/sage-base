@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-subhead leading-subhead',
  '2' => 'text-subhead leading-subhead',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'tracking-subhead',
      'font-extrabold',
      'text-balance',
      'font-subhead',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif