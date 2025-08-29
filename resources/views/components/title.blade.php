@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-title-1 leading-title-1 tracking-title-1',
  '2' => 'text-title-2 leading-title-2 tracking-title-2',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-extrabold',
      'text-balance',
      'font-title',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif