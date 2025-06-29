@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-meta-text leading-meta-text',
  '2' => 'text-meta-text leading-meta-text',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'tracking-meta-text',
      'text-balance',
      'font-mono uppercase',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif