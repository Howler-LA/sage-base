@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-body-1 leading-body-1',
  '2' => 'text-body-2 leading-body-2',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-body',
      'tracking-body',
      'text-balance',
      'font-medium'
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif