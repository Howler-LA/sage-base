@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-meta-text leading-meta-text',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'uppercase',
      'tracking-[10%]',
      'font-meta-text',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif