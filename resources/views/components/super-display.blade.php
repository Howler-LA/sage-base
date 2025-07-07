@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-super-display leading-super-display',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-display',
      'tracking-[-4%]',
      'font-extrabold',
      'text-balance'
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif