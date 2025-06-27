@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-title-1 leading-title-1',
  '2' => 'text-title-2 leading-title-2',
})

@if($slot->isNotEmpty() or $content != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'tracking-title',
      'font-extrabold',
      'text-balance',
      'font-title',
    ]) }}
  >
    {!! $content ?? $slot !!}
  </div>
@endif